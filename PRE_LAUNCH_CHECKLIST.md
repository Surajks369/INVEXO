# ✅ Pre-Launch Checklist - Razorpay Payment Gateway

Use this checklist before going live with the payment gateway.

## 🔧 Installation Verification

- [x] **Razorpay Package Installed**
  - Package: razorpay/razorpay v2.9.2
  - Status: ✅ Installed and verified
  - Command used: `composer install`

- [x] **Database Migration Created**
  - File: `database/migrations/2025_07_15_000000_create_payments_table.php`
  - Status: ✅ File exists

- [ ] **Migration Executed**
  - Command to run: `php artisan migrate`
  - Verify: Check if `payments` table exists in database
  - Status: ⏭️ **YOU NEED TO RUN THIS**

- [x] **Payment Routes Registered**
  - Verified routes:
    - ✅ GET /checkout
    - ✅ POST /payment/create-order
    - ✅ POST /payment/verify
    - ✅ GET /payment/success/{payment}
    - ✅ GET /payment/failed

- [x] **Controller Created**
  - File: `app/Http/Controllers/PaymentController.php`
  - Status: ✅ Created with all methods

- [x] **Views Created**
  - ✅ checkout.blade.php
  - ✅ payment-success.blade.php
  - ✅ payment-failed.blade.php

- [x] **Models Updated**
  - ✅ Payment model created
  - ✅ User model updated with payments relationship

## ⚙️ Configuration Setup

- [ ] **Razorpay API Keys Added to .env**
  ```env
  RAZORPAY_KEY=your_razorpay_key_here
  RAZORPAY_SECRET=your_razorpay_secret_here
  ```
  Status: ⏭️ **YOU NEED TO ADD THESE**
  
  How to get keys:
  1. Go to https://dashboard.razorpay.com/
  2. Settings > API Keys
  3. Copy Key ID and Key Secret
  4. For testing: Use "Test Mode" keys
  5. For production: Use "Live Mode" keys (after KYC)

- [ ] **Cache Cleared**
  Commands to run:
  ```bash
  php artisan config:clear
  php artisan cache:clear
  php artisan route:clear
  ```
  Status: ⏭️ **RUN AFTER ADDING KEYS**

## 🧪 Testing Checklist

### Test Mode Setup (Do This First)
- [ ] **Razorpay Test Account Created**
  - Sign up at: https://razorpay.com/
  - Dashboard: https://dashboard.razorpay.com/

- [ ] **Test API Keys Added to .env**
  - Keys should start with `rzp_test_`

### Test Payment Flow

#### Test 1: Annual Plan
- [ ] Navigate to `/pricing`
- [ ] Click "Annual" button (₹999/year)
- [ ] Click "Subscribe Now"
- [ ] Should redirect to login (if not logged in)
- [ ] Login with test user
- [ ] Should redirect to `/checkout?plan=annual`
- [ ] Verify checkout page shows:
  - [ ] User name and email
  - [ ] Plan: Premium Plan
  - [ ] Duration: 1 Year
  - [ ] Amount: ₹999.00
- [ ] Click "Pay ₹999.00 Securely"
- [ ] Razorpay modal should open
- [ ] Use test card:
  - Card: 4111 1111 1111 1111
  - CVV: 123
  - Expiry: 12/25 (any future date)
- [ ] Complete payment
- [ ] Should redirect to success page
- [ ] Verify success page shows:
  - [ ] Payment ID
  - [ ] Order ID
  - [ ] Amount: ₹999.00
  - [ ] Renewal Date (1 year from today)

#### Test 2: Quarterly Plan
- [ ] Navigate to `/pricing`
- [ ] Click "Quarterly" button (₹599/3 months)
- [ ] Click "Subscribe Now"
- [ ] Should redirect to `/checkout?plan=quarterly`
- [ ] Verify checkout shows:
  - [ ] Duration: 3 Months
  - [ ] Amount: ₹599.00
- [ ] Click "Pay ₹599.00 Securely"
- [ ] Razorpay modal opens
- [ ] Use test card: 4111 1111 1111 1111
- [ ] Complete payment
- [ ] Verify success page shows:
  - [ ] Amount: ₹599.00
  - [ ] Renewal Date (3 months from today)

#### Test 3: Failed Payment
- [ ] Navigate to checkout
- [ ] Click "Pay Securely"
- [ ] Use failed test card: 4000 0000 0000 0002
- [ ] Try to complete payment
- [ ] Should show error or redirect to failed page
- [ ] Verify error message is shown

### Database Verification

After successful payment, check database:

#### Payments Table
- [ ] Run query:
  ```sql
  SELECT * FROM payments ORDER BY created_at DESC LIMIT 1;
  ```
