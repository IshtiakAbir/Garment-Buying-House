# ==============================================================================
# Stage 1: Build Frontend Assets with Node.js & Vite
# ==============================================================================
FROM node:22-alpine AS frontend-builder

WORKDIR /app

# Copy package dependency manifests
COPY package.json package-lock.json* ./

# Install npm dependencies
RUN npm ci

# Copy build configuration and resources
COPY vite.config.js ./
COPY resources ./resources

# Build optimized production assets to public/build
RUN npm run build

# ==============================================================================
# Stage 2: Production PHP 8.3-FPM + Nginx Runtime
# ==============================================================================
FROM php:8.3-fpm-alpine AS production

# Install system dependencies, Nginx, and Supervisor
RUN apk add --no-cache \
    nginx \
    supervisor \
    curl \
    bash \
    unzip \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    libzip-dev \
    oniguruma-dev \
    icu-dev \
    sqlite-dev

# Configure and install required PHP extensions (MySQL + SQLite fallback + core extensions)
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
        pdo_mysql \
        pdo_sqlite \
        mbstring \
        bcmath \
        zip \
        intl \
        gd \
        opcache

# Copy OPcache configuration
COPY docker/php/opcache.ini /usr/local/etc/php/conf.d/opcache.ini

# Install Composer from official image
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy Composer manifests and install production dependencies
COPY composer.json composer.lock* ./
RUN composer install \
    --no-dev \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --prefer-dist \
    --optimize-autoloader

# Copy application codebase
COPY . .

# Copy compiled frontend assets from Stage 1
COPY --from=frontend-builder /app/public/build ./public/build

# Complete Composer autoloader optimization
RUN composer dump-autoload --optimize --no-dev

# Ensure all storage, cache, and database directories exist in the build image
RUN mkdir -p \
    storage/app/public \
    storage/framework/cache/data \
    storage/framework/sessions \
    storage/framework/views \
    storage/logs \
    bootstrap/cache \
    database \
    && touch database/database.sqlite

# Configure Nginx, Supervisor, and Entrypoint
COPY docker/nginx.conf /etc/nginx/http.d/default.conf
COPY docker/supervisord.conf /etc/supervisord.conf
COPY docker/entrypoint.sh /entrypoint.sh

# Normalize CRLF to LF and grant execution permissions to entrypoint
RUN sed -i 's/\r$//' /entrypoint.sh \
    && chmod +x /entrypoint.sh

# Set correct ownership and permissions for Laravel writable directories
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database

# Expose Render default port (Render will map to $PORT)
EXPOSE 10000

# Run entrypoint
ENTRYPOINT ["/entrypoint.sh"]
