<!DOCTYPE html>
<html lang="en">
@include('partials.innerheader')

        <!-- page-title -->
        <section class="page-title centred pt_90 pb_0">
            <div class="pattern-layer rotate-me" style="background-image: url({{ asset('assets/images/shape/shape-34.png') }});"></div>
            <div class="auto-container">
                <div class="content-box">
                    <h1>About Us</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>About Us</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- page-title end -->

        <!-- about-section -->
        <section class="about-section pt_100 pb_100">
            <div class="auto-container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="content_block_one">
                            <div class="content-box mr_80">
                                <div class="sec-title pb_30">
                                    <span class="sub-title mb_14">Who We Are</span>
                                    <h2>About Invexo</h2>
                                </div>
                                <p class="intro-text mb_30" style="font-size: 16px; line-height: 1.8; color: #666;">
                                    At Invexo, we specialize in swing trading and long-term investing. Unlike intraday speculation, our strategies are designed to help investors achieve consistent, sustainable growth.
                                </p>
                                
                                <!-- Mission & Vision -->
                                <div class="row clearfix mb_40">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="single-item mb_30">
                                            <div class="icon-box mb_15">
                                                <i class="icon-29" style="font-size: 30px; color: #ff6b35;"></i>
                                            </div>
                                            <h4 style="color: #252525; margin-bottom: 10px;">Our Mission</h4>
                                            <p style="font-size: 14px; line-height: 1.6; color: #777;">
                                                To empower Indian investors with reliable swing trading and long-term investment insights.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="single-item mb_30">
                                            <div class="icon-box mb_15">
                                                <i class="icon-29" style="font-size: 30px; color: #ff6b35;"></i>
                                            </div>
                                            <h4 style="color: #252525; margin-bottom: 10px;">Our Vision</h4>
                                            <p style="font-size: 14px; line-height: 1.6; color: #777;">
                                                To become India's most trusted platform for sustainable wealth creation.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 video-column">
                        <div class="video_block_one">
                            <div class="video-box z_1 p_relative ml_70 centred">
                                <div class="video-inner" style="background-image: url({{ asset('assets/images/resource/video-1.jpg') }});">
                                    <div class="video-content">
                                        <div class="curve-text">
                                            <span class="curved-circle">watch&nbsp;&nbsp;the&nbsp;&nbsp;video&nbsp;&nbsp;right&nbsp;&nbsp;now&nbsp;&nbsp;</span>
                                        </div>
                                        <a href="https://www.youtube.com/watch?v=nfP5N9Yc72A&amp;t=28s" class="lightbox-image video-btn" data-caption=""><i class="icon-11"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about-section end -->

        <!-- Core Strengths Section -->
        <section class="account-section pt_100 pb_70">
            <div class="pattern-layer" style="background-image: url({{ asset('assets/images/shape/shape-1.png') }});"></div>
            <div class="auto-container">
                <div class="sec-title pb_60 centred">
                    <span class="sub-title mb_14">Our Expertise</span>
                    <h2>Core Strengths</h2>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-3 col-md-6 col-sm-12 account-block">
                        <div class="account-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="icon-box" style="background:#28a745; border-radius:50%; width:70px; height:70px; display:flex; align-items:center; justify-content:center; margin:0 auto 20px auto;">
                                    <i class="fas fa-chart-bar" style="font-size: 36px; color: #fff;"></i>
                                </div>
                                <h3 style="color:#28a745;"><a href="#" style="color:#28a745;">Research-Driven Trade Calls</a></h3>
                                <p style="color:#333;">Our swing trade calls are backed by thorough market research and technical analysis.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 account-block">
                        <div class="account-block-one wow fadeInUp animated" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="icon-box" style="background:#28a745; border-radius:50%; width:70px; height:70px; display:flex; align-items:center; justify-content:center; margin:0 auto 20px auto;">
                                    <i class="fas fa-briefcase" style="font-size: 36px; color: #fff;"></i>
                                </div>
                                <h3 style="color:#28a745;"><a href="#" style="color:#28a745;">Long-Term Portfolio Guidance</a></h3>
                                <p style="color:#333;">Strategic guidance for building wealth through long-term investment strategies.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 account-block">
                        <div class="account-block-one wow fadeInUp animated" data-wow-delay="400ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="icon-box" style="background:#28a745; border-radius:50%; width:70px; height:70px; display:flex; align-items:center; justify-content:center; margin:0 auto 20px auto;">
                                    <i class="fab fa-bitcoin" style="font-size: 36px; color: #fff;"></i>
                                </div>
                                <h3 style="color:#28a745;"><a href="#" style="color:#28a745;">Crypto Insights</a></h3>
                                <p style="color:#333;">Cryptocurrency insights specifically tailored for Indian investors and market conditions.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 account-block">
                        <div class="account-block-one wow fadeInUp animated" data-wow-delay="600ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="icon-box" style="background:#28a745; border-radius:50%; width:70px; height:70px; display:flex; align-items:center; justify-content:center; margin:0 auto 20px auto;">
                                    <i class="fas fa-seedling" style="font-size: 36px; color: #fff;"></i>
                                </div>
                                <h3 style="color:#28a745;"><a href="#" style="color:#28a745;">Wealth Growth Focus</a></h3>
                                <p style="color:#333;">Focus on sustainable wealth growth, not speculation or short-term gains.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Core Strengths Section end -->

        <!-- call to action section -->
        <section class="cta-section centred pt_80 pb_80" style="background: linear-gradient(135deg, #28a745 0%, #20c997 100%);">
            <div class="auto-container">
                <div class="content-box">
                    <h2 style="color: #fff; margin-bottom: 20px;">Ready to Start Your Investment Journey?</h2>
                    <p style="color: #fff; font-size: 18px; margin-bottom: 30px;">
                        Join thousands of investors who trust Invexo for their trading and investment needs.
                    </p>
                    <div class="btn-box">
                            <a href="" class="cta-btn" id="get-started-btn">Get Started Today</a>
                            <a href="{{ url('/') }}" class="cta-btn" id="learn-more-btn" style="margin-left: 15px;">Learn More</a>
    <style>
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
        }
        .cta-btn:hover, .cta-btn:focus {
            background: #000;
            color: #fff !important;
            border: 2px solid #fff;
            text-decoration: none;
        }
    </style>
                    </div>
                </div>
            </div>
        </section>
        <!-- call to action section end -->

@include('partials.innerfooter')

       
