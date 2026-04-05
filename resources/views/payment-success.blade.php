<!DOCTYPE html>
<html lang="en">
@include('partials.innerheader')

<!-- page-title -->
<section class="page-title centred pt_90 pb_0">
    <div class="pattern-layer rotate-me" style="background-image: url({{ asset('assets/images/shape/shape-34.png') }});"></div>
    <div class="auto-container">
        <div class="content-box">
            <h1>Payment Successful</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Payment Success</li>
            </ul>
        </div>
    </div>
</section>
<!-- page-title end -->

<!-- success-section -->
<section class="success-section pt_100 pb_100">
    <div class="auto-container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="success-box text-center">
                    <div class="success-icon mb_30">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <h2 class="mb_20">Payment Successful!</h2>
                    <p class="success-message mb_40">
                        Thank you for subscribing to our Premium Plan. Your subscription has been activated successfully.
                    </p>

                    <!-- Payment Details -->
                    <div class="payment-details-box mb_40">
                        <h4 class="mb_20">Payment Details</h4>
                        <div class="details-content">
                            <div class="detail-row">
                                <span class="label">Payment ID:</span>
                                <span class="value">{{ $payment->razorpay_payment_id }}</span>
                            </div>
                            <div class="detail-row">
                                <span class="label">Order ID:</span>
                                <span class="value">{{ $payment->razorpay_order_id }}</span>
                            </div>
                            <div class="detail-row">
                                <span class="label">Plan:</span>
                                <span class="value">Premium - {{ ucfirst($payment->plan_type) }}</span>
                            </div>
                            <div class="detail-row">
                                <span class="label">Amount Paid:</span>
                                <span class="value">₹{{ number_format($payment->amount, 2) }}</span>
                            </div>
                            <div class="detail-row">
                                <span class="label">Payment Date:</span>
                                <span class="value">{{ $payment->paid_at->format('d M Y, h:i A') }}</span>
                            </div>
                            <div class="detail-row">
                                <span class="label">Renewal Date:</span>
                                <span class="value">{{ $payment->user->renewal_date->format('d M Y') }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="action-buttons">
                        <a href="{{ route('user.dashboard') }}" class="theme-btn">
                            <i class="fas fa-tachometer-alt"></i> Go to Dashboard
                        </a>
                        <a href="{{ url('/') }}" class="theme-btn btn-outline">
                            <i class="fas fa-home"></i> Back to Home
                        </a>
                    </div>

                    <p class="note-text mt_30">
                        <i class="fas fa-info-circle"></i> A confirmation email has been sent to {{ $payment->user->email }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- success-section end -->

@include('partials.innerfooter')

<!--Scroll to top-->
<button class="scroll-to-top scroll-to-target" data-target="html">
    <span class="fa fa-arrow-up"></span>
</button>

</div>

<style>
    .success-box {
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.1);
        padding: 50px;
    }
    .success-icon i {
        font-size: 80px;
        color: #28a745;
    }
    .success-box h2 {
        color: #28a745;
        font-size: 36px;
        font-weight: 700;
    }
    .success-message {
        color: #666;
        font-size: 18px;
    }
    .payment-details-box {
        background: #f8f9fa;
        border-radius: 10px;
        padding: 30px;
        text-align: left;
    }
    .payment-details-box h4 {
        color: #252525;
        font-size: 22px;
        font-weight: 600;
        text-align: center;
    }
    .detail-row {
        display: flex;
        justify-content: space-between;
        padding: 12px 0;
        border-bottom: 1px solid #e0e0e0;
    }
    .detail-row:last-child {
        border-bottom: none;
    }
    .detail-row .label {
        color: #666;
        font-weight: 500;
    }
    .detail-row .value {
        color: #252525;
        font-weight: 600;
    }
    .theme-btn {
        background: #28a745;
        color: #fff !important;
        border: 2px solid #28a745;
        padding: 12px 30px;
        border-radius: 6px;
        font-size: 16px;
        font-weight: 600;
        text-transform: uppercase;
        transition: all 0.3s ease;
        display: inline-block;
        text-decoration: none;
        margin: 0 10px;
    }
    .theme-btn:hover {
        background: #218838;
        border-color: #218838;
        text-decoration: none;
    }
    .theme-btn.btn-outline {
        background: #fff;
        color: #28a745 !important;
        border: 2px solid #28a745;
    }
    .theme-btn.btn-outline:hover {
        background: #28a745;
        color: #fff !important;
    }
    .theme-btn i {
        margin-right: 8px;
    }
    .note-text {
        color: #666;
        font-size: 14px;
    }
    .note-text i {
        color: #28a745;
        margin-right: 5px;
    }
</style>

<!-- jequery plugins -->
<script src="{{ asset('assets/js/jquery.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/owl.js') }}"></script>
<script src="{{ asset('assets/js/wow.js') }}"></script>
<script src="{{ asset('assets/js/validation.js') }}"></script>
<script src="{{ asset('assets/js/jquery.fancybox.js') }}"></script>
<script src="{{ asset('assets/js/appear.js') }}"></script>

<!-- main-js -->
<script src="{{ asset('assets/js/script.js') }}"></script>

</body><!-- End of .page_wrapper -->
</html>
