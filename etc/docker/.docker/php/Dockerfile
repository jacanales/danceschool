FROM composer:1.9.3 AS composer
FROM php:7.4-fpm

LABEL maintainer = "Jesús Antonio Canales Diez <jcanales@zonadev.es>"

RUN apt-get update
RUN apt-get install -y --no-install-recommends \
    git \
    zip \
    unzip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

COPY --from=composer /usr/bin/composer /usr/local/bin/composer
RUN composer global require "hirak/prestissimo"

ENV XDEBUG_REMOTE_HOST 127.0.0.1

RUN echo "\nexport TERM=xterm" >> /etc/bash.bashrc

RUN pecl install apcu
RUN pecl install redis

COPY config/php.ini /usr/local/etc/php/conf.d/10-php.ini

WORKDIR /code
