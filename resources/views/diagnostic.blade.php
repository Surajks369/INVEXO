<!DOCTYPE html>
<html>
<head>
    <title>Payment Diagnostic</title>
    <style>
        body { font-family: Arial; max-width: 900px; margin: 20px auto; padding: 20px; background: #f5f5f5; }
        .test-box { background: white; padding: 20px; margin: 15px 0; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .success { color: #28a745; font-weight: bold; }
        .error { color: #dc3545; font-weight: bold; }
        .warning { color: #ffc107; font-weight: bold; }
        h1 { color: #333; text-align: center; }
        h2 { color: #28a745; border-bottom: 2px solid #28a745; padding-bottom: 10px; }
        button { background: #28a745; color: white; padding: 12px 24px; border: none; border-radius: 5px; cursor: pointer; margin: 5px; font-size: 14px; }
        button:hover { background: #218838; }
        button:disabled { background: #ccc; cursor: not-allowed; }
        .console { background: #000; color: #0f0; padding: 15px; margin: 10px 0; border-radius: 5px; font-family: monospace; font-size: 12px; max-height: 400px; overflow-y: auto; }
        .info { background: #e7f3ff; padding: 10px; border-left: 4px solid #2196F3; margin: 10px 0; }
        pre { background: #f8f9fa; padding: 10px; border-radius: 4px; overflow-x: auto; }
        .step { margin: 15px 0; padding: 15px; background: #f8f9fa; border-left: 4px solid #28a745; }
        .check-item { padding: 8px; margin: 5px 0; }
        .status-badge { display: inline-block; padding: 4px 12px; border-radius: 12px; font-size: 12px; margin-left: 10px; }
        .status-ok { background: #28a745; color: white; }
        .status-fail { background: #dc3545; color: white; }
    </style>
</head>
<body>
    <h1>🔍 Payment Gateway Diagnostic Tool</h1>
    
    <div class="test-box">
        <h2>Step 1: Configuration Check</h2>
        <div class="check-item">
            ✓ Razorpay Key: 
            @if(config('services.razorpay.key'))
                <span class="status-badge status-ok">CONFIGURED</span>
                <code>{{ substr(config('services.razorpay.key'), 0, 20) }}...</code>
            @else
                <span class="status-badge status-fail">NOT CONFIGURED</span>
            @endif
        </div>
        <div class="check-item">
            ✓ Razorpay Secret: 
            @if(config('services.razorpay.secret'))
                <span class="status-badge status-ok">CONFIGURED</span>
            @else
                <span class="status-badge status-fail">NOT CONFIGURED</span>
            @endif
        </div>
    </div>

    <div class="test-box">
        <h2>Step 2: Authentication Status</h2>
        @auth
            <div class="success">✓ User is logged in</div>
            <div class="info">
                <strong>Name:</strong> {{ Auth::user()->name }}<br>
                <strong>Email:</strong> {{ Auth::user()->email }}<br>
                <strong>ID:</strong> {{ Auth::user()->id }}
            </div>
        @else
            <div class="error">✗ User is NOT logged in</div>
            <div class="info">
                You must be logged in to test payment.
                <a href="{{ route('user.login') }}" style="color: #28a745;">Login here</a>
            </div>
        @endauth
    </div>

    <div class="test-box">
        <h2>Step 3: Database Check</h2>
        <div class="check-item">
            Payments Table: 
            @php
                try {
                    $count = \DB::table('payments')->count();
                    echo '<span class="status-badge status-ok">EXISTS</span>';
                    echo " ($count records)";
                } catch (\Exception $e) {
                    echo '<span class="status-badge status-fail">NOT EXISTS</span>';
                    echo '<div class="error">Run: php artisan migrate</div>';
                }
            @endphp
        </div>
    </div>

    <div class="test-box">
        <h2>Step 4: Routes Check</h2>
        <div class="check-item">✓ Pricing: <a href="{{ route('pricing') }}" target="_blank">{{ route('pricing') }}</a></div>
        @auth
            <div class="check-item">✓ Checkout Annual: <a href="{{ route('payment.checkout', ['plan' => 'annual']) }}" target="_blank">{{ route('payment.checkout', ['plan' => 'annual']) }}</a></div>
            <div class="check-item">✓ Checkout Quarterly: <a href="{{ route('payment.checkout', ['plan' => 'quarterly']) }}" target="_blank">{{ route('payment.checkout', ['plan' => 'quarterly']) }}</a></div>
        @endauth
    </div>

    @auth
    <div class="test-box">
        <h2>Step 5: AJAX Test</h2>
        <div class="info">
            <strong>Important:</strong> Open browser console (F12) to see detailed logs!
        </div>
        <button onclick="testAnnual()">🧪 Test Annual Plan (₹999)</button>
        <button onclick="testQuarterly()">🧪 Test Quarterly Plan (₹599)</button>
        <div class="console" id="console"></div>
    </div>

    <div class="test-box">
        <h2>Step 6: Full Payment Test</h2>
        <div class="step">
            <strong>1. Go to Checkout Page:</strong><br>
            <a href="{{ route('payment.checkout', ['plan' => 'annual']) }}" target="_blank" style="color: #28a745;">
                <button>Open Checkout (Annual)</button>
            </a>
            <a href="{{ route('payment.checkout', ['plan' => 'quarterly']) }}" target="_blank" style="color: #28a745;">
                <button>Open Checkout (Quarterly)</button>
            </a>
        </div>
        <div class="step">
            <strong>2. Open Browser Console (F12)</strong><br>
            You should see:
            <pre>Payment script loaded
Document ready, button exists: true</pre>
        </div>
        <div class="step">
            <strong>3. Click "Pay Securely" Button</strong><br>
            Console should show:
            <pre>Payment button clicked
Creating order...</pre>
        </div>
        <div class="step">
            <strong>4. Use Test Card:</strong><br>
            <div class="info">
                <strong>Card Number:</strong> 4111 1111 1111 1111<br>
                <strong>CVV:</strong> 123<br>
                <strong>Expiry:</strong> 12/25 (any future date)<br>
                <strong>Name:</strong> Test User
            </div>
        </div>
    </div>
    @endauth

    <div class="test-box">
        <h2>Troubleshooting Guide</h2>
        <div class="step">
            <strong>If button doesn't respond:</strong>
            <ul>
                <li>Press Ctrl+Shift+R to hard reload page</li>
                <li>Check browser console (F12) for errors</li>
                <li>Verify jQuery is loaded (type <code>jQuery.fn.jquery</code> in console)</li>
                <li>Check if button exists (type <code>$('#rzp-button').length</code> in console)</li>
            </ul>
        </div>
        <div class="step">
            <strong>If AJAX fails:</strong>
            <ul>
                <li>Check Laravel logs: <code>storage/logs/laravel.log</code></li>
                <li>Verify Razorpay credentials in .env</li>
                <li>Run: <code>php artisan config:clear</code></li>
            </ul>
        </div>
    </div>

    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script>
        function log(msg, type = 'info') {
            const console = document.getElementById('console');
            const time = new Date().toLocaleTimeString();
            const colors = { info: '#fff', success: '#0f0', error: '#f00', warning: '#ff0' };
            console.innerHTML += `<div style="color: ${colors[type]}">[${time}] ${msg}</div>`;
            console.scrollTop = console.scrollHeight;
        }

        function testAnnual() {
            testPlan('annual', 999);
        }

        function testQuarterly() {
            testPlan('quarterly', 599);
        }

        function testPlan(planType, amount) {
            document.getElementById('console').innerHTML = '';
            log(`Starting ${planType} plan test...`, 'info');
            log(`Amount: ₹${amount}`, 'info');
            
            $.ajax({
                url: '{{ route("payment.create-order") }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    plan_type: planType,
                    amount: amount
                },
                beforeSend: function() {
                    log('Sending request to server...', 'info');
                },
                success: function(response) {
                    log('✓ SUCCESS! Order created', 'success');
                    log('Order ID: ' + response.order_id, 'success');
                    log('Amount: ₹' + (response.amount / 100), 'success');
                    log('Razorpay Key: ' + response.key.substr(0, 15) + '...', 'info');
                    log('Full Response:', 'info');
                    log(JSON.stringify(response, null, 2), 'info');
                    log('---', 'info');
                    log('✓ Payment gateway is working!', 'success');
                    log('You can now test on checkout page', 'success');
                },
                error: function(xhr, status, error) {
                    log('✗ ERROR occurred', 'error');
                    log('Status: ' + status, 'error');
                    log('Error: ' + error, 'error');
                    if (xhr.responseJSON) {
                        log('Server Error: ' + (xhr.responseJSON.error || xhr.responseJSON.message), 'error');
                    }
                    log('Response Text: ' + xhr.responseText, 'error');
                    log('---', 'warning');
                    log('Check Laravel logs for details', 'warning');
                }
            });
        }

        // Check jQuery
        $(document).ready(function() {
            console.log('✓ Diagnostic page loaded');
            console.log('✓ jQuery version:', jQuery.fn.jquery);
        });
    </script>
</body>
</html>
