#!/bin/bash

# AWS Server Payment Gateway Verification Script
# Run this on your AWS server after git pull

echo "========================================="
echo "PAYMENT GATEWAY DEPLOYMENT VERIFICATION"
echo "========================================="
echo ""

# Check if we're in a Laravel directory
if [ ! -f "artisan" ]; then
    echo "❌ ERROR: Not in a Laravel project directory!"
    echo "Please cd to your Laravel project root and run again."
    exit 1
fi

echo "✅ Laravel project detected"
echo ""

# 1. Check Razorpay Package
echo "1. Checking Razorpay Package..."
if composer show | grep -q "razorpay/razorpay"; then
    VERSION=$(composer show | grep "razorpay/razorpay" | awk '{print $2}')
    echo "   ✅ Razorpay SDK: $VERSION"
else
    echo "   ❌ Razorpay SDK: NOT FOUND"
    echo "   Run: composer require razorpay/razorpay"
fi
echo ""

# 2. Check .env file
echo "2. Checking .env Configuration..."
if [ -f ".env" ]; then
    echo "   ✅ .env file exists"
    if grep -q "RAZORPAY_KEY" .env; then
        echo "   ✅ RAZORPAY_KEY configured"
    else
        echo "   ❌ RAZORPAY_KEY missing in .env"
        echo "   Add: RAZORPAY_KEY=your_key"
    fi
    if grep -q "RAZORPAY_SECRET" .env; then
        echo "   ✅ RAZORPAY_SECRET configured"
    else
        echo "   ❌ RAZORPAY_SECRET missing in .env"
        echo "   Add: RAZORPAY_SECRET=your_secret"
    fi
else
    echo "   ❌ .env file not found!"
    echo "   Copy from .env.example: cp .env.example .env"
fi
echo ""

# 3. Check Migration
echo "3. Checking Database Migration..."
if php artisan migrate:status | grep -q "create_payments_table"; then
    STATUS=$(php artisan migrate:status | grep "create_payments_table")
    if echo "$STATUS" | grep -q "Ran"; then
        echo "   ✅ Payments table migration: Ran"
    else
        echo "   ⚠️  Payments table migration: Not run"
        echo "   Run: php artisan migrate"
    fi
else
    echo "   ❌ Payments migration file not found"
fi
echo ""

# 4. Check Routes
echo "4. Checking Payment Routes..."
ROUTE_COUNT=$(php artisan route:list | grep -c "payment\\." || true)
if [ "$ROUTE_COUNT" -ge 5 ]; then
    echo "   ✅ Payment routes: $ROUTE_COUNT routes registered"
    php artisan route:list | grep "payment\\." | awk '{print "      " $3}'
else
    echo "   ❌ Payment routes: Missing (found $ROUTE_COUNT, expected 5+)"
    echo "   Run: php artisan route:clear"
fi
echo ""

# 5. Check Payment Files
echo "5. Checking Payment Files..."
FILES=(
    "app/Http/Controllers/PaymentController.php"
    "app/Models/Payment.php"
    "resources/views/checkout.blade.php"
    "resources/views/payment-success.blade.php"
    "resources/views/payment-failed.blade.php"
    "database/migrations/2025_07_15_000000_create_payments_table.php"
)

ALL_EXIST=true
for file in "${FILES[@]}"; do
    if [ -f "$file" ]; then
        echo "   ✅ $file"
    else
        echo "   ❌ $file (MISSING)"
        ALL_EXIST=false
    fi
done
echo ""

# 6. Check Permissions
echo "6. Checking Directory Permissions..."
if [ -w "storage" ] && [ -w "bootstrap/cache" ]; then
    echo "   ✅ storage/ is writable"
    echo "   ✅ bootstrap/cache/ is writable"
else
    echo "   ❌ Permission issues detected"
    echo "   Run: sudo chmod -R 775 storage bootstrap/cache"
    echo "   Run: sudo chown -R www-data:www-data storage bootstrap/cache"
fi
echo ""

# 7. Summary
echo "========================================="
echo "SUMMARY"
echo "========================================="
echo ""

if [ "$ALL_EXIST" = true ] && [ "$ROUTE_COUNT" -ge 5 ]; then
    echo "✅ ALL FILES DEPLOYED SUCCESSFULLY"
    echo ""
    echo "Next steps:"
    echo "1. Make sure .env has RAZORPAY_KEY and RAZORPAY_SECRET"
    echo "2. Run: php artisan migrate (if not already run)"
    echo "3. Run: php artisan config:clear && php artisan cache:clear"
    echo "4. Restart web server: sudo systemctl restart nginx"
    echo "5. Test: Visit https://your-domain.com/checkout?plan=annual"
else
    echo "⚠️  SOME FILES OR CONFIGURATIONS MISSING"
    echo ""
    echo "Please:"
    echo "1. Check git pull completed successfully"
    echo "2. Run: composer install"
    echo "3. Run: php artisan migrate"
    echo "4. Run: php artisan route:clear"
    echo "5. Run this script again"
fi
echo ""
echo "========================================="
