@echo off
echo ================================================
echo Razorpay Payment Integration Setup Verification
echo ================================================
echo.

echo [1/5] Checking Razorpay package installation...
php -r "if (class_exists('Razorpay\Api\Api')) { echo 'SUCCESS: Razorpay package is installed'; } else { echo 'ERROR: Razorpay package NOT found. Run: composer install'; exit(1); }"
echo.
echo.

echo [2/5] Checking .env configuration...
findstr /C:"RAZORPAY_KEY" .env >nul 2>&1
if %errorlevel% equ 0 (
    echo SUCCESS: RAZORPAY_KEY found in .env
) else (
    echo WARNING: RAZORPAY_KEY not found in .env
    echo Please add: RAZORPAY_KEY=your_key_here
)

findstr /C:"RAZORPAY_SECRET" .env >nul 2>&1
if %errorlevel% equ 0 (
    echo SUCCESS: RAZORPAY_SECRET found in .env
) else (
    echo WARNING: RAZORPAY_SECRET not found in .env
    echo Please add: RAZORPAY_SECRET=your_secret_here
)
echo.

echo [3/5] Checking migration files...
if exist "database\migrations\2025_07_15_000000_create_payments_table.php" (
    echo SUCCESS: Payment migration file exists
) else (
    echo ERROR: Payment migration file NOT found
)
echo.

echo [4/5] Checking controller...
if exist "app\Http\Controllers\PaymentController.php" (
    echo SUCCESS: PaymentController exists
) else (
    echo ERROR: PaymentController NOT found
)
echo.

echo [5/5] Checking views...
if exist "resources\views\checkout.blade.php" (
    echo SUCCESS: Checkout view exists
) else (
    echo ERROR: Checkout view NOT found
)

if exist "resources\views\payment-success.blade.php" (
    echo SUCCESS: Payment success view exists
) else (
    echo ERROR: Payment success view NOT found
)

if exist "resources\views\payment-failed.blade.php" (
    echo SUCCESS: Payment failed view exists
) else (
    echo ERROR: Payment failed view NOT found
)
echo.

echo ================================================
echo Setup Verification Complete!
echo ================================================
echo.
echo Next Steps:
echo 1. Add RAZORPAY_KEY and RAZORPAY_SECRET to .env file
echo 2. Run: php artisan migrate
echo 3. Run: php artisan config:clear
echo 4. Test on: http://localhost/invexo/pricing
echo.
echo For detailed instructions, see QUICKSTART.md
echo.
pause
