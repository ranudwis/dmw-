FROM composer:latest as backenddeps

WORKDIR /deps

RUN composer global require hirak/prestissimo

COPY . .

RUN composer install


FROM php:7.4.3-apache

RUN usermod -u 1000 www-data && groupmod -g 1000 www-data

WORKDIR /backend

RUN docker-php-ext-install pdo_mysql

RUN a2enmod rewrite && a2enmod proxy && a2enmod proxy_http && a2enmod proxy_wstunnel

COPY --from=backenddeps /deps/ .

COPY . .
