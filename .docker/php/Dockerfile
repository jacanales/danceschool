FROM php:7.2-fpm

LABEL maintainer = "Jesús Antonio Canales Diez <jcanales@zonadev.es>"

WORKDIR /code

RUN echo "\nexport TERM=xterm" >> /etc/bash.bashrc

RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        git \
        libbz2-dev \
        libpng-dev \
        zip \
        unzip \
        mysql-client \
    && rm -rf /var/lib/apt/lists/*

RUN pecl install \
        igbinary \
        apcu \
        apcu_bc-beta \
        redis \
        xdebug \
    && docker-php-ext-enable \
        igbinary \
        apcu \
        redis \
        xdebug \
    && docker-php-ext-install \
        bz2 \
        bcmath \
        gd \
        pdo_mysql \
        sockets \
        opcache \
    && printf "\nopcache.enable_cli = 1\n" >> /usr/local/etc/php/conf.d/docker-php-ext-opcache.ini

# Install NodeJS

ENV XDEBUG_REMOTE_HOST 127.0.0.1

RUN printf "\nxdebug.remote_host=\${XDEBUG_REMOTE_HOST}\n\
xdebug.default_enable=on\n\
xdebug.idekey=app_docker\n\
xdebug.remote_enable=on\n\
xdebug.remote_connect_back=off\n\
xdebug.remote_handler=dbgp\n\
xdebug.remote_autostart=on\n\
xdebug.remote_port=9000\n" >> /usr/local/etc/php/conf.d/20-xdebug.ini

COPY php.ini /usr/local/etc/php/conf.d/10-php.ini

RUN printf '#!/usr/bin/env bash\ndocker-php-ext-enable "$@"\n' > /usr/local/sbin/phpenmod \
        && chmod +x /usr/local/sbin/phpenmod \
    && printf '#!/usr/bin/env bash\nrm "/usr/local/etc/php/conf.d/docker-php-ext-$@.ini"\n' > /usr/local/sbin/phpdismod \
        && chmod +x /usr/local/sbin/phpdismod

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && printf "export PATH=\"$HOME/.composer/vendor/bin:$PATH\"\n" >> ~/.bashrc

RUN composer global require "squizlabs/php_codesniffer" "phpmd/phpmd" "sebastian/phpdcd=*"
