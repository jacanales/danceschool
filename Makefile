include etc/Makefile.docker.mk etc/Makefile.k8s.mk

PHP_CS_FIXER?=vendor/bin/php-cs-fixer --config=${PWD}/.php_cs.dist --cache-file=${PWD}/etc/php_cs_fixer/.php_cs.cache --allow-risky=yes -n
PHPSTAN?=vendor/bin/phpstan analyse --memory-limit=-1 -l max -c ${PWD}/etc/phpstan/phpstan.neon --no-progress --no-interaction
PHPSTAN_BUILD_FOLDER?=/tmp/build/phpstan
PHPSTAN_RESULT_FILE?=${PHPSTAN_BUILD_FOLDER}/phpstan.result
YAML_LINT?=yamllint -c ${PWD}/etc/yamllint/.yamllint
AUTOLOAD_CHECKER?=bin/autoload-checker --config=${PWD}/etc/autoload/.autoload-checker.yml

default: phpunit phpspec

########################################################################################################################
# Project actions
########################################################################################################################
clean-build:
	rm -rf build/*

git-hooks:
	bash bin/install-hooks.sh

########################################################################################################################
# Configure Application
########################################################################################################################
server:
	php -S localhost:8080 -t web web/index.php

database-update:
	bin/console doctrine:schema:update --force

database-provision:
	bin/console doctrine:fixtures:load -n

compile-assets:
	yarn run encore dev
.PHONY: server database-update database-provision compile-assets
########################################################################################################################
# Code Quality
########################################################################################################################
cs-fix:
	$(PHP_CS_FIXER) fix -vv

cs-fix-dry-run:
	$(PHP_CS_FIXER) fix --dry-run -vv

cs-fix-dry-run-all:
	$(PHP_CS_FIXER) fix --dry-run -vv --using-cache=no

cs-fix-test:
	$(PHP_CS_FIXER) fix ${FILES_TO_CHECK}

phpstan:
	$(PHPSTAN) src

phpstan-result:
	mkdir -p /tmp/build/phpstan
	$(PHPSTAN) src > ${PHPSTAN_RESULT_FILE} >/dev/null 2>&1 || true

autoload-check:
	$(AUTOLOAD_CHECKER)

yamllint-check:
	$(YAML_LINT) ${FILES_TO_CHECK}

phpmetrics:
	vendor/bin/phpmetrics --plugins=./vendor/phpmetrics/symfony-extension/SymfonyExtension.php --git --report-html=web/phpmetrics src/
	vendor/bin/phpmetrics --report-violations="./build/violations.xml" src/
.PHONY: cs-fix cs-fix-dry-run cs-fix-test phpstan phpstan-result phpmetrics yamllint-check
########################################################################################################################
# Tests
########################################################################################################################
phpunit:
	vendor/bin/phpunit --stop-on-error --stop-on-failure --stop-on-risky --fail-on-risk

phpunit-debug:
	vendor/bin/phpunit --debug

phpspec:
	vendor/bin/phpspec run -fdot -vvv

phpspec-unattended:
	vendor/bin/phpspec run -fdot --no-interaction

test-coverage:
	mkdir -p build
	make clean-build
	vendor/bin/phpunit --coverage-php=build/phpunit-coverage.cov
	vendor/bin/phpspec run -fdot -c "ci/phpspec-coverage.yml"

test-coverage-html:
	make test-coverage
	vendor/bin/phpcov merge --html build/coverage build

test-coverage-ci:
	docker-compose -f etc/docker/docker-compose-ci.yml run $(SERVICE) phpdbg -qrr vendor/bin/phpunit --coverage-php=build/coverage/phpunit.cov
	docker-compose -f etc/docker/docker-compose-ci.yml run $(SERVICE) phpdbg -qrr vendor/bin/phpspec run -fdot -c "ci/phpspec-coverage.yml"

test-coverage-codecov:
	docker-compose -f etc/docker/docker-compose-ci.yml run $(SERVICE) phpdbg -qrr vendor/bin/phpunit --coverage-clover=build/codecov/phpunit.xml
	docker-compose -f etc/docker/docker-compose-ci.yml run $(SERVICE) phpdbg -qrr vendor/bin/phpspec run -fdot -c "ci/phpspec-coverage.yml"
.PHONY: phpunit phpunit-debug phpspec phpspec-unattended test-coverage test-coverage-html test-coverage-ci test-coverage-codecov
