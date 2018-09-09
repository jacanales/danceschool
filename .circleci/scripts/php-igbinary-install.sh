#!/usr/bin/env bash

mkdir -p ~/cache/igbinary-1.2.1/

if [[ ! -e ~/cache/igbinary-1.2.1/lib/igbinary.so ]]
then
    pecl install igbinary-1.2.1

    mkdir -p ~/cache/igbinary-1.2.1/lib
    mkdir -p ~/cache/igbinary-1.2.1/include
    cp ~/.phpenv/versions/$(phpenv version-name)/lib/php/extensions/no-debug-non-zts-20121212/igbinary.so ~/cache/igbinary-1.2.1/lib/
    cp ~/.phpenv/versions/$(phpenv version-name)/include/php/ext/igbinary/* ~/cache/igbinary-1.2.1/include/
else
    mkdir -p ~/.phpenv/versions/$(phpenv version-name)/lib/php/extensions/no-debug-non-zts-20121212/
    cp ~/cache/igbinary-1.2.1/lib/* ~/.phpenv/versions/$(phpenv version-name)/lib/php/extensions/no-debug-non-zts-20121212/
    mkdir -p ~/.phpenv/versions/$(phpenv version-name)/include/php/ext/apcu/
    cp ~/cache/igbinary-1.2.1/include/* ~/.phpenv/versions/$(phpenv version-name)/include/php/ext/igbinary/

    echo "extension=igbinary.so" >> ~/.phpenv/versions/$(phpenv version-name)/etc/php.ini
fi