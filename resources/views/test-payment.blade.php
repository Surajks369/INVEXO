<!DOCTYPE html>
<html>
<head>
    <title>Payment Test Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
        }
        .test-section {
            background: #f5f5f5;
            padding: 20px;
            margin: 20px 0;
            border-radius: 5px;
        }
        .success { color: green; }
        .error { color: red; }
        .info { color: blue; }
        button {
            background: #28a745;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 5px;
        }
        button:hover {
            background: #218838;
        }
        #console {
            background: #000;
            color: #0f0;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            max-height: 300px;
            overflow-y: auto;
            font-family: monospace;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <h1>Payment Gateway Test Page</h1>
    
    <div class="test-section">
        <h2>1. Configuration Check</h2>
        <p>Razorpay Key: <strong class="info">{{ config('services.razorpay.key') ? '✓ Configured' : '✗ Not Configured' }}</strong></p>
        <p>Razorpay Secret: <strong class="info">{{ config('services.razorpay.secret') ? '✓ Configured' : '✗ Not Configured' }}</strong></p>
    </div>

    <div class="test-section">
        <h2>2. Authentication Status</h2>
        @auth
            <p class="success">✓ User is logged in: {{ Auth::user()->name }} ({{ Auth::user()->email }})</p>
        @else
            <p class="error">✗ User is not logged in. <a href="{{ route('user.login') }}">Login here</a></p>
        @endauth
    </div>

    <div class="test-section">
        <h2>3. Routes Check</h2>
        <p>Pricing Page: <a href="{{ route('pricing') }}" target="_blank">{{ route('pricing') }}</a></p>
        @auth
            <p>Checkout Annual: <a href="{{ route('payment.checkout', ['plan' => 'annual']) }}" target="_blank">{{ route('payment.checkout', ['plan' => 'annual']) }}</a></p>
            <p>Checkout Quarterly: <a href="{{ route('payment.checkout', ['plan' => 'quarterly']) }}" target="_blank">{{ route('payment.checkout', ['plan' => 'quarterly']) }}</a></p>
        @endauth
    </div>

    @auth
    <div class="test-section">
        <h2>4. AJAX Test</h2>
        <button onclick="testCreateOrder('annual', 999)">Test Annual Plan Order</button>
        <button onclick="testCreateOrder('quarterly', 599)">Test Quarterly Plan Order</button>
        <div id="console"></div>
    </div>
    @endauth

    <div class="test-section">
        <h2>5. Database Check</h2>
        <p>Payments Table Exists: 
            @php
                try {
                    \DB::table('payments')->count();
                    echo '<span class="success">✓ Yes</span>';
                } catch (\Exception $e) {
                    echo '<span class="error">✗ No - Run: php artisan migrate</span>';
                }
            @endphp
        </p>
    </div>

    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script>
        function log(message, type = 'info') {
            const console = document.getElementById('console');
            const timestamp = new Date().toLocaleTimeString();
            const color = type === 'error' ? '#f00' : type === 'success' ? '#0f0' : '#fff';
            console.innerHTML += `<div style="color: ${color}">[${timestamp}] ${message}</div>`;
            console.scrollTop = console.scrollHeight;
        }

        function testCreateOrder(planType, amount) {
            log(`Testing ${planType} plan with amount ${amount}...`);
            
            $.ajax({
                url: '{{ route('payment.create-order') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    plan_type: planType,
                    amount: amount
                },
                success: function(response) {
                    log('✓ Order created successfully!', 'success');
                    log('Order ID: ' + response.order_id, 'success');
                    log('Amount: ' + response.amount, 'success');
                    log('Full response: ' + JSON.stringify(response), 'info');
                },
                error: function(xhr, status, error) {
                    log('✗ Error creating order', 'error');
                    log('Status: ' + status, 'error');
                    log('Error: ' + error, 'error');
                    log('Response: ' + xhr.responseText, 'error');
                }
            });
        }
    </script>
</body>
</html>
