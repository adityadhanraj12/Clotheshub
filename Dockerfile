# Use official PHP image with Apache
FROM php:8.3-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    curl \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libpq-dev \
    default-mysql-client \
    && docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl

# Enable Apache rewrite module
RUN a2enmod rewrite

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Set Apache document root to Laravel public folder
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/*.conf \
    /etc/apache2/apache2.conf \
    /etc/apache2/conf-available/*.conf

# Set permissions
RUN chown -R www-data:www-data storage bootstrap/cache
RUN chmod -R 775 storage bootstrap/cache

# Generate optimized cache
RUN php artisan config:clear || true
RUN php artisan route:clear || true
RUN php artisan view:clear || true

# Expose port
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]