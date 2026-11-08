#!/bin/sh
set -e

# 1. Determine Port (Default to 10000 on Render)
PORT="${PORT:-10000}"
echo "==> Configuring Nginx to listen on 0.0.0.0:${PORT}..."
sed -i "s/PORT_PLACEHOLDER/${PORT}/g" /etc/nginx/http.d/default.conf

# 2. Guarantee All Storage and Framework Directories Exist
echo "==> Initializing storage, framework, and database directories..."
mkdir -p \
    /var/www/html/storage/app/public \
    /var/www/html/storage/framework/cache/data \
    /var/www/html/storage/framework/sessions \
    /var/www/html/storage/framework/views \
    /var/www/html/storage/logs \
    /var/www/html/bootstrap/cache \
    /var/www/html/database

# Ensure SQLite database file exists as fallback
if [ ! -f /var/www/html/database/database.sqlite ]; then
    touch /var/www/html/database/database.sqlite
fi

# Ensure storage symlink exists
php artisan storage:link --force || true

# Set ownership and permissions
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database

# 3. Clear Stale Configuration, Route, and View Caches
echo "==> Clearing stale caches..."
php artisan config:clear || true
php artisan route:clear || true
php artisan view:clear || true

# 4. Check Database Connection & Fallback Safe Demonstration Mode
echo "==> Testing database connectivity..."
DB_STATUS=$(php -r "
try {
    \$conn = config('database.default');
    if (\$conn === 'mysql') {
        \$host = config('database.connections.mysql.host');
        if (empty(\$host) || \$host === '127.0.0.1' || \$host === 'localhost' || \$host === 'your-mysql-hostname.com') {
            echo 'MYSQL_NOT_CONFIGURED';
            exit;
        }
        DB::connection()->getPdo();
        echo 'CONNECTED';
    } else {
        DB::connection()->getPdo();
        echo 'CONNECTED';
    }
} catch (Throwable \$e) {
    echo 'FAILED: ' . \$e->getMessage();
}
" 2>/dev/null || echo "ERROR")

echo "==> Database status: ${DB_STATUS}"

if [ "$DB_STATUS" = "CONNECTED" ]; then
    echo "==> Primary database connected successfully."
    if [ "${RUN_MIGRATIONS:-false}" = "true" ]; then
        echo "==> Executing database migrations..."
        php artisan migrate --force || echo "==> [WARN] Migration encountered an issue."
    fi
else
    echo "==> [INFO] External MySQL is not reachable or not yet configured."
    echo "==> [INFO] Activating safe demonstration mode (cookie sessions, file cache) for client preview."
    # Prevent StartSession middleware from attempting queries against an unreachable database
    if [ "$SESSION_DRIVER" = "database" ] || [ -z "$SESSION_DRIVER" ]; then
        export SESSION_DRIVER="cookie"
    fi
    if [ "$CACHE_STORE" = "database" ] || [ -z "$CACHE_STORE" ]; then
        export CACHE_STORE="file"
    fi
fi

# 5. Optimize Laravel Configuration in Production
if [ -n "$APP_KEY" ]; then
    echo "==> Caching Laravel configuration, routes, and views..."
    php artisan config:cache || true
    php artisan route:cache || true
    php artisan view:cache || true
else
    echo "==> [WARN] APP_KEY is not set. Skipping configuration cache."
fi

# 6. Start Supervisor to monitor PHP-FPM and Nginx
echo "==> Starting Web Server (Nginx + PHP-FPM 8.3 via Supervisor)..."
exec /usr/bin/supervisord -c /etc/supervisord.conf
