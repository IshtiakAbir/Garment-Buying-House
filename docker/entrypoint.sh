#!/bin/sh
set -e

# 1. Determine Port (Default to 10000 on Render)
PORT="${PORT:-10000}"
echo "==> Configuring Nginx to listen on 0.0.0.0:${PORT}..."
sed -i "s/PORT_PLACEHOLDER/${PORT}/g" /etc/nginx/http.d/default.conf

# 2. Setup Storage Symlink and Permissions
echo "==> Verifying storage symlink and directory permissions..."
php artisan storage:link --force || true
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# 3. Optimize Laravel Configuration in Production
if [ -n "$APP_KEY" ]; then
    echo "==> Caching Laravel configuration, routes, and views..."
    php artisan config:cache || true
    php artisan route:cache || true
    php artisan view:cache || true
else
    echo "==> [WARN] APP_KEY is not set. Skipping configuration cache."
fi

# 4. Safe Database Migration (If Enabled via RUN_MIGRATIONS=true)
if [ "${RUN_MIGRATIONS:-false}" = "true" ]; then
    echo "==> Running database migrations..."
    php artisan migrate --force || echo "==> [WARN] Migration failed. Please check your external MySQL connection."
fi

# 5. Start Supervisor to monitor PHP-FPM and Nginx
echo "==> Starting Web Server (Nginx + PHP-FPM 8.3 via Supervisor)..."
exec /usr/bin/supervisord -c /etc/supervisord.conf

