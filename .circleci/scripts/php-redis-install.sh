#!/usr/bin/env bash

mkdir -p ~/cache/redis-2.2.7/

if [[ ! -e ~/cache/redis-2.2.7/lib/redis.so ]]
then
    pecl install redis-2.2.7

    mkdir -p ~/cache/redis-2.2.7/lib
    cp ~/.phpenv/versions/$(phpenv version-name)/lib/php/extensions/no-debug-non-zts-20121212/redis.so ~/cache/redis-2.2.7/lib/
else
    mkdir -p ~/.phpenv/versions/$(phpenv version-name)/lib/php/extensions/no-debug-non-zts-20121212/
    cp -r ~/cache/redis-2.2.7/lib/* ~/.phpenv/versions/$(phpenv version-name)/lib/php/extensions/no-debug-non-zts-20121212/

    echo "extension=redis.so" >> ~/.phpenv/versions/$(phpenv version-name)/etc/php.ini
fi
