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
                    <h1>Contact Us</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>Contact Us</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- page-title end -->


        <!-- contact-section -->
        <section class="contact-section pt_90 pb_100">
            <div class="auto-container">
                <div class="info-inner pb_25">
                    <div class="row clearfix">
                        <div class="col-lg-3 col-md-6 col-sm-12 info-column">
                            <div class="single-info">
                                <div class="icon-box"><i class="icon-45"></i></div>
                                <h4>Corporate Office</h4>
                                <p>0233 Brisbane Cir. Shiloh,Australia 81063</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 info-column">
                            <div class="single-info">
                                <div class="icon-box"><i class="icon-45"></i></div>
                                <h4>Main Warehouse</h4>
                                <p>10445 Brisbane Cir. Shiloh, Australia</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 info-column">
                            <div class="single-info">
                                <div class="icon-box"><i class="icon-46"></i></div>
                                <h4>Email Address</h4>
                                <p><a href="mailto:support@example.com">support@example.com</a><a href="mailto:contact@example.com">contact@example.com</a></p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 info-column">
                            <div class="single-info">
                                <div class="icon-box"><i class="icon-47"></i></div>
                                <h4>Phone Number</h4>
                                <p><a href="tel:+2085440141">+(208) 544 -0141</a><a href="tel:+2085440142">+(208) 544 -0142</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-inner pb_70">
                    <form method="POST" action="{{ route('contact.send') }}" id="contact-form">
                        @csrf
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <label>Your Name <span>*</span></label>
                                <input type="text" name="username" placeholder="" required value="{{ old('username') }}">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <label>Phone <span>*</span></label>
                                <input type="text" name="phone" placeholder="" required value="{{ old('phone') }}">
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                <label>Email Address <span>*</span></label>
                                <input type="email" name="email" placeholder="" required value="{{ old('email') }}">
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                <label>Subject <span>*</span></label>
                                <input type="text" name="subject" placeholder="" required value="{{ old('subject') }}">
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                <label>Write Message <span>*</span></label>
                                <textarea name="message" placeholder="">{{ old('message') }}</textarea>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn pt_18">
                                <button type="submit" class="theme-btn btn-one" name="submit-form">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="map-inner">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d55945.16225505631!2d-73.90847969206546!3d40.66490264739892!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1601263396347!5m2!1sen!2sbd" width="100%" height="500" frameborder="0" style="border:0; width: 100%" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
        </section>
        <!-- contact-section end -->


        @include('partials.subscribe')
        @include('partials.innerfooter')