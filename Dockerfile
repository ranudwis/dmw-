FROM composer:latest as backenddeps

WORKDIR /deps

COPY database/ database/
COPY tests/ tests/
COPY composer.json composer.lock ./
RUN composer install


FROM php:7.4.3-apache

RUN usermod -u 1000 www-data && groupmod -g 1000 www-data

WORKDIR /backend

RUN docker-php-ext-install pdo_mysql

RUN a2enmod rewrite

COPY --from=backenddeps /deps/vendor/ vendor/

COPY . .
