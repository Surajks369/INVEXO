@include('partials.innerheader')

<!-- Mobile Menu  -->
<div class="mobile-menu">
    <div class="menu-backdrop"></div>
    <div class="close-btn"><i class="fas fa-times"></i></div>
    <nav class="menu-box">
        <div class="nav-logo"><a href="{{ url('/') }}"><img src="{{ asset('assets/images/logo-2.png') }}" alt="" title=""></a></div>
        <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
        <div class="contact-info">
            <h4>Contact Info</h4>
            <ul>
                <li>Chicago 12, Melborne City, USA</li>
                <li><a href="tel:+8801682648101">+88 01682648101</a></li>
                <li><a href="mailto:info@example.com">info@example.com</a></li>
            </ul>
        </div>
        <div class="social-links">
            <ul class="clearfix">
                <li><a href="{{ url('/') }}"><span class="fab fa-twitter"></span></a></li>
                <li><a href="{{ url('/') }}"><span class="fab fa-facebook-square"></span></a></li>
                <li><a href="{{ url('/') }}"><span class="fab fa-pinterest-p"></span></a></li>
                <li><a href="{{ url('/') }}"><span class="fab fa-instagram"></span></a></li>
                <li><a href="{{ url('/') }}"><span class="fab fa-youtube"></span></a></li>
            </ul>
        </div>
    </nav>
</div>
<!-- End Mobile Menu -->

<!-- page-title -->
<section class="page-title centred pt_90 pb_0">
    <div class="pattern-layer rotate-me"></div>
    <div class="auto-container">
        <div class="content-box">
            <h1>Subscription Plans</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Subscriptions</li>
            </ul>
        </div>
    </div>
</section>
<!-- page-title end -->

<!-- subscription-section -->
<section class="contact-section pt_90 pb_100">
    <div class="auto-container">
        <!-- User Welcome Section -->
        <div class="row">
            <div class="col-lg-12">
                <div class="welcome-card mb_50">
                    <div class="welcome-content">
                        <h2>Welcome back, {{ $user->name }}!</h2>
                        <p class="expired-message">Your subscription has expired. Please choose a plan to continue accessing our services.</p>
                        <div class="logout-btn">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pricing Section (from pricing page) -->
        <div class="sec-title centred pb_60">
            <span class="sub-title mb_14">Choose Your Plan</span>
            <h2>Pricing Plans</h2>
            <p>Select the perfect plan that fits your investment goals and budget</p>
        </div>
        
        <div class="row justify-content-center clearfix">
            <!-- Premium Plan -->
            <div class="col-lg-4 col-md-6 col-sm-12 pricing-block mx-auto">
                <div class="pricing-block-one premium-plan wow fadeInUp animated" data-wow-delay="200ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        
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
        </div>
    </div>
</section>
<!-- subscription-section end -->

<!-- call to action section -->

<!-- call to action section end -->

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

@include('partials.innerfooter')
