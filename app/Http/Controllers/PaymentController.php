<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Razorpay\Api\Api;
use Carbon\Carbon;

class PaymentController extends Controller
{
    private $api;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get Razorpay API instance
     */
    private function getRazorpayApi()
    {
        $key = config('services.razorpay.key');
        $secret = config('services.razorpay.secret');
        
        if (empty($key) || empty($secret)) {
            Log::error('Razorpay credentials not configured');
            throw new \Exception('Payment gateway credentials not configured');
        }
        
        return new Api($key, $secret);
    }

    /**
     * Show the checkout page
     */
    public function checkout(Request $request)
    {
        $planType = $request->query('plan', 'annual');
        
        // Validate plan type
        if (!in_array($planType, ['annual', 'quarterly'])) {
            return redirect()->route('pricing')->with('error', 'Invalid plan selected');
        }

        // Set amount based on plan type
        $amount = $planType === 'annual' ? 999 : 599;
        $duration = $planType === 'annual' ? '1 Year' : '3 Months';

        $user = Auth::user();

        return view('checkout', compact('user', 'planType', 'amount', 'duration'));
    }

    /**
     * Create Razorpay order
     */
    public function createOrder(Request $request)
    {
        try {
            Log::info('Create order request', $request->all());
            
            $request->validate([
                'plan_type' => 'required|in:annual,quarterly',
                'amount' => 'required|numeric|min:0',
            ]);

            $user = Auth::user();
            $planType = $request->plan_type;
            $amount = $request->amount;

            Log::info('Order details', ['user_id' => $user->id, 'plan_type' => $planType, 'amount' => $amount]);

            // Verify amount matches the plan
            $expectedAmount = $planType === 'annual' ? 999 : 599;
            if ($amount != $expectedAmount) {
                Log::error('Amount mismatch', ['expected' => $expectedAmount, 'received' => $amount]);
                return response()->json(['error' => 'Invalid amount for selected plan'], 400);
            }

            // Create payment record
            $payment = Payment::create([
                'user_id' => $user->id,
                'plan_type' => $planType,
                'amount' => $amount,
                'currency' => 'INR',
                'status' => 'pending',
            ]);

            Log::info('Payment record created', ['payment_id' => $payment->id]);

            // Get Razorpay API instance
            $api = $this->getRazorpayApi();

            // Create Razorpay order
            $orderData = [
                'receipt' => 'order_rcptid_' . $payment->id,
                'amount' => $amount * 100, // Amount in paise
                'currency' => 'INR',
                'notes' => [
                    'user_id' => $user->id,
                    'plan_type' => $planType,
                    'payment_id' => $payment->id,
                ]
            ];

            Log::info('Creating Razorpay order', $orderData);
            $razorpayOrder = $api->order->create($orderData);
            Log::info('Razorpay order created', ['order_id' => $razorpayOrder['id']]);

            // Update payment with order ID
            $payment->update([
                'razorpay_order_id' => $razorpayOrder['id']
            ]);

            return response()->json([
                'success' => true,
                'order_id' => $razorpayOrder['id'],
                'amount' => $amount * 100,
                'currency' => 'INR',
                'key' => config('services.razorpay.key'),
                'name' => config('app.name'),
                'description' => ucfirst($planType) . ' Subscription',
                'prefill' => [
                    'name' => $user->name,
                    'email' => $user->email,
                ]
            ]);

        } catch (\Exception $e) {
            Log::error('Razorpay Order Creation Error: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to create order. Please try again.'], 500);
        }
    }

    /**
     * Verify payment and update subscription
     */
    public function verifyPayment(Request $request)
    {
        try {
            Log::info('Verify payment request', $request->all());
            
            $request->validate([
                'razorpay_payment_id' => 'required',
                'razorpay_order_id' => 'required',
                'razorpay_signature' => 'required',
            ]);

            // Find payment by order ID
            $payment = Payment::where('razorpay_order_id', $request->razorpay_order_id)->first();

            if (!$payment) {
                Log::error('Payment not found', ['order_id' => $request->razorpay_order_id]);
                return response()->json(['error' => 'Payment not found'], 404);
            }

            // Get Razorpay API instance
            $api = $this->getRazorpayApi();

            // Verify signature
            $attributes = [
                'razorpay_order_id' => $request->razorpay_order_id,
                'razorpay_payment_id' => $request->razorpay_payment_id,
                'razorpay_signature' => $request->razorpay_signature
            ];

            Log::info('Verifying payment signature');
            $api->utility->verifyPaymentSignature($attributes);
            Log::info('Signature verified successfully');

            // Fetch payment details from Razorpay
            $razorpayPayment = $api->payment->fetch($request->razorpay_payment_id);

            // Update payment record
            $payment->update([
                'razorpay_payment_id' => $request->razorpay_payment_id,
                'razorpay_signature' => $request->razorpay_signature,
                'status' => 'success',
                'payment_method' => $razorpayPayment->method ?? null,
                'paid_at' => now(),
            ]);

            Log::info('Payment record updated', ['payment_id' => $payment->id]);

            // Update user subscription
            $this->updateUserSubscription($payment);

            return response()->json([
                'success' => true,
                'message' => 'Payment verified successfully',
                'redirect' => route('payment.success', ['payment' => $payment->id])
            ]);

        } catch (\Razorpay\Api\Errors\SignatureVerificationError $e) {
            Log::error('Payment Signature Verification Failed: ' . $e->getMessage());
            
            if (isset($payment)) {
                $payment->update([
                    'status' => 'failed',
                    'error_description' => 'Signature verification failed'
                ]);
            }

            return response()->json(['error' => 'Payment verification failed'], 400);

        } catch (\Exception $e) {
            Log::error('Payment Verification Error: ' . $e->getMessage());
            return response()->json(['error' => 'Payment verification failed. Please contact support.'], 500);
        }
    }

    /**
     * Update user's subscription details
     */
    private function updateUserSubscription($payment)
    {
        $user = $payment->user;

        // Calculate renewal date
        $renewalDate = $payment->plan_type === 'annual' 
            ? Carbon::now()->addYear() 
            : Carbon::now()->addMonths(3);

        // Update user subscription details
        $user->update([
            'subscription_type' => 'premium',
            'join_date' => $user->join_date ?? now(),
            'renewal_date' => $renewalDate,
            'status' => 1,
        ]);
    }

    /**
     * Show payment success page
     */
    public function success($paymentId)
    {
        $payment = Payment::with('user')->findOrFail($paymentId);

        // Verify the payment belongs to the authenticated user
        if ($payment->user_id !== Auth::id()) {
            abort(403);
        }

        return view('payment-success', compact('payment'));
    }

    /**
     * Handle payment failure
     */
    public function failed(Request $request)
    {
        $orderId = $request->query('order_id');
        $payment = Payment::where('razorpay_order_id', $orderId)->first();

        if ($payment) {
            $payment->update([
                'status' => 'failed',
                'error_description' => $request->query('error', 'Payment failed')
            ]);
        }

        return view('payment-failed', compact('payment'));
    }
}
