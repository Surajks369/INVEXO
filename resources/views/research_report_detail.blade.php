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
            <h1>Research Report</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                <li>{{ $report->name }}</li>
            </ul>
        </div>
    </div>
</section>
<!-- page-title end -->

<!-- report-detail-section -->
<section class="contact-section pt_90 pb_100">
    <div class="auto-container">
        <!-- Back to Dashboard -->
        <div class="row mb_30">
            <div class="col-lg-12">
                <div class="back-nav">
                    <a href="{{ route('user.dashboard') }}" class="back-btn">
                        <i class="flaticon-left-arrow"></i>
                        <span>Back to Dashboard</span>
                    </a>
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

        <!-- Report Content -->
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="report-detail-card">
                    <div class="report-header">
                        <h2>{{ $report->name }}</h2>
                        <div class="report-meta">
                            <span class="report-date">
                                <i class="flaticon-calendar"></i>
                                {{ $report->created_at->format('M d, Y') }}
                            </span>
                            <span class="report-category">
                                <i class="flaticon-folder"></i>
                                Category {{ $report->category }}
                            </span>
                        </div>
                    </div>

                    <div class="report-content">
                        @if($report->description)
                            <div class="report-description">
                                <h4>Report Overview</h4>
                                <p>{{ $report->description }}</p>
                            </div>
                        @endif

                        <div class="report-file">
                            <h4>Download Report</h4>
                            <div class="file-download">
                                <div class="file-icon">
                                    <i class="flaticon-pdf"></i>
                                </div>
                                <div class="file-info">
                                    <h5>{{ $report->report }}</h5>
                                    <p>PDF Document</p>
                                </div>
                                <div class="download-btn">
                                    <a href="#" class="theme-btn btn-one">
                                        <i class="flaticon-download"></i>
                                        <span>Download</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="report-summary">
                            <h4>Key Highlights</h4>
                            <ul class="highlights-list">
                                <li><i class="flaticon-check"></i> Comprehensive market analysis</li>
                                <li><i class="flaticon-check"></i> Expert insights and recommendations</li>
                                <li><i class="flaticon-check"></i> Data-driven investment strategies</li>
                                <li><i class="flaticon-check"></i> Risk assessment and mitigation</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-12">
                <div class="sidebar">
                    <div class="user-info-card">
                        <h4>Your Subscription</h4>
                        <div class="subscription-info">
                            <p><strong>Plan:</strong> {{ $user->subscription_type }}</p>
                            <p><strong>Renewal:</strong> {{ $user->renewal_date ? $user->renewal_date->format('M d, Y') : 'N/A' }}</p>
                            <div class="status-badge active">
                                <i class="flaticon-check"></i>
                                Active
                            </div>
                        </div>
                    </div>

                    <div class="related-reports">
                        <h4>Related Reports</h4>
                        <div class="related-list">
                            @php
                                $relatedReports = \App\Models\ResearchReport::where('id', '!=', $report->id)
                                    ->where('status', 1)
                                    ->limit(3)
                                    ->get();
                            @endphp
                            @foreach($relatedReports as $related)
                                <div class="related-item">
                                    <h6>{{ $related->name }}</h6>
                                    <p>{{ $related->created_at->format('M d, Y') }}</p>
                                    <a href="{{ route('research.report.detail', $related->id) }}">View Report</a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- report-detail-section end -->

@include('partials.innerfooter')
