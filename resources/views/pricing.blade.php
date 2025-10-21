<!DOCTYPE html>
<html lang="en">
@include('partials.innerheader')

        <!-- page-title -->
        <section class="page-title centred pt_90 pb_0">
            <div class="pattern-layer rotate-me" style="background-image: url({{ asset('assets/images/shape/shape-34.png') }});"></div>
            <div class="auto-container">
                <div class="content-box">
                    <h1>Pricing</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>Pricing</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- page-title end -->

        <!-- pricing-section -->
        <section class="pricing-section pt_100 pb_100">
            <div class="auto-container">
                <div class="sec-title centred pb_60">
                    <span class="sub-title mb_14">Choose Your Plan</span>
                    <h2>Pricing Plans</h2>
                    <p>Select the perfect plan that fits your investment goals and budget</p>
                </div>
                
                <div class="row clearfix">
                    <!-- Free Plan -->
                    <div class="col-lg-4 col-md-6 col-sm-12 pricing-block">
                        <div class="pricing-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="price-header">
                                    <h3 style="color:#252525; margin-bottom: 10px;">Free Plan</h3>
                                    <div class="price-amount">
                                        <span class="currency">₹</span>
                                        <span class="amount">0</span>
                                        <span class="duration">/month</span>
                                    </div>
                                </div>
                                <div class="features-list">
                                    <ul>
                                        <li><i class="fas fa-check-circle" style="color: #28a745; margin-right: 8px;"></i>Daily highlights (2 lines visible)</li>
                                        <li><i class="fas fa-check-circle" style="color: #28a745; margin-right: 8px;"></i>Blog/insights access</li>
                                        <li><i class="fas fa-check-circle" style="color: #28a745; margin-right: 8px;"></i>Blurred premium content</li>
                                        <li style="color: #ccc;"><i class="fas fa-times-circle" style="color: #ccc; margin-right: 8px;"></i>Real-time alerts</li>
                                        <li style="color: #ccc;"><i class="fas fa-times-circle" style="color: #ccc; margin-right: 8px;"></i>Research reports</li>
                                    </ul>
                                </div>
                                <div class="btn-box">
                                    <a href="" class="pricing-btn">Get Started</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Premium Plan -->
                    <div class="col-lg-4 col-md-6 col-sm-12 pricing-block">
                        <div class="pricing-block-one premium-plan wow fadeInUp animated" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="popular-badge">Most Popular</div>
                                <div class="price-header">
                                    <h3 style="color:#28a745; margin-bottom: 10px;">Premium Plan</h3>
                                    <div class="price-toggle mb_20">
                                        <button class="toggle-btn active" data-plan="annual">Annual</button>
                                        <button class="toggle-btn" data-plan="quarterly">Quarterly</button>
                                    </div>
                                    <div class="price-amount" id="annual-price">
                                        <span class="currency">₹</span>
                                        <span class="amount">999</span>
                                        <span class="duration">/year</span>
                                    </div>
                                    <div class="price-amount" id="quarterly-price" style="display: none;">
                                        <span class="currency">₹</span>
                                        <span class="amount">599</span>
                                        <span class="duration">/3 months</span>
                                    </div>
                                </div>
                                <div class="features-list">
                                    <ul>
                                        <li><i class="fas fa-check-circle" style="color: #28a745; margin-right: 8px;"></i>Swing trading & long-term investment recommendations</li>
                                        <li><i class="fas fa-check-circle" style="color: #28a745; margin-right: 8px;"></i>Full stock & crypto calls</li>
                                        <li><i class="fas fa-check-circle" style="color: #28a745; margin-right: 8px;"></i>Real-time alerts</li>
                                        <li><i class="fas fa-check-circle" style="color: #28a745; margin-right: 8px;"></i>Research reports</li>
                                        <li><i class="fas fa-check-circle" style="color: #28a745; margin-right: 8px;"></i>Priority support</li>
                                    </ul>
                                </div>
                                <div class="btn-box">
                                    <a href="" class="pricing-btn premium">Subscribe Now</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Custom Plan -->
                    {{--<div class="col-lg-4 col-md-6 col-sm-12 pricing-block">
                        <div class="pricing-block-one wow fadeInUp animated" data-wow-delay="400ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="price-header">
                                    <h3 style="color:#252525; margin-bottom: 10px;">Custom Plan</h3>
                                    <div class="price-amount">
                                        <span class="currency"></span>
                                        <span class="amount">Custom</span>
                                        <span class="duration">Pricing</span>
                                    </div>
                                </div>
                                <div class="features-list">
                                    <ul>
                                        <li><i class="fas fa-check-circle" style="color: #28a745; margin-right: 8px;"></i>Advisory for HNIs/institutions</li>
                                        <li><i class="fas fa-check-circle" style="color: #28a745; margin-right: 8px;"></i>Tailored portfolio strategies</li>
                                        <li><i class="fas fa-check-circle" style="color: #28a745; margin-right: 8px;"></i>Dedicated relationship manager</li>
                                        <li><i class="fas fa-check-circle" style="color: #28a745; margin-right: 8px;"></i>Custom research reports</li>
                                        <li><i class="fas fa-check-circle" style="color: #28a745; margin-right: 8px;"></i>24/7 priority support</li>
                                    </ul>
                                </div>
                                <div class="btn-box">
                                    <a href="{{ url('contact') }}" class="pricing-btn">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>--}}
                </div>
            </div>
        </section>
        <!-- pricing-section end -->

        <!-- call to action section -->
        <section class="cta-section centred pt_80 pb_80" style="background: linear-gradient(135deg, #28a745 0%, #20c997 100%);">
            <div class="auto-container">
                <div class="content-box">
                    <h2 style="color: #fff; margin-bottom: 20px;">Choose your plan and unlock your full potential.</h2>
                    <p style="color: #fff; font-size: 18px; margin-bottom: 30px;">
                        Start your journey towards smarter investments and consistent returns today.
                    </p>
                    <div class="btn-box">
                        <a href="" class="cta-btn">Subscribe Now</a>
                        <a href="{{ route('services') }}" class="cta-btn" style="margin-left: 15px;">View Services</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- call to action section end -->

