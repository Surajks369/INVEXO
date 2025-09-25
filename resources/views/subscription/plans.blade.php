@extends('layouts.app')

@section('content')
<section class="pricing-section">
    <div class="auto-container">
        <div class="sec-title text-center mb-5">
            <h2>Subscription Plans</h2>
            <p>Choose the plan that best fits your investment needs</p>
        </div>

        <div class="row">
            @forelse($plans as $plan)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="pricing-block">
                    <div class="pricing-header">
                        <h3>{{ $plan->name }}</h3>
                        <div class="price">
                            <span class="amount">₹{{ number_format($plan->price) }}</span>
                            <span class="duration">/{{ $plan->duration }} months</span>
                        </div>
                    </div>
                    <div class="features-list">
                        {!! $plan->features !!}
                    </div>
                    <div class="btn-box">
                        @auth
                            <a href="{{ route('subscription.subscribe', $plan->id) }}" class="theme-btn btn-style-one">Subscribe Now</a>
                        @else
                            <a href="{{ route('user.login') }}" class="theme-btn btn-style-one">Login to Subscribe</a>
                        @endauth
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p>No subscription plans available at the moment.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection