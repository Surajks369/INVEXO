<!DOCTYPE html>
<html lang="en">
@include('partials.innerheader')

<!-- page-title -->
<section class="page-title centred pt_90 pb_0">
    <div class="pattern-layer rotate-me" style="background-image: url({{ asset('assets/images/shape/shape-34.png') }});"></div>
    <div class="auto-container">
        <div class="content-box">
            <h1>Checkout</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ route('pricing') }}">Pricing</a></li>
                <li>Checkout</li>
            </ul>
        </div>
    </div>
</section>
<!-- page-title end -->

<!-- checkout-section -->
<section class="checkout-section pt_100 pb_100">
    <div class="auto-container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="checkout-box">
                    <h2 class="text-center mb_40">Complete Your Subscription</h2>
                    
                    <!-- User Details -->
                    <div class="user-details-box mb_40">
                        <h4 class="mb_20"><i class="fas fa-user"></i> User Details</h4>
                        <div class="details-content">
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>Name:</strong> {{ $user->name }}</p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Email:</strong> {{ $user->email }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Plan Details -->
                    <div class="plan-details-box mb_40">
                        <h4 class="mb_20"><i class="fas fa-tags"></i> Plan Details</h4>
                        <div class="plan-content">
                            <div class="plan-item">
                                <span class="plan-label">Plan Name:</span>
                                <span class="plan-value">Premium Plan</span>
                            </div>
                            <div class="plan-item">
                                <span class="plan-label">Duration:</span>
                                <span class="plan-value">{{ $duration }}</span>
                            </div>
                            <div class="plan-item plan-features">
                                <span class="plan-label">Features:</span>
                                <ul class="features-list">
                                    <li><i class="fas fa-check-circle"></i> Swing trading & long-term investment recommendations</li>
                                    <li><i class="fas fa-check-circle"></i> Full stock & crypto calls</li>
                                    <li><i class="fas fa-check-circle"></i> Real-time alerts</li>
                                    <li><i class="fas fa-check-circle"></i> Research reports</li>
                                    <li><i class="fas fa-check-circle"></i> Priority support</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Price Summary -->
                    <div class="price-summary-box mb_40">
                        <h4 class="mb_20"><i class="fas fa-rupee-sign"></i> Price Summary</h4>
                        <div class="price-content">
                            <div class="price-row">
                                <span>Subscription Amount:</span>
                                <span class="amount">₹{{ number_format($amount, 2) }}</span>
                            </div>
                            <div class="price-row total">
                                <span>Total Amount:</span>
                                <span class="amount">₹{{ number_format($amount, 2) }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Button -->
                    <div class="payment-button-box text-center">
                        <button id="rzp-button" class="payment-btn">
                            <i class="fas fa-lock"></i> Pay ₹{{ number_format($amount, 2) }} Securely
                        </button>
                        <p class="secure-text mt_20">
                            <i class="fas fa-shield-alt"></i> Your payment is secured with Razorpay
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- checkout-section end -->

@include('partials.innerfooter')

<!--Scroll to top-->
<button class="scroll-to-top scroll-to-target" data-target="html">
    <span class="fa fa-arrow-up"></span>
</button>

</div>

<style>
    .checkout-box {
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.1);
        padding: 50px;
    }
    .checkout-box h2 {
        color: #252525;
        font-size: 32px;
        font-weight: 700;
    }
    .user-details-box, .plan-details-box, .price-summary-box {
        background: #f8f9fa;
        border-radius: 10px;
        padding: 25px;
    }
    .user-details-box h4, .plan-details-box h4, .price-summary-box h4 {
        color: #28a745;
        font-size: 20px;
        font-weight: 600;
    }
    .user-details-box i, .plan-details-box i, .price-summary-box i {
        margin-right: 10px;
    }
    .details-content p {
        margin-bottom: 10px;
        color: #252525;
        font-size: 16px;
    }
    .plan-item {
        display: flex;
        justify-content: space-between;
        padding: 10px 0;
        border-bottom: 1px solid #e0e0e0;
    }
    .plan-item:last-child {
        border-bottom: none;
    }
    .plan-item.plan-features {
        flex-direction: column;
    }
    .plan-label {
        color: #666;
        font-weight: 500;
    }
    .plan-value {
        color: #252525;
        font-weight: 600;
    }
    .features-list {
        list-style: none;
        padding: 10px 0 0 0;
        margin: 0;
    }
    .features-list li {
        padding: 5px 0;
        color: #252525;
        font-size: 15px;
    }
    .features-list i {
        color: #28a745;
        margin-right: 8px;
    }
    .price-row {
        display: flex;
        justify-content: space-between;
        padding: 12px 0;
        font-size: 16px;
    }
    .price-row.total {
        border-top: 2px solid #28a745;
        margin-top: 10px;
        padding-top: 15px;
        font-size: 20px;
        font-weight: 700;
        color: #28a745;
    }
    .price-row .amount {
        font-weight: 600;
    }
    .payment-btn {
        background: #28a745;
        color: #fff;
        border: none;
        padding: 18px 50px;
        border-radius: 8px;
        font-size: 18px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        text-transform: uppercase;
    }
    .payment-btn:hover {
        background: #218838;
        transform: translateY(-2px);
        box-shadow: 0 5px 20px rgba(40, 167, 69, 0.3);
    }
    .payment-btn i {
        margin-right: 10px;
    }
    .secure-text {
        color: #666;
        font-size: 14px;
    }
    .secure-text i {
        color: #28a745;
    }
</style>

<!-- jQuery must load FIRST -->
<script src="{{ asset('assets/js/jquery.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

<!-- Razorpay SDK - Load EARLY before other scripts that might have errors -->
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>
console.log('Payment script loaded');
console.log('jQuery loaded:', typeof jQuery !== 'undefined');
console.log('$ loaded:', typeof $ !== 'undefined');

if (typeof $ === 'undefined') {
    alert('ERROR: jQuery is not loaded! Please contact support.');
    console.error('jQuery is not available');
} else {
    console.log('jQuery version:', $.fn.jquery);
}

$(document).ready(function() {
    console.log('Document ready fired!');
    console.log('Button exists:', $('#rzp-button').length > 0);
    console.log('Button element:', $('#rzp-button'));
    
    $('#rzp-button').on('click', function(e) {
        e.preventDefault();
        console.log('Payment button clicked');
        
        const button = $(this);
        const originalText = button.html();
        button.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Processing...');

        console.log('Creating order...');
        
        // Create order on server
        $.ajax({
            url: '{{ route("payment.create-order") }}',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                plan_type: '{{ $planType }}',
                amount: {{ $amount }}
            },
            success: function(response) {
                console.log('Order created:', response);
                if (response.success) {
                    // Initialize Razorpay with all payment methods
                    var options = {
                        key: response.key,
                        amount: response.amount,
                        currency: response.currency,
                        name: response.name,
                        description: response.description,
                        order_id: response.order_id,
                        prefill: response.prefill,
                        notes: {
                            plan_type: '{{ $planType }}',
                            user_id: '{{ auth()->user()->id }}'
                        },
                        method: {
                            netbanking: true,
                            card: true,
                            wallet: true,
                            upi: true
                        },
                        config: {
                            display: {
                                language: 'en'
                            }
                        },
                        theme: {
                            color: '#28a745',
                            backdrop_color: 'rgba(0,0,0,0.5)'
                        },
                        modal: {
                            ondismiss: function() {
                                console.log('Payment modal dismissed');
                                button.prop('disabled', false).html(originalText);
                            },
                            escape: true,
                            backdropclose: false
                        },
                        handler: function(razorpayResponse) {
                            console.log('Payment successful, verifying...');
                            // Verify payment on server
                            $.ajax({
                                url: '{{ route("payment.verify") }}',
                                type: 'POST',
                                data: {
                                    _token: '{{ csrf_token() }}',
                                    razorpay_payment_id: razorpayResponse.razorpay_payment_id,
                                    razorpay_order_id: razorpayResponse.razorpay_order_id,
                                    razorpay_signature: razorpayResponse.razorpay_signature
                                },
                                success: function(verifyResponse) {
                                    console.log('Verification response:', verifyResponse);
                                    if (verifyResponse.success) {
                                        window.location.href = verifyResponse.redirect;
                                    } else {
                                        alert('Payment verification failed. Please contact support.');
                                        button.prop('disabled', false).html(originalText);
                                    }
                                },
                                error: function(xhr, status, error) {
                                    console.error('Verification error:', xhr, status, error);
                                    alert('Payment verification failed. Please contact support.');
                                    button.prop('disabled', false).html(originalText);
                                }
                            });
                        }
                    };

                    console.log('Opening Razorpay modal with options:', options);
                    var razorpay = new Razorpay(options);
                    razorpay.on('payment.failed', function(response) {
                        console.error('Payment failed:', response.error);
                        alert('Payment failed: ' + response.error.description);
                        button.prop('disabled', false).html(originalText);
                    });
                    razorpay.open();
                } else {
                    console.error('Order creation failed:', response);
                    alert('Failed to create order. Please try again.');
                    button.prop('disabled', false).html(originalText);
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX error:', xhr, status, error);
                console.error('Response:', xhr.responseText);
                const errorMessage = xhr.responseJSON?.error || 'Failed to create order. Please try again.';
                alert(errorMessage);
                button.prop('disabled', false).html(originalText);
            }
        });
    });
});

// FALLBACK: Vanilla JavaScript event listener for testing
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOMContentLoaded fired!');
    const button = document.getElementById('rzp-button');
    console.log('Vanilla JS - Button found:', button !== null);
    
    if (button) {
        console.log('Adding vanilla click listener...');
        button.addEventListener('click', function(e) {
            console.log('VANILLA CLICK DETECTED!');
        });
    }
});
</script>

<!-- Load other scripts AFTER payment script to avoid errors blocking payment functionality -->
<script src="{{ asset('assets/js/owl.js') }}"></script>
<script src="{{ asset('assets/js/wow.js') }}"></script>
<script src="{{ asset('assets/js/validation.js') }}"></script>
<script src="{{ asset('assets/js/jquery.fancybox.js') }}"></script>
<script src="{{ asset('assets/js/appear.js') }}"></script>

<!-- main-js (has niceSelect error but won't block payment now) -->
<script src="{{ asset('assets/js/script.js') }}"></script>

</body><!-- End of .page_wrapper -->
</html>
