FROM php:8.0.28-fpm

RUN apt-get update && apt-get install -y \
    git \
    nodejs npm
# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer