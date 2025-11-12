@include('partials.innerheader')

<section class="research-reports-section centred pt_60 pb_60">
    <div class="auto-container">
        <div class="sec-title light pb_40 text-left">
            <h2>Research Reports</h2>
            <p>Latest market insights</p>
        </div>

        @if(!$isActive)
            <div class="alert alert-warning">Please subscribe for getting reserch report
                <a href="{{ route('pricing') }}" class="theme-btn btn-one ml_10">Subscribe</a>
            </div>
        @else
            <div class="row">
                @foreach($categories as $category)
                    <div class="col-lg-12 mb_30">
                        <h4>{{ $category->name }}</h4>
                        <div class="row">
                            @foreach($reportsByCategory[$category->id]['visible'] as $report)
                                <div class="col-lg-4 col-md-6 mb_20">
                                    <div class="report-card">
                                        @if($report->company_logo)
                                            <img src="{{ asset('storage/'.$report->company_logo) }}" alt="{{ $report->name }}" style="width:100%;height:120px;object-fit:contain;">
                                        @endif
                                        <h5>{{ $report->name }}</h5>

                                        <div class="stock-details mb-2">
                                            <div class="stock-info d-flex justify-content-between">
                                                <div>
                                                    <small class="text-muted">Code:</small>
                                                    <div class="fw-bold">{{ $report->nse_code }}</div>
                                                </div>
                                                <div>
                                                    <small class="text-muted">Recommendation:</small>
                                                    <div class="fw-bold">{{ $report->recommendation }}</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="price-details mb-2">
                                            <div><small class="text-muted">Current Price</small></div>
                                            <div class="fw-bold">₹{{ number_format($report->current_price, 2) }}</div>
                                            <div class="mt-1"><small class="text-muted">Target Price</small></div>
                                            <div class="fw-bold">₹{{ number_format($report->target_price, 2) }}</div>
                                            <div class="mt-1"><small class="text-muted">Potential</small></div>
                                            <div class="fw-bold">{{ number_format($report->potential, 1) }}%</div>
                                        </div>

                                        <div class="mb-2"><small class="text-muted">Expected Duration</small>
                                            <div class="fw-bold">{{ $report->expect_hold_period }}</div>
                                        </div>

                                        @include('partials.percentage_bars', ['report' => $report])

                                        <div class="mt-3">
                                            <a href="{{ route('research.report.detail', $report->public_id) }}" class="theme-btn btn-one">View Report</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            @if($reportsByCategory[$category->id]['headings']->isNotEmpty())
                                <div class="col-lg-12 mt_10">
                                    <h6>Other reports</h6>
                                    <ul>
                                        @foreach($reportsByCategory[$category->id]['headings'] as $heading)
                                            <li>{{ $heading }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

    </div>
</section>

@include('partials.innerfooter')
