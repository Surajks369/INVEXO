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
                            <form method="POST" action="{{ route('user.logout') }}">
                                @csrf
                                <button type="submit" class="theme-btn btn-logout">
                                    <i class="flaticon-logout"></i>
                                    <span>Logout</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Subscription Plans Section -->
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center mb_50">
                    <h2>Choose Your Plan</h2>
                    <p>Select the perfect subscription plan for your investment needs</p>
                </div>
            </div>
        </div>

        <div class="row">
            @forelse($subscriptions as $subscription)
                <div class="col-lg-4 col-md-6 col-sm-12 mb_30">
                    <div class="subscription-card {{ strtolower($subscription->name) == 'premium' ? 'featured' : '' }}">
                        @if(strtolower($subscription->name) == 'premium')
                            <div class="featured-badge">Most Popular</div>
                        @endif
                        <div class="subscription-header">
                            <h3>{{ $subscription->name }}</h3>
                            <div class="price">
                                <span class="currency">$</span>
                                <span class="amount">{{ number_format($subscription->price, 2) }}</span>
                                <span class="period">/{{ strtolower($subscription->duration) }}</span>
                            </div>
                        </div>
                        <div class="subscription-features">
                            <ul>
                                @if(strtolower($subscription->name) == 'weekly')
                                    <li><i class="flaticon-check"></i> 7 days access</li>
                                    <li><i class="flaticon-check"></i> Basic research reports</li>
                                    <li><i class="flaticon-check"></i> Email support</li>
                                    <li><i class="flaticon-cross"></i> Priority support</li>
                                @elseif(strtolower($subscription->name) == 'monthly')
                                    <li><i class="flaticon-check"></i> 30 days access</li>
                                    <li><i class="flaticon-check"></i> All research reports</li>
                                    <li><i class="flaticon-check"></i> Email support</li>
                                    <li><i class="flaticon-check"></i> Market alerts</li>
                                @elseif(strtolower($subscription->name) == 'yearly')
                                    <li><i class="flaticon-check"></i> 365 days access</li>
                                    <li><i class="flaticon-check"></i> Premium research reports</li>
                                    <li><i class="flaticon-check"></i> Priority support</li>
                                    <li><i class="flaticon-check"></i> Exclusive webinars</li>
                                    <li><i class="flaticon-check"></i> Personal advisor</li>
                                @endif
                            </ul>
                        </div>
                        <div class="subscription-btn">
                            <a href="#" class="theme-btn btn-one">
                                <span>Subscribe Now</span>
                                <i class="flaticon-right-arrow"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-lg-12">
                    <div class="no-plans">
                        <div class="no-plans-icon">
                            <i class="flaticon-settings"></i>
                        </div>
                        <h3>No Plans Available</h3>
                        <p>There are currently no subscription plans available. Please contact support.</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>
<!-- subscription-section end -->

@include('partials.innerfooter')
