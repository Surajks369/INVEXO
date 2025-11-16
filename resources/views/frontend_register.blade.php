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
    <div class="pattern-layer rotate-me" style="background-image: url({{ asset('assets/images/shape/shape-34.png') }});"></div>
    <div class="auto-container">
        <div class="content-box">
            <h1>Register</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Register</li>
            </ul>
        </div>
    </div>
</section>
<!-- page-title end -->

<!-- register-section -->
<section class="contact-section pt_90 pb_100">
    <div class="auto-container">
        <div class="form-inner pb_70">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8 col-sm-10">
                    <div class="login-card">
                        <div class="login-header text-center">
                            <h2>Create Account</h2>
                            <p>Join Invexo to access premium investment insights</p>
                        </div>
                        <form method="POST" action="{{ route('user.register.submit') }}" id="register-form" class="login-form">
                            @csrf
                            <div class="form-group">
                                <label>Full Name <span>*</span></label>
                                <div class="input-group">
                                    <span class="input-icon"><i class="flaticon-user"></i></span>
                                    <input type="text" name="name" placeholder="Enter your full name" required value="{{ old('name') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email Address <span>*</span></label>
                                <div class="input-group">
                                    <span class="input-icon"><i class="flaticon-mail"></i></span>
                                    <input type="email" name="email" placeholder="Enter your email address" required value="{{ old('email') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Password <span>*</span></label>
                                <div class="input-group">
                                    <span class="input-icon"><i class="flaticon-lock"></i></span>
                                    <input type="password" name="password" placeholder="Enter your password" required>
                                </div>
                                <small class="form-text text-muted">Password must be at least 8 characters</small>
                            </div>
                            <div class="form-group">
                                <label>Confirm Password <span>*</span></label>
                                <div class="input-group">
                                    <span class="input-icon"><i class="flaticon-lock"></i></span>
                                    <input type="password" name="password_confirmation" placeholder="Confirm your password" required>
                                </div>
                            </div>
                            <div class="form-group message-btn">
                                <button type="submit" class="theme-btn btn-one">
                                    <span>Create Account</span>
                                    <i class="flaticon-right-arrow"></i>
                                </button>
                            </div>
                            <div class="text-center mt_20">
                                <p>Already have an account? <a href="{{ route('user.login') }}" class="text-primary fw-bold">Sign In</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- register-section end -->

@include('partials.innerfooter')
