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
    <div class="auto-container">
        <div class="content-box">
            <h1>Dashboard</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Dashboard</li>
            </ul>
        </div>
    </div>
</section>
<!-- page-title end -->

<!-- dashboard-section -->
<section class="contact-section pt_90 pb_100">
    <div class="auto-container">
        <!-- User Welcome Section -->
        <div class="row">
            <div class="col-lg-12">
                <div class="welcome-card mb_50">
                    <div class="welcome-content text-center">
                        <h2 class="mb-2">Welcome back, {{ $user->name }}!</h2>
                        <p class="mb-1">Subscription: <span class="subscription-type">{{ $user->subscription_type }}</span></p>
                        <p class="mb-3">Renewal Date: <span class="renewal-date">{{ $user->renewal_date ? $user->renewal_date->format('M d, Y') : 'N/A' }}</span></p>
                        <div class="logout-btn d-flex justify-content-center">
                            <form method="POST" action="{{ route('user.logout') }}">
                                @csrf
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
    </div>
</section>
<!-- dashboard-section end -->

@include('partials.innerfooter')
