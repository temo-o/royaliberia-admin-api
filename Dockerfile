FROM php:8-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    && docker-php-ext-install -j$(nproc) pdo pdo_mysql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY application.ini /usr/local/etc/php/conf.d/

# Set working directory
WORKDIR /var/www/html

# Copy the application
COPY . .

# Expose port 9000 and start PHP-FPM server
EXPOSE 9000
CMD ["php-fpm"]
