<!-- Add this right before the submit button in the form -->
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="buy_percentage">Buy Percentage (%)</label>
            <input type="number" step="0.01" min="0" max="100" name="buy_percentage" id="buy_percentage" 
                   class="form-control @error('buy_percentage') is-invalid @enderror" 
                   value="{{ old('buy_percentage') }}" required>
            @error('buy_percentage')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="hold_percentage">Hold Percentage (%)</label>
            <input type="number" step="0.01" min="0" max="100" name="hold_percentage" id="hold_percentage" 
                   class="form-control @error('hold_percentage') is-invalid @enderror" 
                   value="{{ old('hold_percentage') }}" required>
            @error('hold_percentage')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="sell_percentage">Sell Percentage (%)</label>
            <input type="number" step="0.01" min="0" max="100" name="sell_percentage" id="sell_percentage" 
                   class="form-control @error('sell_percentage') is-invalid @enderror" 
                   value="{{ old('sell_percentage') }}" required>
            @error('sell_percentage')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>

<!-- Add this JavaScript validation at the bottom of the form -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const buyInput = document.getElementById('buy_percentage');
    const holdInput = document.getElementById('hold_percentage');
    const sellInput = document.getElementById('sell_percentage');

    function validateTotal() {
        const total = parseFloat(buyInput.value || 0) + 
                     parseFloat(holdInput.value || 0) + 
                     parseFloat(sellInput.value || 0);
        
        if (total !== 100) {
            alert('The sum of Buy, Hold, and Sell percentages must equal 100%');
            return false;
        }
        return true;
    }

    document.querySelector('form').addEventListener('submit', function(e) {
        if (!validateTotal()) {
            e.preventDefault();
        }
    });
});
</script>