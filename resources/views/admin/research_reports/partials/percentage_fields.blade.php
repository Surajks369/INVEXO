<!-- Percentage Fields -->
<div class="form-group mb-3">
  <label>Buy Percentage (%)</label>
  <input type="number" step="0.01" min="0" max="100" name="buy_percentage" class="form-control" value="{{ old('buy_percentage', isset($report) ? $report->buy_percentage : '') }}" required>
</div>
<div class="form-group mb-3">
  <label>Hold Percentage (%)</label>
  <input type="number" step="0.01" min="0" max="100" name="hold_percentage" class="form-control" value="{{ old('hold_percentage', isset($report) ? $report->hold_percentage : '') }}" required>
</div>
<div class="form-group mb-3">
  <label>Sell Percentage (%)</label>
  <input type="number" step="0.01" min="0" max="100" name="sell_percentage" class="form-control" value="{{ old('sell_percentage', isset($report) ? $report->sell_percentage : '') }}" required>
</div>
<!-- End Percentage Fields -->