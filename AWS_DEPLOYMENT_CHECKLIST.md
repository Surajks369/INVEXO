# AWS SERVER DEPLOYMENT CHECKLIST

## ✅ FILES SUCCESSFULLY PUSHED TO GIT

All payment gateway files have been pushed to git and are ready to pull on AWS server:

### New Files Added:
- ✅ `app/Http/Controllers/PaymentController.php`
- ✅ `app/Models/Payment.php`
- ✅ `resources/views/checkout.blade.php`
- ✅ `resources/views/payment-success.blade.php`
- ✅ `resources/views/payment-failed.blade.php`
- ✅ `resources/views/diagnostic.blade.php`
- ✅ `database/migrations/2025_07_15_000000_create_payments_table.php`

### Modified Files:
- ✅ `app/Models/User.php`
- ✅ `routes/web.php`
- ✅ `config/services.php`
- ✅ `composer.json` (Razorpay package added)
- ✅ `composer.lock`
- ✅ `.env.example`

---

## 🔴 IMPORTANT: .env FILE (NOT IN GIT - THIS IS CORRECT!)

**`.env` file is CORRECTLY NOT pushed to git for security reasons.**

The `.env` file contains sensitive credentials and should NEVER be in git:
- Database passwords
- Razorpay API keys
- Application keys

### What's in Git:
✅ `.env.example` - Template file (safe to commit)

### What's NOT in Git (CORRECT):
❌ `.env` - Your actual environment file with secrets
❌ `.env.backup`
❌ `.env.production`

---

## 📋 AWS SERVER DEPLOYMENT STEPS

### **Step 1: SSH into AWS Server**
```bash
ssh your-user@your-aws-server-ip
cd /path/to/your/laravel/project
```

### **Step 2: Pull Latest Changes from Git**
```bash
git pull origin master
```

You should see these files pulled:
- PaymentController.php
- Payment.php
- checkout.blade.php
- payment-success.blade.php
- payment-failed.blade.php
- diagnostic.blade.php
- create_payments_table.php migration
- Updated routes/web.php
- Updated config/services.php
- Updated composer.json

### **Step 3: Install Razorpay Package**
```bash
composer install
# OR
composer update razorpay/razorpay
```

Verify Razorpay is installed:
```bash
composer show | grep razorpay
```

You should see: `razorpay/razorpay  v2.9.2`

### **Step 4: Update .env File on AWS Server**

**IMPORTANT:** You need to manually add Razorpay credentials to your AWS server's `.env` file.

SSH into server and edit .env:
```bash
nano .env
# OR
vi .env
```

Add these lines (use your actual Razorpay keys):
```env
RAZORPAY_KEY=rzp_test_SZi9RCIS5HRQgK
RAZORPAY_SECRET=P58GubFgfe0yhC4VhSRmmqOc
```

**For Production (Live Mode):**
```env
RAZORPAY_KEY=rzp_live_YOUR_LIVE_KEY
RAZORPAY_SECRET=YOUR_LIVE_SECRET
```

Save and exit (Ctrl+X, then Y, then Enter)

### **Step 5: Run Database Migration**
```bash
php artisan migrate
```

This will create the `payments` table.

Verify migration:
```bash
php artisan migrate:status
```

### **Step 6: Clear All Caches**
```bash
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
php artisan optimize
```

### **Step 7: Set Correct Permissions**
```bash
sudo chmod -R 775 storage bootstrap/cache
sudo chown -R www-data:www-data storage bootstrap/cache
```

### **Step 8: Restart Web Server**

**For Apache:**
```bash
sudo systemctl restart apache2
```

**For Nginx:**
```bash
sudo systemctl restart nginx
sudo systemctl restart php8.1-fpm
# OR php8.0-fpm, php7.4-fpm depending on your version
```

---

## 🧪 VERIFICATION ON AWS SERVER

### **Test 1: Check Razorpay Package**
```bash
php -r "echo class_exists('Razorpay\Api\Api') ? 'Razorpay SDK: OK' : 'Razorpay SDK: NOT FOUND';"
```
Expected output: `Razorpay SDK: OK`

