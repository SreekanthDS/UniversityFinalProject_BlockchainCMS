# Offical Docker Image for PHP
# https://hub.docker.com/_/php
FROM php:8.1-fpm as base

# Set Current Directory
WORKDIR /var/www/vhost/

# Install dependencies
RUN apt-get clean && apt-get update && apt-get upgrade -y && apt-get install -y \
    git \
    libcurl4-openssl-dev \
    libonig-dev \
    libpng-dev \
    libssl-dev \
    libicu-dev \
    libxml2-dev \
    libzip-dev \
    unzip \
    wget \
    zip \
    tzdata \
    libfreetype6-dev \
    libjpeg62-turbo-dev


RUN docker-php-ext-configure intl
RUN docker-php-ext-configure gd \
    --with-jpeg=/usr/include/ \
    --with-freetype=/usr/include/

# PHP Extensions
RUN docker-php-ext-install \
    bcmath \
    exif \
    gd \
    mysqli \
    opcache \
    pdo_mysql \
    pcntl \
    xml \
    zip \
    intl \
    -j$(nproc) gd

# Install redis
RUN pecl install redis  \
    && docker-php-ext-enable redis

# Install XDebug
RUN pecl install xdebug  \
    && docker-php-ext-enable xdebug

EXPOSE 9003

# Install Composer from Official Docker Image
# https://hub.docker.com/_/composer
COPY --from=composer:2.2 /usr/bin/composer /usr/bin/composer

FROM node:16.15.1-alpine as node
WORKDIR /var/www/vhost/
