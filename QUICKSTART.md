# QUICK START GUIDE - Razorpay Integration

## Setup Instructions (Follow in Order)

### Step 1: Install Razorpay Package
The package has already been added to composer.json. Run:
```bash
composer install
```

### Step 2: Configure Environment Variables
Add these lines to your `.env` file:
```env
RAZORPAY_KEY=your_razorpay_key_id
RAZORPAY_SECRET=your_razorpay_secret_key
```

**To get your Razorpay credentials:**
1. Go to https://razorpay.com/ and sign up (if you haven't already)
2. Log in to Dashboard: https://dashboard.razorpay.com/
3. Go to Settings > API Keys
4. For testing: Use "Test Mode" keys
5. For production: Complete KYC and use "Live Mode" keys
6. Copy the Key ID and Key Secret

### Step 3: Run Migration
```bash
php artisan migrate --path=database/migrations/2025_07_15_000000_create_payments_table.php
```

Or run all pending migrations:
```bash
php artisan migrate
```

### Step 4: Clear Caches
```bash
php artisan config:clear
php artisan cache:clear
php artisan route:clear
```

### Step 5: Test the Integration

**For Test Mode (Recommended First):**
1. Use test API keys in .env
2. Navigate to: http://localhost/invexo/pricing
3. Select a plan (Annual or Quarterly)
4. Click "Subscribe Now"
5. If not logged in, log in first
6. You'll be redirected to checkout page
7. Click "Pay Securely"
8. Use test card details:
   - Card Number: 4111 1111 1111 1111
   - CVV: 123
   - Expiry: Any future date (e.g., 12/25)
   - Card Holder: Test User

**Test Card Numbers (from Razorpay):**
- Success: 4111 1111 1111 1111
- Insufficient Funds: 4000 0000 0000 0002

### Step 6: Verify Payment Success

After successful payment:
1. Check if you're redirected to success page
2. Verify payment details are shown
3. Check database:
   ```sql
   SELECT * FROM payments WHERE user_id = YOUR_USER_ID ORDER BY created_at DESC LIMIT 1;
   ```
4. Check user subscription updated:
   ```sql
   SELECT id, name, subscription_type, renewal_date FROM users WHERE id = YOUR_USER_ID;
   ```

## Files Created/Modified

### New Files:
1. `app/Http/Controllers/PaymentController.php` - Main payment controller
2. `app/Models/Payment.php` - Payment model
3. `database/migrations/2025_07_15_000000_create_payments_table.php` - Migration
4. `resources/views/checkout.blade.php` - Checkout page
5. `resources/views/payment-success.blade.php` - Success page
6. `resources/views/payment-failed.blade.php` - Failed page
7. `RAZORPAY_SETUP.md` - Detailed documentation
8. `QUICKSTART.md` - This file

### Modified Files:
1. `routes/web.php` - Added payment routes
2. `resources/views/pricing.blade.php` - Added subscribe button functionality
3. `config/services.php` - Added Razorpay configuration
4. `app/Models/User.php` - Added payments relationship
5. `composer.json` - Added Razorpay package
6. `.env.example` - Added Razorpay keys template

## Payment Flow Summary

1. **User clicks "Subscribe Now"** on pricing page
2. **Authentication check** - redirects to login if needed
3. **Checkout page** displays user info, plan details, and price
4. **Create Razorpay Order** when user clicks "Pay Securely"
5. **Razorpay Modal** opens for payment
6. **User enters** card details and completes payment
7. **Server verifies** payment signature
8. **Database updates:**
   - Payment record created with status = 'success'
   - User's subscription_type = 'premium'
   - User's renewal_date calculated (Annual: +1 year, Quarterly: +3 months)
9. **Success page** shown with payment details

## Routes Available

- `GET /pricing` - View pricing plans
- `GET /checkout?plan={annual|quarterly}` - Checkout page (Auth Required)
- `POST /payment/create-order` - Create Razorpay order (Auth Required)
- `POST /payment/verify` - Verify payment (Auth Required)
- `GET /payment/success/{payment}` - Success page (Auth Required)
- `GET /payment/failed` - Failed page (Auth Required)

## Troubleshooting

### Issue: "Class 'Razorpay\Api\Api' not found"
**Solution:**
```bash
composer dump-autoload
```

### Issue: Payment verification fails
**Solution:**
- Check RAZORPAY_KEY and RAZORPAY_SECRET in .env
- Run: `php artisan config:clear`
- Ensure you're using matching test/live mode keys

### Issue: Database error
**Solution:**
- Run migration: `php artisan migrate`
- Check database connection in .env

### Issue: Razorpay modal doesn't open
**Solution:**
- Check browser console for JavaScript errors
- Ensure jQuery is loaded before custom scripts
- Verify internet connection (Razorpay SDK loads from CDN)

## Security Notes

1. **Never commit .env file** - It contains sensitive API keys
2. **Use test mode** for development - Use live mode only in production
3. **Webhook setup** (Optional) - For automated payment notifications:
   - Go to Razorpay Dashboard > Webhooks
   - Add webhook URL (you'll need to create this endpoint)
   - Select events to listen for

## Next Steps (Optional Enhancements)

1. **Email Notifications** - Send confirmation emails after payment
2. **Webhooks** - Handle payment events asynchronously
3. **Payment History** - Create a page to view all user payments
4. **Subscription Management** - Allow users to cancel/upgrade
5. **Invoice Generation** - Generate PDF invoices for payments
6. **Payment Reminders** - Send reminders before renewal

## Support

- Razorpay Documentation: https://razorpay.com/docs/
- Laravel Documentation: https://laravel.com/docs

---

**Last Updated:** April 5, 2026
**Version:** 1.0
