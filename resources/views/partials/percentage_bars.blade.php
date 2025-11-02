<style>
.percentage-bars {
    margin: 15px 0;
}

.percentage-bar {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
}

.percentage-bar-label {
    width: 60px;
    font-weight: bold;
    font-size: 14px;
}

.percentage-bar-outer {
    flex-grow: 1;
    height: 10px;
    background: #f0f0f0;
    border-radius: 5px;
    margin: 0 10px;
    overflow: hidden;
}

.percentage-bar-inner {
    height: 100%;
    border-radius: 5px;
    transition: width 0.3s ease;
}

.percentage-bar-value {
    width: 50px;
    text-align: right;
    font-size: 14px;
}

.percentage-bar-buy .percentage-bar-inner {
    background: #28a745; /* Green */
}

.percentage-bar-hold .percentage-bar-inner {
    background: #17a2b8; /* Light Blue */
}

.percentage-bar-sell .percentage-bar-inner {
    background: #dc3545; /* Red */
}
</style>

<div class="percentage-bars">
    <div class="percentage-bar percentage-bar-buy">
        <div class="percentage-bar-label">Buy</div>
        <div class="percentage-bar-outer">
            <div class="percentage-bar-inner" style="width: {{ $report->buy_percentage }}%"></div>
        </div>
        <div class="percentage-bar-value">{{ $report->buy_percentage }}%</div>
    </div>
    <div class="percentage-bar percentage-bar-hold">
        <div class="percentage-bar-label">Hold</div>
        <div class="percentage-bar-outer">
            <div class="percentage-bar-inner" style="width: {{ $report->hold_percentage }}%"></div>
        </div>
        <div class="percentage-bar-value">{{ $report->hold_percentage }}%</div>
    </div>
    <div class="percentage-bar percentage-bar-sell">
        <div class="percentage-bar-label">Sell</div>
        <div class="percentage-bar-outer">
            <div class="percentage-bar-inner" style="width: {{ $report->sell_percentage }}%"></div>
        </div>
        <div class="percentage-bar-value">{{ $report->sell_percentage }}%</div>
    </div>
</div>