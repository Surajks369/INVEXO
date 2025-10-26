<!-- main-footer -->
        <footer class="main-footer">
            <div class="widget-section p_relative pt_70 pb_80">
                <div class="auto-container">
                    <div class="row clearfix">
                        <div class="col-lg-16 col-md-12 col-sm-12 big-column">
                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                                    <div class="footer-widget links-widget">
                                        <div class="widget-title mb_11">
                                            <h3>Quick Links</h3>
                                        </div>
                                        <div class="widget-content">
                                            <ul class="links-list clearfix">
                                                <li><a href="/about">About us</a></li>
                                                <li><a href="/services">Services</a></li>
                                                <li><a href="/pricing">Pricing</a></li>
                                                <li><a href="/contact">Contact</a></li>
                                                <li><a href="{{ route('privacy-policy') }}">Privacy Policy</a></li>
                                                
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                

                                <div class="col-lg-4 col-md-6 col-sm-12 footer-column">
                                    <div class="footer-widget links-widget">
                                        <div class="widget-title mb_11">
                                            <figure class="footer-logo"><a href="index.html"><img src="assets/images/logoinvexo.png" alt="" style="height:50px;"></a></figure>
                                        </div>
                                        <div class="widget-content">
                                            At Invexo, we specialize in swing trading and long-term investing. Unlike intraday speculation, our strategies are designed to help investors achieve consistent, sustainable growth.
                                        </div>
                                    </div>
                                </div>




                                

                            </div>
                            
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="auto-container">
                    <div class="bottom-inner">
                        <p>Copyright &copy; 2007-{{ date('Y') }} <a href="/">Invexo</a>. All rights reserved.</p>
                        <ul class="social-links">
                            <li><h5>Follow Us On:</h5></li>
                            <li><a href="index.html"><i class="icon-12"></i></a></li>
                            <li><a href="index.html"><i class="icon-13"></i></a></li>
                            <li><a href="index.html"><i class="icon-14"></i></a></li>
                            <li><a href="index.html"><i class="icon-15"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <!-- main-footer end -->



        <!--Scroll to top-->
        <div class="scroll-to-top">
            <svg class="scroll-top-inner" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
            </svg>
        </div>
        
    </div>


    <!-- jequery plugins -->
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.js') }}"></script>
    <script src="{{ asset('assets/js/wow.js') }}"></script>
    <script src="{{ asset('assets/js/validation.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('assets/js/appear.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.js') }}"></script>
    <script src="{{ asset('assets/js/parallax-scroll.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/scrolltop.min.js') }}"></script>
    <script src="{{ asset('assets/js/language.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/js/odometer.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.lettering.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.circleType.js') }}"></script>

    <!-- main-js -->
    <script src="{{ asset('assets/js/script.js') }}"></script>
    
    <!-- Preloader Fix -->
    <script src="{{ asset('js/preloader-fix.js') }}"></script>
    
    <!-- Enhanced News Section JS -->
    <script src="{{ asset('js/enhanced-news-section.js') }}"></script>
    
    <!-- Quotes Section Carousel -->
    <script>
        $(document).ready(function(){
            $('.quotes-carousel').owlCarousel({
                loop: true,
                margin: 30,
                nav: false,
                dots: true,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    768: {
                        items: 2
                    },
                    1200: {
                        items: 3
                    }
                }
            });
        });
    </script>

</body><!-- End of .page_wrapper -->
</html>
