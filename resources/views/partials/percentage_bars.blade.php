<style>
.percentage-bars { margin: 12px 0 18px; }
.percentage-bar { display:flex; align-items:center; margin-bottom:8px; }
.percentage-bar-label { width:50px; font-weight:700; font-size:13px; color:#334155; }
.percentage-bar-outer { flex-grow:1; height:12px; background:#eef2f7; border-radius:8px; margin:0 10px; overflow:hidden; }
.percentage-bar-inner { height:100%; border-radius:8px; transition:width .3s ease; }
.percentage-bar-value { width:44px; text-align:right; font-size:13px; color:#475569; }
.percentage-bar-buy .percentage-bar-inner { background: linear-gradient(90deg,#16a34a,#059669); }
.percentage-bar-hold .percentage-bar-inner { background: linear-gradient(90deg,#06b6d4,#3b82f6); }
.percentage-bar-sell .percentage-bar-inner { background: linear-gradient(90deg,#ef4444,#dc2626); }
</style>

@php
    $buy = intval($report->buy_percentage ?? 0);
    $hold = intval($report->hold_percentage ?? 0);
    $sell = intval($report->sell_percentage ?? 0);
@endphp

<div class="percentage-bars">
    <div class="percentage-bar percentage-bar-buy">
        <div class="percentage-bar-label">Buy</div>
        <div class="percentage-bar-outer">
            <div class="percentage-bar-inner" style="width: {{ $buy }}%"></div>
        </div>
        <div class="percentage-bar-value">{{ $buy }}%</div>
    </div>
    <div class="percentage-bar percentage-bar-hold">
        <div class="percentage-bar-label">Hold</div>
        <div class="percentage-bar-outer">
            <div class="percentage-bar-inner" style="width: {{ $hold }}%"></div>
        </div>
        <div class="percentage-bar-value">{{ $hold }}%</div>
    </div>
    <div class="percentage-bar percentage-bar-sell">
        <div class="percentage-bar-label">Sell</div>
        <div class="percentage-bar-outer">
            <div class="percentage-bar-inner" style="width: {{ $sell }}%"></div>
        </div>
        <div class="percentage-bar-value">{{ $sell }}%</div>
    </div>
</div>