#!/usr/bin/env bash
set -e

php ../bin/console
php ../bin/console cache:clear --env=prod
php ../bin/console assets:install --env=prod
php ../bin/console assetic:dump --env=prod
php ../bin/console doctrine:schema:update --dump-sql