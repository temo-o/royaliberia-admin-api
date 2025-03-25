FROM php:8-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    librabbitmq-dev \
    && if ! php -m | grep -q 'amqp'; then pecl install amqp && docker-php-ext-enable amqp; fi \
    && docker-php-ext-install -j$(nproc) pdo pdo_mysql \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

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
