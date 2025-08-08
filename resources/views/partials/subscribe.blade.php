<!-- subscribe-section -->
        <section class="subscribe-section">
            <div class="bg-color"></div>
            <div class="auto-container">
                <div class="inner-container">
                    <div class="shape" style="background-image: url({{ asset('assets/images/shape/shape-5.png') }});"></div>
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-12 col-sm-12 text-column">
                            <div class="text-box">
                                <h2>Subscribe for latest update</h2>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 form-column">
                            <div class="form-inner">
                                <form method="post" action="{{ url('contact') }}">
                                    <div class="form-group">
                                        <input type="email" name="email" placeholder="Email Address" required>
                                        <button type="submit" class="theme-btn btn-one">Subscribe<i class="icon-26"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>