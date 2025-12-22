# Start with a lightweight PHP image with FPM (FastCGI Process Manager) for web servers
FROM php:8.4-fpm-alpine

# Install system tools and PHP extensions Laravel needs (e.g., for databases, images)
RUN apk add --no-cache \
    git curl libpng-dev libjpeg-turbo-dev libwebp-dev postgresql-dev zip jpegoptim \
    oniguruma-dev libzip-dev autoconf gcc make g++ \
    && docker-php-ext-configure gd --with-jpeg --with-webp \
    && docker-php-ext-install pdo pgsql pdo_pgsql mbstring exif pcntl bcmath gd zip

# Install Composer (PHP's package manager)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set the working directory inside the container
WORKDIR /var/www

# Copy your Laravel code into the container
COPY . .

# Install Laravel's dependencies
RUN composer install --optimize-autoloader --no-dev

# Set permissions for Laravel's storage and cache folders
RUN chown -R www-data:www-data /var/www
RUN chmod -R 755 storage bootstrap/cache

# Expose the port PHP-FPM listens on
EXPOSE 9000

# Run PHP-FPM when the container starts
CMD ["php-fpm"]