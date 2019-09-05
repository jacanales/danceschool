FROM php:7.3-fpm

LABEL maintainer = "Jesús Antonio Canales Diez <jcanales@zonadev.es>"

WORKDIR /code

RUN echo "\nexport TERM=xterm" >> /etc/bash.bashrc

RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        wget \
        supervisor \
        rsync \
        openssh-server \
        git \
        libbz2-dev \
        libpng-dev \
        zip \
        unzip \
        default-mysql-client \
    && rm -rf /var/lib/apt/lists/*

RUN pecl install \
        igbinary \
        apcu \
        redis \
        xdebug \
    && docker-php-ext-enable \
        igbinary \
        apcu \
        redis \
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
xdebug.default_enable=off\n\
xdebug.idekey=app_docker\n\
xdebug.remote_enable=on\n\
xdebug.remote_connect_back=off\n\
xdebug.remote_handler=dbgp\n\
xdebug.remote_autostart=on\n\
xdebug.coverage_enable=off\n\
xdebug.remote_port=9000\n" >> /usr/local/etc/php/conf.d/20-xdebug.ini

COPY php.ini /usr/local/etc/php/conf.d/10-php.ini

RUN printf '#!/usr/bin/env bash\ndocker-php-ext-enable "$@"\n' > /usr/local/sbin/phpenmod \
        && chmod +x /usr/local/sbin/phpenmod \
    && printf '#!/usr/bin/env bash\nrm "/usr/local/etc/php/conf.d/docker-php-ext-$@.ini"\n' > /usr/local/sbin/phpdismod \
        && chmod +x /usr/local/sbin/phpdismod

RUN printf "\n\
[supervisord]\n\
nodaemon=true\n\
logfile=/var/log/supervisord.log\n\
pidfile=/var/run/supervisord.pid\n\
\n\
[program:sshd]\n\
command=/usr/sbin/sshd -D\n\
\n\
[program:php-fpm]\n\
command=/usr/local/sbin/php-fpm --nodaemonize\n\
stdout_logfile=/dev/stdout\n\
stdout_logfile_maxbytes=0\n\
stderr_logfile=/dev/stderr\n\
stderr_logfile_maxbytes=0\n\
" > /etc/supervisor/conf.d/supervisord.conf


# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && printf "export PATH=\"$HOME/.composer/vendor/bin:$PATH\"\n" >> ~/.bashrc

RUN composer global require "squizlabs/php_codesniffer" "phpmd/phpmd" "sebastian/phpdcd=*" "hirak/prestissimo"

# Add the directory where composer put binaries to the system path
ENV PATH="$HOME/.composer/vendor/bin:${PATH}"

ENV DOCKERIZE_VERSION v0.6.1
RUN wget https://github.com/jwilder/dockerize/releases/download/$DOCKERIZE_VERSION/dockerize-linux-amd64-$DOCKERIZE_VERSION.tar.gz \
    && tar -C /usr/local/bin -xzvf dockerize-linux-amd64-$DOCKERIZE_VERSION.tar.gz \
    && rm dockerize-linux-amd64-$DOCKERIZE_VERSION.tar.gz

RUN phpdismod xdebug

WORKDIR /code

ENTRYPOINT ["docker-php-entrypoint", "dockerize"]
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
