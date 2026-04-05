#!/bin/bash
# ====================================================
# AWS SERVER - QUICK DEPLOYMENT COMMANDS
# Copy and paste these commands on your AWS server
# ====================================================

echo "Starting deployment..."

# Step 1: Navigate to Laravel project
cd /var/www/html/your-project-name
# Or wherever your Laravel project is located

# Step 2: Pull latest changes from Git
echo "Pulling latest code from git..."
git pull origin master

# Expected output: Should show all the payment files being updated
# - PaymentController.php
# - Payment.php
# - checkout.blade.php
# - payment-success.blade.php
# - payment-failed.blade.php
# - etc.

# Step 3: Install/Update Composer Dependencies
echo "Installing Razorpay package..."
composer install --optimize-autoloader --no-dev

# OR if that doesn't work:
# composer update razorpay/razorpay

# Step 4: Edit .env file (CRITICAL!)
echo "Opening .env file for editing..."
echo "Add these two lines:"
echo "RAZORPAY_KEY=rzp_test_SZi9RCIS5HRQgK"
echo "RAZORPAY_SECRET=P58GubFgfe0yhC4VhSRmmqOc"
echo ""

nano .env
# OR: vi .env

# Add these lines to .env:
# RAZORPAY_KEY=rzp_test_SZi9RCIS5HRQgK
# RAZORPAY_SECRET=P58GubFgfe0yhC4VhSRmmqOc

# Save: Ctrl+X, then Y, then Enter (for nano)
# Save: ESC, then :wq, then Enter (for vi)

# Step 5: Run Database Migration
echo "Running database migration..."
php artisan migrate

# Expected: Should create 'payments' table
# If asks to confirm in production, type: yes

# Step 6: Clear all caches
echo "Clearing all caches..."
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

# Optional but recommended:
php artisan optimize

# Step 7: Set correct permissions
echo "Setting file permissions..."
sudo chmod -R 775 storage bootstrap/cache
sudo chown -R www-data:www-data storage bootstrap/cache

# Step 8: Restart web server
echo "Restarting web server..."

# For Nginx:
sudo systemctl restart nginx
sudo systemctl restart php8.1-fpm
# OR: php8.0-fpm or php7.4-fpm depending on your PHP version

# For Apache:
# sudo systemctl restart apache2

# Step 9: Verify deployment
echo "Verifying deployment..."
bash verify-aws-deployment.sh

# ====================================================
# VERIFICATION COMMANDS
# ====================================================

# Check Razorpay package installed:
composer show | grep razorpay
# Expected: razorpay/razorpay  v2.9.2

# Check migration status:
php artisan migrate:status | grep payments
# Expected: [2025_07_15_000000_create_payments_table] Ran

# Check routes registered:
php artisan route:list | grep payment
# Expected: 5+ payment routes

# Check .env configuration:
php artisan tinker
>>> config('services.razorpay.key')
# Expected: "rzp_test_SZi9RCIS5HRQgK"
>>> exit

# ====================================================
# TEST IN BROWSER
# ====================================================

# 1. Diagnostic Page:
#    https://your-domain.com/diagnostic
#    Should show all green checkmarks

# 2. Checkout Page (Annual Plan):
#    https://your-domain.com/checkout?plan=annual
#    Should load checkout page with payment button

# 3. Checkout Page (Quarterly Plan):
#    https://your-domain.com/checkout?plan=quarterly
#    Should load checkout page with payment button

# 4. Click payment button
#    Should open Razorpay modal with payment options:
#    - Cards (Credit/Debit)
#    - Net Banking
#    - UPI (if enabled in Razorpay dashboard)

# ====================================================
# TEST PAYMENT CREDENTIALS
# ====================================================

# Test Card:
# Card Number: 4111 1111 1111 1111
# CVV: 123
# Expiry: 12/28
# Name: Any name

# Test UPI:
# UPI ID: success@razorpay

# Test Net Banking:
# Select any bank (will succeed automatically in test mode)

# ====================================================
# TROUBLESHOOTING
# ====================================================

# If routes not working:
php artisan route:clear
php artisan config:clear
composer dump-autoload

# If Razorpay class not found:
composer require razorpay/razorpay:^2.9
composer dump-autoload

# Check Laravel logs:
tail -f storage/logs/laravel.log

# Check Nginx error logs:
tail -f /var/log/nginx/error.log

# Check Apache error logs:
# tail -f /var/log/apache2/error.log

# ====================================================
# DEPLOYMENT COMPLETE WHEN YOU SEE:
# ====================================================
# ✅ git pull shows files updated
# ✅ composer show includes razorpay/razorpay v2.9.2
# ✅ .env has RAZORPAY_KEY and RAZORPAY_SECRET
# ✅ php artisan migrate:status shows payments table created
# ✅ php artisan route:list shows payment routes
# ✅ Checkout page loads in browser
# ✅ Payment button opens Razorpay modal
# ✅ Test payment completes successfully

# ====================================================
echo "Deployment complete!"
echo "Visit: https://your-domain.com/checkout?plan=annual"
# ====================================================