- [ ] Verify fields:
  - [ ] `user_id` - Matches logged-in user
  - [ ] `razorpay_order_id` - Has value (starts with `order_`)
  - [ ] `razorpay_payment_id` - Has value (starts with `pay_`)
  - [ ] `razorpay_signature` - Has value
  - [ ] `plan_type` - Shows 'annual' or 'quarterly'
  - [ ] `amount` - Shows 999.00 or 599.00
  - [ ] `status` - Shows 'success'
  - [ ] `paid_at` - Has timestamp

#### Users Table
- [ ] Run query:
  ```sql
  SELECT id, name, subscription_type, renewal_date FROM users WHERE id = YOUR_USER_ID;
  ```
- [ ] Verify fields:
  - [ ] `subscription_type` - Shows 'premium'
  - [ ] `renewal_date` - Shows correct future date
    - Annual: Today + 1 year
    - Quarterly: Today + 3 months

## 🔒 Security Verification

- [x] **Signature Verification Implemented**
  - Location: `PaymentController::verifyPayment()`
  - Status: ✅ Implemented

- [x] **Amount Validation**
  - Server-side validation in `createOrder()`
  - Status: ✅ Implemented

- [x] **Authentication Required**
  - All payment routes behind `auth` middleware
  - Status: ✅ Implemented

- [x] **CSRF Protection**
  - All POST requests include CSRF token
  - Status: ✅ Implemented

- [ ] **.env File Security**
  - [ ] Verify `.env` is in `.gitignore`
  - [ ] Never commit API keys to version control

## 📱 User Experience Checks

- [ ] **Pricing Page**
  - [ ] Plan toggle works (Annual ↔️ Quarterly)
  - [ ] Price updates when toggling
  - [ ] Subscribe buttons work
  - [ ] Redirects to login if not authenticated

- [ ] **Checkout Page**
  - [ ] Loads quickly
  - [ ] All user details show correctly
  - [ ] Plan details match selection
  - [ ] Price is correct
  - [ ] Pay button is visible and clickable

- [ ] **Payment Modal**
  - [ ] Opens smoothly
  - [ ] Pre-filled with user details
  - [ ] Accepts card input
  - [ ] Shows loading state
  - [ ] Can be closed

- [ ] **Success Page**
  - [ ] Clear confirmation message
  - [ ] Shows all payment details
  - [ ] Shows renewal date
  - [ ] "Go to Dashboard" button works
  - [ ] "Back to Home" button works

- [ ] **Failed Page**
  - [ ] Shows error message
  - [ ] "Try Again" button works
  - [ ] "Contact Support" link works

## 🚀 Production Readiness

### Before Going Live:
- [ ] **Switch to Live API Keys**
  - [ ] Complete KYC on Razorpay
  - [ ] Get live API keys (start with `rzp_live_`)
  - [ ] Update .env with live keys
  - [ ] Clear config cache

- [ ] **Test with Real Card**
  - [ ] Make a small test payment (₹1-10)
  - [ ] Verify entire flow works
  - [ ] Check database updates
  - [ ] Refund test payment if needed

- [ ] **Backup Database**
  - [ ] Take database backup before going live

- [ ] **Set Up Webhooks** (Optional but Recommended)
  - [ ] Go to Razorpay Dashboard > Webhooks
  - [ ] Add webhook URL
  - [ ] Select events to listen for

- [ ] **Error Monitoring**
  - [ ] Check `storage/logs/laravel.log` regularly
  - [ ] Set up error alerts if possible

## 📊 Post-Launch Monitoring

After going live, monitor:
- [ ] Payment success rate
- [ ] Failed payments and reasons
- [ ] User subscription renewal dates
- [ ] Database payment records
- [ ] Error logs

## 🆘 Troubleshooting

If something doesn't work, check:
1. [ ] Are Razorpay keys in .env correct?
2. [ ] Did you run `php artisan config:clear`?
3. [ ] Is payments table created? (`php artisan migrate`)
4. [ ] Check browser console for JavaScript errors
5. [ ] Check `storage/logs/laravel.log` for PHP errors
6. [ ] Verify internet connection (Razorpay SDK loads from CDN)

## 📚 Documentation Available

- [x] **QUICKSTART.md** - Quick setup guide
- [x] **RAZORPAY_SETUP.md** - Detailed documentation
- [x] **IMPLEMENTATION_SUMMARY.md** - What was implemented
- [x] **verify-payment-setup.bat** - Automated verification script
- [x] **This Checklist** - Pre-launch verification

---

## ✅ Final Sign-Off

Before going live, confirm:
- [ ] All tests passed
- [ ] Database verified
- [ ] Security checks done
- [ ] User experience smooth
- [ ] Error handling works
- [ ] Documentation reviewed

**Tested By:** _________________  
**Date:** _________________  
**Status:** [ ] Ready for Production  

---

**IMPORTANT NOTES:**
1. Start with TEST MODE - use test API keys first
2. Test thoroughly before switching to live keys
3. Keep API keys secret - never commit to Git
4. Monitor logs after going live
5. Have a support plan ready for payment issues

For support: See QUICKSTART.md or RAZORPAY_SETUP.md
