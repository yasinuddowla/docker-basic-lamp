FROM php:8.3-fpm

# Install dependencies
RUN docker-php-ext-install pdo pdo_mysql

# Set working directory
WORKDIR /var/www/docker-app