@include('partials.innerfooter')

        <!--Scroll to top-->
        <button class="scroll-to-top scroll-to-target" data-target="html">
            <span class="fa fa-arrow-up"></span>
        </button>

    </div>

    <style>
        .pricing-block-one {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            padding: 40px 30px;
            text-align: center;
            transition: all 0.3s ease;
            height: 100%;
            position: relative;
            border: 2px solid transparent;
        }
        .pricing-block-one:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }
        .premium-plan {
            border: 2px solid #28a745 !important;
        }
        .premium-plan:hover {
            border: 2px solid #28a745 !important;
        }
        .popular-badge {
            position: absolute;
            top: -15px;
            left: 50%;
            transform: translateX(-50%);
            background: #28a745;
            color: #fff;
            padding: 8px 20px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
        }
        .price-header {
            margin-bottom: 30px;
        }
        .price-amount {
            margin: 20px 0;
        }
        .price-amount .currency {
            font-size: 20px;
            color: #28a745;
            font-weight: 600;
        }
        .price-amount .amount {
            font-size: 48px;
            color: #28a745;
            font-weight: 700;
        }
        .price-amount .duration {
            font-size: 16px;
            color: #666;
        }
        .price-toggle {
            display: flex;
            justify-content: center;
            gap: 10px;
        }
        .toggle-btn {
            background: #f8f9fa;
            border: 1px solid #ddd;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .toggle-btn.active {
            background: #28a745;
            color: #fff;
            border-color: #28a745;
        }
        .features-list {
            margin-bottom: 30px;
        }
        .features-list ul {
            list-style: none;
            padding: 0;
        }
        .features-list li {
            padding: 8px 0;
            text-align: left;
            font-size: 15px;
        }
        .pricing-btn {
            background: #28a745;
            color: #fff !important;
            border: 2px solid #28a745;
            padding: 12px 32px;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 600;
            text-transform: uppercase;
            transition: all 0.3s ease;
            display: inline-block;
            text-decoration: none;
            width: 100%;
        }
        .pricing-btn:hover, .pricing-btn:focus {
            background: #fff;
            color: #28a745 !important;
            border: 2px solid #28a745;
            text-decoration: none;
        }
        .pricing-btn.premium {
            background: #28a745;
            border: 2px solid #28a745;
        }
        .pricing-btn.premium:hover {
            background: #fff;
            color: #28a745 !important;
        }
        .cta-btn {
            background: #28a745;
            color: #fff !important;
            border: 2px solid #fff;
            padding: 12px 32px;
            border-radius: 4px;
            font-size: 18px;
            font-weight: 600;
            text-transform: uppercase;
            transition: background 0.2s, color 0.2s;
            display: inline-block;
            text-decoration: none;
        }
        .cta-btn:hover, .cta-btn:focus {
            background: #000;
            color: #fff !important;
            border: 2px solid #fff;
            text-decoration: none;
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

    <script>
        // Price toggle functionality
        document.querySelectorAll('.toggle-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const plan = this.getAttribute('data-plan');
                const toggleBtns = this.parentElement.querySelectorAll('.toggle-btn');
                
                // Remove active class from all buttons
                toggleBtns.forEach(b => b.classList.remove('active'));
                
                // Add active class to clicked button
                this.classList.add('active');
                
                // Show/hide price amounts
                if (plan === 'annual') {
                    document.getElementById('annual-price').style.display = 'block';
                    document.getElementById('quarterly-price').style.display = 'none';
                } else {
                    document.getElementById('annual-price').style.display = 'none';
                    document.getElementById('quarterly-price').style.display = 'block';
                }
            });
        });
    </script>

</body><!-- End of .page_wrapper -->

</html>
