PHP_CS_FIXER?=vendor/bin/php-cs-fixer --config=${PWD}/etc/php_cs_fixer/.php_cs --cache-file=${PWD}/etc/php_cs_fixer/.php_cs.cache --allow-risky=yes -n
PHPSTAN?=vendor/bin/phpstan analyse --memory-limit=-1 -l max -c ${PWD}/etc/phpstan/phpstan.neon --no-progress --no-interaction
PHPSTAN_BUILD_FOLDER?=/tmp/build/phpstan
PHPSTAN_RESULT_FILE?=${PHPSTAN_BUILD_FOLDER}/phpstan.result
YAML_LINT?=yamllint -c ${PWD}/etc/yamllint/.yamllint
AUTOLOAD_CHECKER?=bin/autoload-checker --config=${PWD}/etc/autoload/.autoload-checker.yml
DOCKER_FILE?=docker-compose.yml
DOCKER?=docker-compose -f $(DOCKER_FILE)
SERVICE?=php
RUN?=$(DOCKER) run $(SERVICE)
EXEC?=$(DOCKER) exec $(SERVICE)
RUN-WITH-XDEBUG?=$(DOCKER) run -e ENABLE_XDEBUG=1 $(SERVICE)
RUN-WITH-PHPDBG?=$(DOCKER) run $(SERVICE) phpdbg -qrr

default: phpunit phpspec

########################################################################################################################
# Project actions
########################################################################################################################
clean-build:
	rm -rf build/*

git-hooks:
	bash bin/install-hooks.sh

########################################################################################################################
# Container operations
########################################################################################################################
up:
	$(DOCKER) up -d

up-ci:
	DOCKER_FILE=etc/docker/docker-compose-ci.yml
	$(MAKE) up

provision: database-update
	$(MAKE) database-provision

build:
	$(DOCKER) build --parallel

down:
	$(DOCKER) down -v

reload:
	$(MAKE) down
	sleep 1
	$(MAKE) up

xdebug-off:
	$(EXEC) phpdismod xdebug

xdebug-on:
	$(EXEC) phpenmod xdebug

composer-install:
	$(RUN) composer install --no-scripts
.PHONY: up up-ci down reload provision build composer-install xdebug-on xdebug-off

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
	vendor/bin/phpunit --exclude-group config

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
	$(RUN-WITH-PHPDBG) vendor/bin/phpunit --coverage-php=build/coverage/phpunit.cov
	$(RUN-WITH-PHPDBG) vendor/bin/phpspec run -c "ci/phpspec-coverage.yml"

test-coverage-codecov: test-coverage-ci
	$(RUN-WITH-PHPDBG) vendor/bin/phpcov merge --clover build/codecov/coverage.xml build
.PHONY: phpunit phpunit-debug phpspec phpspec-unattended test-coverage test-coverage-html test-coverage-ci test-coverage-codecov
########################################################################################################################
# Kubernetes
########################################################################################################################
k8s-up:
	kubectl create -f infra/k8s/namespace.yaml || echo 'Already exists'
	kubectl config set-context danceschool --namespace=danceschool \
		--cluster=docker-desktop \
		--user=docker-desktop
	kubectl config use-context danceschool

k8s-down:
	kubectl delete namespace danceschool
.PHONY: k8s-up k8s-down

docker-login:
	docker login -u jacanales -p ${GITHUB_PACKAGES} docker.pkg.github.com