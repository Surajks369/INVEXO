<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<title>INVEXO</title>

<!-- Fav Icon -->
<link rel="icon" href="{{ asset('assets/images/faviconinvexo.png') }}" type="image/x-icon">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

<!-- Stylesheets -->
<link href="{{ asset('assets/css/font-awesome-all.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/flaticon.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/owl.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/jquery.fancybox.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/nice-select.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/odometer.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/elpath.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/color.css') }}" id="jssDefault" rel="stylesheet">
<link href="{{ asset('assets/css/rtl.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/module-css/header.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/module-css/banner.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/module-css/clients.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/module-css/account.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/module-css/about.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/module-css/funfact.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/module-css/trading.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/module-css/quotes.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/module-css/process.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/module-css/award.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/module-css/apps.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/module-css/news.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/module-css/subscribe.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/module-css/footer.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet">
<link href="{{ asset('css/enhanced-news-section.css') }}" rel="stylesheet">

<!-- Preloader Control -->
<script src="{{ asset('assets/js/preloader-control.js') }}"></script>

</head>


<!-- page wrapper -->
<body>

    <div class="boxed_wrapper ltr">


        <!-- preloader -->
        @php
            $referrer = $_SERVER['HTTP_REFERER'] ?? '';
            $showPreloader = !str_contains($referrer, $_SERVER['HTTP_HOST']);
        @endphp
        <div class="loader-wrap" style="display: {{ $showPreloader ? 'block' : 'none' }}">
            <div class="preloader">
                <div class="preloader-close"><i class="fal fa-times"></i></div>
                <div id="handle-preloader" class="handle-preloader">
                    <div class="animation-preloader">
                        <div class="spinner"></div>
                        <div class="txt-loading">
                            <span data-text-preloader="I" class="letters-loading">
                                I
                            </span>
                            <span data-text-preloader="n" class="letters-loading">
                                n
                            </span>
                            <span data-text-preloader="v" class="letters-loading">
                                v
                            </span>
                            <span data-text-preloader="e" class="letters-loading">
                                e
                            </span>
                            <span data-text-preloader="x" class="letters-loading">
                                x
                            </span>
                            <span data-text-preloader="o" class="letters-loading">
                                o
                            </span>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
        <!-- preloader end -->


        <!-- page-direction -->
        <div class="page_direction">
            <div class="demo-rtl direction_switch"><button class="rtl">RTL</button></div>
            <div class="demo-ltr direction_switch"><button class="ltr">LTR</button></div>
        </div>
        <!-- page-direction end -->


        <!--Search Popup-->
        <div id="search-popup" class="search-popup">
            <div class="popup-inner">
                <div class="upper-box">
<figure class="logo-box p_relative z_1"><a href="index.html"><img src="{{ asset('assets/images/logoinvexo.png') }}" alt=""></a></figure>
                    <div class="close-search"><i class="fal fa-times"></i></div>
                </div>
                <div class="overlay-layer"></div>
                <div class="auto-container">
                    <div class="search-form">
                        <form method="post" action="index.html">
                            <div class="form-group">
                                <fieldset>
                                    <input type="search" class="form-control" name="search-input" value="" placeholder="Type your keyword and hit" required >
                                    <button type="submit"><i class="icon-10"></i></button>
                                </fieldset>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- main header -->
        <header class="main-header header-style-one">
            <!-- header-top -->
            <div class="header-top">
                <div class="large-container">
                    <div class="top-inner">
                        <div class="support-box">
                            <div class="icon-box"><i class="icon-07"></i></div>
                            <a href="tel:966572580280">+91 790 739 5692</a>
                        </div>
                        <div class="option-block">
                            
                            <a href="/pricing" class="theme-btn btn-one mr_10">Get subscription</a>
                            @auth
                                @if(Route::has('user.dashboard'))
                                    <a href="{{ route('user.dashboard') }}" class="theme-btn btn-one mr_10">Dashboard</a>
                                @else
                                    <a href="{{ url('/dashboard') }}" class="theme-btn btn-one mr_10">Dashboard</a>
                                @endif

                                @if(Route::has('user.profile'))
                                    <a href="{{ route('user.profile') }}" class="theme-btn btn-one mr_10">Profile</a>
                                @else
                                    <a href="{{ url('/profile') }}" class="theme-btn btn-one mr_10">Profile</a>
                                @endif

                                @if(Route::has('user.research_reports'))
                                    <a href="{{ route('user.research_reports') }}" class="theme-btn btn-one mr_10">Reserch reports</a>
                                @else
                                    <a href="{{ url('/user/research-reports') }}" class="theme-btn btn-one mr_10">Reserch reports</a>
                                @endif

                                @if(Route::has('user.logout'))
                                    <form method="POST" action="{{ route('user.logout') }}" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="theme-btn btn-two">Logout</button>
                                    </form>
                                @else
                                    <form method="POST" action="{{ url('/user-logout') }}" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="theme-btn btn-two">Logout</button>
                                    </form>
                                @endif
                            @else
                                @if(Route::has('user.login'))
                                    <a href="{{ route('user.login') }}" class="theme-btn btn-two">Login</a>
                                @else
                                    <a href="{{ url('/user-login') }}" class="theme-btn btn-two">Login</a>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
            <!-- header-lower -->
            <div class="header-lower">
                <div class="large-container">
                    <div class="outer-box">
<figure class="logo-box"><a href="index.html"><img src="{{ asset('assets/images/logoinvexo.png') }}" alt="" style="height:50px;"></a></figure>
                        <div class="menu-area">
                            <!--Mobile Navigation Toggler-->
                            <div class="mobile-nav-toggler">
                                <i class="icon-bar"></i>
                                <i class="icon-bar"></i>
                                <i class="icon-bar"></i>
                            </div>
                            <nav class="main-menu navbar-expand-md navbar-light clearfix">
                                <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                    <ul class="navigation clearfix">
                                        <li class="current dropdown"><a href="/">Home</a>
                                            
                                        </li> 
                                        
                                        <li class="dropdown"><a href="{{ route('about') }}">About Us</a>
                                            
                                        </li>
                                        <li><a href="{{ route('services') }}">Services</a></li>
                                        <li><a href="{{ route('pricing') }}">Pricing</a></li> 
                                                                                    
                                         
                                        <li><a href="{{ url('contact') }}">Contact</a></li> 
                                    </ul>
                                </div>
                            </nav>
                            <div class="search-btn ml_30"><button class="search-toggler"><i class="icon-10"></i></button></div>
                        </div>
                    </div>
                </div>
            </div>