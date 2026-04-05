# Razorpay Payment Integration Setup Guide

## Overview
This document explains how to set up and use the Razorpay payment gateway for subscription payments in the INVEXO application.

## Prerequisites
- PHP 7.4 or higher
- Composer
- Razorpay account (sign up at https://razorpay.com/)

## Installation Steps

### 1. Install Razorpay PHP SDK

Run the following command in your terminal:

```bash
composer require razorpay/razorpay
```

### 2. Configure Razorpay Credentials

1. Log in to your Razorpay Dashboard (https://dashboard.razorpay.com/)
2. Navigate to Settings > API Keys
3. Generate API keys (or use existing ones)
4. Copy your `Key ID` and `Key Secret`

Add the following to your `.env` file:

```env
RAZORPAY_KEY=your_razorpay_key_id
RAZORPAY_SECRET=your_razorpay_secret
```

**Important:** Never commit your actual API keys to version control. The `.env` file is already in `.gitignore`.

### 3. Run Database Migration

Execute the payments table migration:

```bash
php artisan migrate
```

This will create the `payments` table with the following columns:
- `id` - Primary key
- `user_id` - Foreign key to users table
- `razorpay_order_id` - Razorpay order ID
- `razorpay_payment_id` - Razorpay payment ID
- `razorpay_signature` - Payment signature for verification
- `plan_type` - Subscription plan (annual/quarterly)
- `amount` - Payment amount
- `currency` - Currency (default: INR)
- `status` - Payment status (pending/success/failed)
- `payment_method` - Payment method used
- `error_description` - Error details if payment failed
- `paid_at` - Payment timestamp
- `created_at` - Record creation timestamp
- `updated_at` - Record update timestamp

### 4. Clear Configuration Cache

After adding environment variables, clear the config cache:

```bash
php artisan config:clear
php artisan cache:clear
```

## Payment Flow

### User Journey

1. **Browse Pricing Page** (`/pricing`)
   - User selects between Annual (₹999/year) or Quarterly (₹599/3 months)
   - Clicks "Subscribe Now" button

2. **Authentication Check**
   - If not logged in → Redirected to login page
   - If logged in → Proceeds to checkout

3. **Checkout Page** (`/checkout?plan=annual` or `/checkout?plan=quarterly`)
   - Displays user details
   - Shows selected plan details
   - Shows price summary
   - "Pay Securely" button

4. **Payment Processing**
   - Click "Pay Securely" button
   - System creates Razorpay order
   - Razorpay payment modal opens
   - User completes payment

5. **Payment Verification**
   - System verifies payment signature
   - Updates payment record
   - Updates user subscription details
   - Sets renewal date

6. **Success/Failure**
   - Success → Redirected to success page
   - Failure → Redirected to failure page

## API Endpoints

### User-Facing Routes (Protected by Auth Middleware)

- `GET /checkout` - Display checkout page
- `POST /payment/create-order` - Create Razorpay order
- `POST /payment/verify` - Verify payment signature
- `GET /payment/success/{payment}` - Display success page
- `GET /payment/failed` - Display failure page

## Database Schema

### payments Table

```sql
CREATE TABLE payments (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT UNSIGNED NOT NULL,
    razorpay_order_id VARCHAR(255),
    razorpay_payment_id VARCHAR(255),
    razorpay_signature VARCHAR(255),
    plan_type VARCHAR(255) NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    currency VARCHAR(255) DEFAULT 'INR',
    status VARCHAR(255) DEFAULT 'pending',
    payment_method TEXT,
    error_description TEXT,
    paid_at TIMESTAMP NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);
```

### users Table (Subscription Fields)

The following fields are updated upon successful payment:
- `subscription_type` - Set to 'premium'
- `join_date` - Date when subscription started
- `renewal_date` - Calculated based on plan_type:
  - Annual: Current date + 1 year
  - Quarterly: Current date + 3 months
- `status` - Set to 1 (active)

## Security Features

1. **Signature Verification**
   - Every payment is verified using Razorpay's signature verification
   - Prevents payment tampering

2. **Amount Validation**
   - Server-side validation ensures amount matches the plan
   - Prevents price manipulation

3. **User Authentication**
   - All payment routes are protected by auth middleware
   - Users can only view their own payment details

4. **CSRF Protection**
   - All POST requests include CSRF token
   - Laravel's built-in CSRF protection

## Testing

### Test Mode

Razorpay provides test mode for development:

1. Use test API keys from Razorpay Dashboard
2. Test card numbers are available at: https://razorpay.com/docs/payments/payments/test-card-details/

Example test card:
- Card Number: `4111 1111 1111 1111`
- CVV: Any 3 digits
- Expiry: Any future date

### Production Mode

When going live:

1. Replace test API keys with live API keys in `.env`
2. Complete KYC verification on Razorpay
3. Set up payment methods and webhooks
4. Test with small real transactions first

## Troubleshooting

### Common Issues

**1. "Class 'Razorpay\Api\Api' not found"**
- Solution: Run `composer require razorpay/razorpay`
- Then run `composer dump-autoload`

**2. Payment signature verification fails**
- Check that RAZORPAY_KEY and RAZORPAY_SECRET are correct
- Ensure .env values are properly loaded (`php artisan config:clear`)

**3. Payment succeeds but user subscription not updated**
- Check application logs: `storage/logs/laravel.log`
- Verify database connection
- Check if renewal_date column exists in users table

**4. Razorpay modal doesn't open**
- Verify Razorpay SDK is loaded in the page
- Check browser console for JavaScript errors
- Ensure jQuery is loaded before Razorpay SDK

## Support

For Razorpay-specific issues:
- Documentation: https://razorpay.com/docs/
- Support: https://razorpay.com/support/

For application issues:
- Check logs in `storage/logs/laravel.log`
- Contact development team

## Additional Notes

- All amounts are in Indian Rupees (INR)
- Payment gateway charges are handled by Razorpay
- Email notifications can be configured separately
- Webhooks can be set up for automated payment notifications
