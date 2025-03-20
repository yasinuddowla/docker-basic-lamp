FROM php:8.3-fpm

# Install dependencies (postgres)
# RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pdo pdo_pgsql

# Install dependencies (mysql)
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Install Redis extension
RUN pecl install redis && docker-php-ext-enable redis

# Set working directory
WORKDIR /var/www/docker-app