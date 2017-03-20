#!/usr/bin/env bash

mkdir -p ~/cache/apcu-4.0.10/

if [[ ! -e ~/cache/apcu-4.0.10/lib/apcu.so ]]
then
    echo "yes" | pecl install apcu-4.0.10

    mkdir -p ~/cache/apcu-4.0.10/lib
    mkdir -p ~/cache/apcu-4.0.10/include
    cp ~/.phpenv/versions/$(phpenv version-name)/lib/php/extensions/no-debug-non-zts-20121212/apcu.so ~/cache/apcu-4.0.10/lib/
    cp ~/.phpenv/versions/$(phpenv version-name)/include/php/ext/apcu/* ~/cache/apcu-4.0.10/include/
else
    mkdir -p ~/.phpenv/versions/$(phpenv version-name)/lib/php/extensions/no-debug-non-zts-20121212/
    cp ~/cache/apcu-4.0.10/lib/* ~/.phpenv/versions/$(phpenv version-name)/lib/php/extensions/no-debug-non-zts-20121212/
    mkdir -p ~/.phpenv/versions/$(phpenv version-name)/include/php/ext/apcu/
    cp ~/cache/apcu-4.0.10/include/* ~/.phpenv/versions/$(phpenv version-name)/include/php/ext/apcu/

    echo "extension=apcu.so" >> ~/.phpenv/versions/$(phpenv version-name)/etc/php.ini
    echo "apc.cli_enabled=1" >> ~/.phpenv/versions/$(phpenv version-name)/etc/php.ini
    echo "apc.enable_cli=1" >> ~/.phpenv/versions/$(phpenv version-name)/etc/php.ini
fi