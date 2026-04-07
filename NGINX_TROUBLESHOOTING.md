# NGINX RESTART FAILED - TROUBLESHOOTING GUIDE

## 🔴 ERROR: nginx.service failed to restart

This usually means there's a syntax error in your nginx configuration file.

---

## 🔍 STEP 1: Check Nginx Configuration Syntax

Run this command to test nginx configuration:

```bash
sudo nginx -t
```

**Expected output if OK:**
```
nginx: the configuration file /etc/nginx/nginx.conf syntax is ok
nginx: configuration file /etc/nginx/nginx.conf test is successful
```

**If there's an error, it will show:**
```
nginx: [emerg] unexpected "}" in /etc/nginx/sites-available/yoursite:line XX
nginx: configuration file /etc/nginx/nginx.conf test failed
```

---

## 🔍 STEP 2: View Detailed Error Logs

If nginx -t shows an error, check the detailed logs:

```bash
sudo journalctl -xeu nginx.service
```

Or:

```bash
sudo systemctl status nginx.service
```

Or check nginx error log:

```bash
sudo tail -50 /var/log/nginx/error.log
```

---

## 🛠️ COMMON ISSUES & SOLUTIONS

### Issue 1: Syntax Error in nginx.conf
**Symptoms:** `nginx -t` shows syntax error

**Solution:**
```bash
# Edit the nginx config file
sudo nano /etc/nginx/sites-available/yoursite

# Common syntax errors:
# - Missing semicolon ;
# - Missing closing brace }
# - Wrong file path
# - Typo in directive name
```

### Issue 2: Port Already in Use
**Symptoms:** Error mentions "address already in use" or "bind() failed"

**Solution:**
```bash
# Check what's using port 80
sudo netstat -tulpn | grep :80

# Kill the process if needed
sudo kill -9 PID_NUMBER

# Or use a different port in nginx config
```

### Issue 3: SSL Certificate Issues
**Symptoms:** Error mentions SSL certificate or key file

**Solution:**
```bash
# Check if SSL certificate files exist
ls -l /etc/nginx/ssl/
ls -l /etc/letsencrypt/live/your-domain.com/

# If missing, comment out SSL lines temporarily in nginx config:
# listen 443 ssl;
# ssl_certificate /path/to/cert;
# ssl_certificate_key /path/to/key;
```

### Issue 4: Wrong File Permissions
**Symptoms:** Error mentions "permission denied"

**Solution:**
```bash
# Fix nginx config permissions
sudo chmod 644 /etc/nginx/sites-available/*
sudo chmod 644 /etc/nginx/nginx.conf

# Fix web root permissions
sudo chown -R www-data:www-data /var/www/html
sudo chmod -R 755 /var/www/html
```

### Issue 5: Module or Directive Not Found
**Symptoms:** Error mentions "unknown directive" or "module"

**Solution:**
```bash
# Check nginx version and modules
nginx -V

# Remove or comment out unsupported directives
```

---

## ✅ QUICK FIX PROCEDURE

**Step 1: Test configuration**
```bash
sudo nginx -t
```

**Step 2: If error found, edit the config**
```bash
# Find which config file has the error (shown in nginx -t output)
sudo nano /etc/nginx/sites-available/yoursite
```

**Step 3: Fix the error and test again**
```bash
sudo nginx -t
```

**Step 4: Once test passes, restart nginx**
```bash
sudo systemctl restart nginx
```

**Step 5: Verify nginx is running**
```bash
sudo systemctl status nginx
```

---

## 🔧 ALTERNATIVE: Restart Using Different Method

If systemctl doesn't work, try:

```bash
# Stop nginx
sudo systemctl stop nginx

# Start nginx directly
sudo nginx

# Or use service command
sudo service nginx restart
```

---

## 📋 DIAGNOSTIC COMMANDS

Run these to gather information:

```bash
# 1. Check nginx configuration syntax
sudo nginx -t

# 2. Check nginx service status
sudo systemctl status nginx

# 3. View recent error logs
sudo tail -50 /var/log/nginx/error.log

# 4. View access logs
sudo tail -50 /var/log/nginx/access.log

# 5. Check if port 80 is in use
sudo netstat -tulpn | grep :80

# 6. Check nginx processes
ps aux | grep nginx

# 7. Check nginx version and modules
nginx -V

# 8. View full systemd logs
sudo journalctl -xeu nginx.service --no-pager
```

---

## 🚨 IF NGINX WON'T START AT ALL

### Emergency Workaround:

**1. Stop nginx completely:**
```bash
sudo systemctl stop nginx
sudo killall nginx
```

**2. Use minimal nginx config:**
```bash
# Backup current config
sudo cp /etc/nginx/nginx.conf /etc/nginx/nginx.conf.backup

# Use default config
sudo cp /etc/nginx/nginx.conf.default /etc/nginx/nginx.conf
```

**3. Start nginx:**
```bash
sudo nginx -t
sudo systemctl start nginx
```

**4. Once running, restore your config step by step**

---

## 💡 SPECIFIC TO LARAVEL

If nginx fails after deploying Laravel, check:

### 1. Laravel Site Configuration

Your nginx config should look like this:

```nginx
server {
    listen 80;
    server_name your-domain.com;
    root /var/www/html/your-laravel-project/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    index index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

### 2. Check PHP-FPM is Running

```bash
sudo systemctl status php8.1-fpm
# Or php8.0-fpm, php7.4-fpm depending on version
```

### 3. Verify File Paths

Make sure the `root` path in nginx config points to your Laravel `/public` directory:

```bash
ls -la /var/www/html/your-laravel-project/public/index.php
```

---

## 📞 WHAT TO SEND FOR HELP

If you need help, provide:

1. **Output of nginx test:**
   ```bash
   sudo nginx -t
   ```

2. **Output of systemctl status:**
   ```bash
   sudo systemctl status nginx -l
   ```

3. **Last 50 lines of error log:**
   ```bash
   sudo tail -50 /var/log/nginx/error.log
   ```

4. **Your nginx site configuration:**
   ```bash
   cat /etc/nginx/sites-available/yoursite
   ```

---

## ✅ ONCE FIXED

After fixing nginx and getting it running:

```bash
# Verify nginx is running
sudo systemctl status nginx

# Test your Laravel app in browser
curl http://your-domain.com

# Check Laravel logs
tail -f /var/www/html/your-laravel-project/storage/logs/laravel.log

# Continue with payment gateway deployment
bash verify-aws-deployment.sh
```

---

## 🎯 MOST LIKELY CAUSE

Based on the error during Laravel deployment, the most common causes are:

1. **Syntax error in nginx vhost config** (90% of cases)
   - Missing semicolon `;`
   - Missing closing brace `}`
   - Wrong file path

2. **Port 80 already in use** (5% of cases)
   - Apache running on same port
   - Another process using port 80

3. **Permission issues** (5% of cases)
   - nginx can't access files
   - SSL certificate files not readable

**Start with `sudo nginx -t` - it will tell you exactly what's wrong!**