### **Test 2: Check Routes**
```bash
php artisan route:list | grep payment
```
Expected output:
```
GET|HEAD  checkout ..................... payment.checkout
POST      payment/create-order ........ payment.create-order
POST      payment/verify ............... payment.verify
GET|HEAD  payment/success .............. payment.success
GET|HEAD  payment/failed ............... payment.failed
```

### **Test 3: Check Migration**
```bash
php artisan migrate:status | grep payments
```
Expected: `[2025_07_15_000000_create_payments_table] Ran`

### **Test 4: Access Checkout Page**
Open browser and visit:
```
https://your-domain.com/checkout?plan=annual
https://your-domain.com/checkout?plan=quarterly
```

You should see the checkout page with payment button.

### **Test 5: Check Diagnostic Page**
Visit:
```
https://your-domain.com/diagnostic
```

Should show all green checkmarks.

---

## 🔐 SECURITY CHECKLIST

- ✅ `.env` is in `.gitignore` (verified)
- ✅ `.env` is NOT in git repository (verified)
- ⚠️ Make sure AWS server `.env` has correct permissions:
  ```bash
  chmod 600 .env
  ```
- ⚠️ Verify `.env` is not publicly accessible via web
- ⚠️ Use HTTPS on production (SSL certificate)
- ⚠️ Switch to Live Razorpay keys when going to production

---

## 📊 QUICK VERIFICATION COMMANDS FOR AWS

Run this single command on AWS server to verify everything:

```bash
echo "=== RAZORPAY PACKAGE ===" && \
composer show | grep razorpay && \
echo -e "\n=== MIGRATION STATUS ===" && \
php artisan migrate:status | grep payments && \
echo -e "\n=== ROUTES ===" && \
php artisan route:list | grep payment && \
echo -e "\n=== .ENV CONFIG ===" && \
grep RAZORPAY .env && \
echo -e "\n=== PHP VERSION ===" && \
php -v | head -n 1
```

---

## ❓ TROUBLESHOOTING

### If Routes Not Found:
```bash
php artisan route:clear
php artisan config:clear
php artisan cache:clear
composer dump-autoload
```

### If Migration Fails:
```bash
php artisan migrate:rollback
php artisan migrate
```

### If Razorpay Class Not Found:
```bash
composer require razorpay/razorpay:^2.9
composer dump-autoload
```

### If .env Changes Not Reflecting:
```bash
php artisan config:clear
php artisan cache:clear
sudo systemctl restart nginx
```

---

## 📝 .env FILE COMPARISON

### Local Development (.env):
```env
APP_URL=http://localhost/invexo/public
DB_HOST=127.0.0.1
RAZORPAY_KEY=rzp_test_SZi9RCIS5HRQgK
RAZORPAY_SECRET=P58GubFgfe0yhC4VhSRmmqOc
```

### AWS Production (.env):
```env
APP_URL=https://your-domain.com
DB_HOST=your-aws-db-host
RAZORPAY_KEY=rzp_live_YOUR_LIVE_KEY  # Use LIVE keys for production
RAZORPAY_SECRET=YOUR_LIVE_SECRET
```

---

## ✅ DEPLOYMENT COMPLETE WHEN:

- ✅ `git pull` shows files updated
- ✅ `composer install` completes successfully
- ✅ Razorpay package shows in `composer show`
- ✅ `.env` file has RAZORPAY_KEY and RAZORPAY_SECRET
- ✅ Migration creates `payments` table
- ✅ Routes show all payment endpoints
- ✅ Checkout page loads without errors
- ✅ Payment button opens Razorpay modal
- ✅ Test payment completes successfully

---

**Need Help?**
- Check Laravel logs: `tail -f storage/logs/laravel.log`
- Check server error logs: `tail -f /var/log/nginx/error.log`
- Run diagnostic page: `https://your-domain.com/diagnostic`
