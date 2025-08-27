<!DOCTYPE html>
<html lang="en">
@include('partials.innerheader')

        <!-- page-title -->
        <section class="page-title centred pt_90 pb_0">
            <div class="pattern-layer rotate-me" style="background-image: url({{ asset('assets/images/shape/shape-34.png') }});"></div>
            <div class="auto-container">
                <div class="content-box">
                    <h1>Services</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>Services</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- page-title end -->

        <!-- services-section -->
        <section class="services-section pt_100 pb_100">
            <div class="auto-container">
                <div class="sec-title centred pb_60">
                    <span class="sub-title mb_14">What We Offer</span>
                    <h2>Our Services</h2>
                    <p>Comprehensive trading and investment solutions tailored for your financial growth</p>
                </div>
                
                <div class="row clearfix">
                    <!-- Stock Market Advisory -->
                    <div class="col-lg-4 col-md-6 col-sm-12 service-block">
                        <div class="service-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="icon-box" style="background:#28a745; border-radius:50%; width:80px; height:80px; display:flex; align-items:center; justify-content:center; margin:0 auto 25px auto;">
                                    <i class="fas fa-chart-line" style="font-size: 40px; color: #fff;"></i>
                                </div>
                                <h3 style="color:#28a745; margin-bottom: 20px;">Stock Market Advisory</h3>
                                <ul class="list-style-one" style="text-align: left;">
                                    <li style="margin-bottom: 10px;"><i class="fas fa-check-circle" style="color: #28a745; margin-right: 8px;"></i>Swing trading buy/sell calls</li>
                                    <li style="margin-bottom: 10px;"><i class="fas fa-check-circle" style="color: #28a745; margin-right: 8px;"></i>Long-term portfolio recommendations</li>
                                    <li style="margin-bottom: 10px;"><i class="fas fa-check-circle" style="color: #28a745; margin-right: 8px;"></i>Quarterly earnings insights</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Crypto Insights -->
                    <div class="col-lg-4 col-md-6 col-sm-12 service-block">
                        <div class="service-block-one wow fadeInUp animated" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="icon-box" style="background:#28a745; border-radius:50%; width:80px; height:80px; display:flex; align-items:center; justify-content:center; margin:0 auto 25px auto;">
                                    <i class="fab fa-bitcoin" style="font-size: 40px; color: #fff;"></i>
                                </div>
                                <h3 style="color:#28a745; margin-bottom: 20px;">Crypto Insights</h3>
                                <ul class="list-style-one" style="text-align: left;">
                                    <li style="margin-bottom: 10px;"><i class="fas fa-check-circle" style="color: #28a745; margin-right: 8px;"></i>Swing trading entry & exit signals</li>
                                    <li style="margin-bottom: 10px;"><i class="fas fa-check-circle" style="color: #28a745; margin-right: 8px;"></i>Long-hold investment strategies</li>
                                    <li style="margin-bottom: 10px;"><i class="fas fa-check-circle" style="color: #28a745; margin-right: 8px;"></i>Sentiment + technical analysis</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Premium Member Benefits -->
                    <div class="col-lg-4 col-md-6 col-sm-12 service-block">
                        <div class="service-block-one wow fadeInUp animated" data-wow-delay="400ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="icon-box" style="background:#28a745; border-radius:50%; width:80px; height:80px; display:flex; align-items:center; justify-content:center; margin:0 auto 25px auto;">
                                    <i class="fas fa-crown" style="font-size: 40px; color: #fff;"></i>
                                </div>
                                <h3 style="color:#28a745; margin-bottom: 20px;">Premium Member Benefits</h3>
                                <ul class="list-style-one" style="text-align: left;">
                                    <li style="margin-bottom: 10px;"><i class="fas fa-check-circle" style="color: #28a745; margin-right: 8px;"></i>Full access to recommendations</li>
                                    <li style="margin-bottom: 10px;"><i class="fas fa-check-circle" style="color: #28a745; margin-right: 8px;"></i>Research reports</li>
                                    <li style="margin-bottom: 10px;"><i class="fas fa-check-circle" style="color: #28a745; margin-right: 8px;"></i>Priority member support</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- services-section end -->

        <!-- Why Choose Us Section -->
        <section class="funfact-section pt_80 pb_80" style="background: #f8f9fa;">
            <div class="auto-container">
                <div class="sec-title centred pb_60">
                    <span class="sub-title mb_14">Why Choose Us</span>
                    <h2>Our Commitment to Excellence</h2>
                </div>
                <div class="inner-container">
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-6 col-sm-12 funfact-block">
                            <div class="funfact-block-one">
                                <div class="inner-box">
                                    <div class="count-outer">
                                        <span class="odometer" data-count="98">00</span>%<span class="text">Success Rate</span>
                                    </div>
                                    <p>High accuracy in our trading recommendations and market predictions</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 funfact-block">
                            <div class="funfact-block-one">
                                <div class="inner-box">
                                    <div class="count-outer">
                                        <span class="odometer" data-count="5000">00</span>+<span class="text">Happy Clients</span>
                                    </div>
                                    <p>Trusted by thousands of investors across India for reliable insights</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 funfact-block">
                            <div class="funfact-block-one">
                                <div class="inner-box">
                                    <div class="count-outer">
                                        <span class="odometer" data-count="24">00</span>/<span class="odometer" data-count="7">0</span><span class="text">Support</span>
                                    </div>
                                    <p>Round-the-clock customer support for all your trading queries</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Why Choose Us Section end -->

        <!-- call to action section -->
        <section class="cta-section centred pt_80 pb_80" style="background: linear-gradient(135deg, #28a745 0%, #20c997 100%);">
            <div class="auto-container">
                <div class="content-box">
                    <h2 style="color: #fff; margin-bottom: 20px;">Ready to Start Your Trading Journey?</h2>
                    <p style="color: #fff; font-size: 18px; margin-bottom: 30px;">
                        Get access to our premium services and start making informed trading decisions today.
                    </p>
                    <div class="btn-box">
                        <a href="" class="cta-btn">Get Started Today</a>
                        <a href="{{ route('about') }}" class="cta-btn" style="margin-left: 15px;">Learn More About Us</a>
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
        .service-block-one {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            padding: 40px 30px;
            text-align: center;
            transition: all 0.3s ease;
            height: 100%;
        }
        .service-block-one:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
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

</body><!-- End of .page_wrapper -->

</html>
