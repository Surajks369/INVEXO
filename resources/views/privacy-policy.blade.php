@include('partials.innerheader')
<link rel="stylesheet" href="{{ asset('assets/css/privacy-policy.css') }}">

<!-- page-title -->
<section class="page-title centred">
    <div class="bg-layer" style="background-image: url({{ asset('assets/images/background/page-title.jpg') }});"></div>
    <div class="pattern-layer" style="background-image: url({{ asset('assets/images/shape/shape-12.png') }});"></div>
    <div class="auto-container">
        <div class="content-box">
            <h1>Privacy Policy</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="/">Home</a></li>
                <li>Privacy Policy</li>
            </ul>
        </div>
    </div>
</section>
<!-- page-title end -->

<!-- privacy-policy-section -->
<section class="privacy-policy-section pt_100 pb_100">
    <div class="auto-container">
        <div class="content-box">
            <div class="title-box mb_50">
                <h2>Privacy Policy</h2>
                <p>Last Updated: {{ date('F d, Y') }}</p>
            </div>

            <div class="text-content">
                <div class="policy-block mb_40">
                    <h3>Educational Service Disclaimer</h3>
                    <p>At Invexo, we provide educational and informational services related to financial markets and investments. Please carefully read and understand the following important points:</p>
                    <ul class="list-style-one">
                        <li>All content and advice provided are for educational purposes only.</li>
                        <li>Trading and investment decisions should be made based on your own research and judgment.</li>
                        <li>Market conditions can vary, and advice may not be suitable for all situations.</li>
                        <li>Past performance is not indicative of future results.</li>
                    </ul>
                </div>

                <div class="policy-block mb_40">
                    <h3>Risk Disclosure</h3>
                    <p>Trading and investing in financial markets involve substantial risk:</p>
                    <ul class="list-style-one">
                        <li>You may lose some or all of your invested capital.</li>
                        <li>Our recommendations and analysis may not always be accurate.</li>
                        <li>Market conditions can change rapidly and unpredictably.</li>
                        <li>We are not responsible for any financial losses incurred.</li>
                    </ul>
                </div>

                <div class="policy-block mb_40">
                    <h3>No Financial Responsibility</h3>
                    <p>By using our services, you acknowledge and agree that:</p>
                    <ul class="list-style-one">
                        <li>Invexo and its team members bear no responsibility for any financial losses.</li>
                        <li>You are trading and investing at your own risk.</li>
                        <li>You should never invest money you cannot afford to lose.</li>
                        <li>You should seek professional financial advice for your specific situation.</li>
                    </ul>
                </div>

                <div class="policy-block">
                    <h3>Recommendation</h3>
                    <p>We strongly recommend:</p>
                    <ul class="list-style-one">
                        <li>Conducting your own research before making investment decisions.</li>
                        <li>Understanding the risks involved in financial markets.</li>
                        <li>Diversifying your investment portfolio.</li>
                        <li>Consulting with licensed financial advisors for personalized advice.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- privacy-policy-section end -->

@include('partials.innerfooter')