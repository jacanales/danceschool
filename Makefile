.PHONY: database-update cs-fix cs-fix-dry-run phpmetrics

server:
	php -S localhost:8080 -t web web/index.php

database-update:
	php bin/console doctrine:schema:update --force
	php bin/console doctrine:fixtures:load

cs-fix:
	bin/php-cs-fixer fix -vv

cs-fix-dry-run:
	bin/php-cs-fixer fix --dry-run -vv

phpmetrics:
	bin/phpmetrics --plugins=./vendor/phpmetrics/symfony-extension/SymfonyExtension.php --git --report-html=web/phpmetrics src/
	bin/phpmetrics --report-violations="./build/violations.xml" src/

phpunit:
	./bin/phpunit -c app/ --exclude-group config

phpunit-debug:
	./bin/phpunit -c app/ --debug

phpspec:
	bin/phpspec run -fdot -vvv

phpspec-unattended:
	bin/phpspec run -fdot --no-interaction

test-coverage:
	mkdir -p build
	make clean-build
	./phpunit --coverage-php=build/coverage_tests.cov -c app/
	bin/phpspec run -fdot -c "phpspec-coverage.yml"

test-coverage-html:
	make test-coverage
	bin/phpcov merge --html build/coverage build

clean-build:
	rm -rf build/*

compile-assets:
	./node_modules/.bin/encore dev --context .