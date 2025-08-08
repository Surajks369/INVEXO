<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<title>INVEXO</title>

<!-- Fav Icon -->
<link rel="icon" href="{{ asset('images/favicon.jpg') }}" type="image/x-icon">

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
<link href="{{ asset('assets/css/module-css/page-title.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/module-css/contact.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/module-css/subscribe.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/module-css/footer.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet">

</head>


<!-- page wrapper -->
<body>

    <div class="boxed_wrapper ltr">


        <!-- preloader -->
        <div class="loader-wrap">
            <div class="preloader">
                <div class="preloader-close"><i class="fal fa-times"></i></div>
                <div id="handle-preloader" class="handle-preloader">
                    <div class="animation-preloader">
                        <div class="spinner"></div>
                        <div class="txt-loading">
                            <span data-text-preloader="I" class="letters-loading">
                                I
                            </span>
                            <span data-text-preloader="N" class="letters-loading">
                                N
                            </span>
                            <span data-text-preloader="V" class="letters-loading">
                                V
                            </span>
                            <span data-text-preloader="E" class="letters-loading">
                                E
                            </span>
                            <span data-text-preloader="X" class="letters-loading">
                                X
                            </span>
                            <span data-text-preloader="O" class="letters-loading">
                                O
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
                    <figure class="logo-box p_relative z_1"><a href="index.html"><img src="{{ asset('images/logo.jpg') }}" alt="" style="height:50px;width:100px;"></a></figure>
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
        <header class="main-header header-style-three">
            <!-- header-top -->
            <div class="header-top">
                <div class="outer-container">
                    <div class="top-inner">
                        <div class="option-block">
                            <div class="support-box">
                                <div class="icon-box"><i class="icon-07"></i></div>
                                <a href="tel:966572580280">+966 57 258 0280</a>
                            </div>
                             <div class="language-picker js-language-picker ml_40" data-trigger-class="btn btn--subtle">
                                <form action="index-2.html" class="language-picker__form">
                                    <label for="language-picker-select">Select your language</label>
                                    <select name="language-picker-select" id="language-picker-select">
                                        <option lang="de" value="deutsch"></option>
                                        <option lang="en" value="english" selected></option>
                                        <option lang="fr" value="francais"></option>
                                        <option lang="it" value="italiano"></option>
                                    </select>
                                </form>
                            </div>
                        </div>
                        <ul class="info-list clearfix">
                            <li><i class="icon-28"></i><span>£20 Discount</span> & Get 24/7 Free Assistance</li>
                            <li><i class="icon-27"></i>Free Trading Guides</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header-lower -->
            <div class="header-lower">
                <div class="outer-container">
                    <div class="outer-box">
                        <figure class="logo-box"><a href="index.html"><img src="{{ asset('images/logo.jpg') }}" alt="" style="height:50px;width:100px;"></a></figure>
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
                                        <li class="dropdown"><a href="index.html">Home</a>
                                            <ul>
                                                <li><a href="index.html">Home One</a></li>
                                                <li><a href="index-2.html">Home Two</a></li>
                                                <li><a href="index-3.html">Home Three</a></li>
                                                <li><a href="index-4.html">Home Four</a></li>
                                                <li><a href="index-5.html">Home Five</a></li>
                                            </ul>
                                        </li> 
                                        <li class="dropdown"><a href="index.html">Trading</a>
                                            <ul>
                                                <li><a href="platform.html">Platform</a></li>
                                                <li><a href="account.html">Account</a></li>
                                                <li><a href="account-details.html">Account Deatils</a></li>
                                            </ul>
                                        </li> 
                                        <li class="dropdown"><a href="index.html">Market</a>
                                            <ul>
                                                <li><a href="markets.html">Markets Place</a></li>
                                                <li><a href="markets-details.html">Markets Details</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown"><a href="index.html">About Us</a>
                                            <ul>
                                                <li class="dropdown"><a href="index.html">Education</a>
                                                    <ul>
                                                        <li><a href="education.html">Education</a></li>
                                                        <li><a href="education-details.html">Book Details</a></li>
                                                    </ul>
                                                </li>
                                                <li class="dropdown"><a href="index.html">Team</a>
                                                    <ul>
                                                        <li><a href="team.html">Our Expert Team</a></li>
                                                        <li><a href="team-details.html">Team Deatils</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="about.html">About Us</a></li>
                                                <li><a href="faq.html">FAQ's</a></li>
                                                <li><a href="error.html">404</a></li>
                                            </ul>
                                        </li> 
                                        <li class="dropdown"><a href="index.html">Blog</a>
                                            <ul>
                                                <li><a href="blog.html">Blog Grid</a></li>
                                                <li><a href="blog-2.html">Blog Standard</a></li>
                                                <li><a href="blog-details.html">Blog Details</a></li>
                                            </ul>
                                        </li>  
                                        <li class="current"><a href="contact.html">Contact</a></li> 
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="menu-right-content">
                            <div class="search-btn mr_25"><button class="search-toggler"><i class="icon-10"></i></button></div>
                            <div class="btn-box"><a href="index-2.html" class="theme-btn btn-one">Open Account</a></div>
                        </div>
                    </div>
                </div>
            </div>

            <!--sticky Header-->
            <div class="sticky-header">
                <div class="large-container">
                    <div class="outer-box">
                        <figure class="logo-box"><a href="index.html"><img src="{{ asset('assets/images/logo.png') }}" alt=""></a></figure>
                        <div class="menu-area">
                            <nav class="main-menu clearfix">
                                <!--Keep This Empty / Menu will come through Javascript-->
                            </nav>
                        </div>
                        <div class="menu-right-content">
                            <div class="search-btn mr_25"><button class="search-toggler"><i class="icon-10"></i></button></div>
                            <div class="btn-box"><a href="index-2.html" class="theme-btn btn-one">Open Account</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- main-header end -->