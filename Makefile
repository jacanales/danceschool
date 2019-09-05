PHP_CS_FIXER?=vendor/bin/php-cs-fixer --config=${PWD}/etc/php_cs_fixer/.php_cs --cache-file=${PWD}/etc/php_cs_fixer/.php_cs.cache --allow-risky=yes -n
PHPSTAN?=vendor/bin/phpstan analyse --memory-limit=-1 -l max -c ${PWD}/etc/phpstan/phpstan.neon --no-progress --no-interaction
PHPSTAN_BUILD_FOLDER?=/tmp/build/phpstan
PHPSTAN_RESULT_FILE?=${PHPSTAN_BUILD_FOLDER}/phpstan.result
YAML_LINT?=yamllint -c ${PWD}/etc/yamllint/.yamllint
AUTOLOAD_CHECKER?=bin/autoload-checker --config=${PWD}/etc/autoload/.autoload-checker.yml
SERVICE?=fpm
DOCKER_FILE?=etc/docker/docker-compose.yml
DOCKER?=docker-compose -f $(DOCKER_FILE)
EXEC?=$(DOCKER) exec $(SERVICE)
RUN?=$(DOCKER) run $(SERVICE)
RUN-WITH-XDEBUG?=$(DOCKER) run -e ENABLE_XDEBUG=1 $(SERVICE)
RUN-WITH-PHPDBG?=$(DOCKER) run $(SERVICE) phpdbg -qrr

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
	$(MAKE) build
	$(DOCKER) up -d
	$(MAKE) database-update
	$(RUN) composer bash `bin/composer.phar install`
.PHONY: up

up-ci:
	DOCKER_FILE=etc/docker/docker-compose-ci.yml
	$(MAKE) up
.PHONY: up-ci

provision:
	$(MAKE) database-provision

build:
	$(DOCKER) build --parallel
.PHONY: build

down:
	$(DOCKER) down -v
.PHONY: down

reload:
	$(MAKE) down
	sleep 1
	$(MAKE) up
.PHONY: reload

xdebug-off:
	$(EXEC) phpdismod xdebug
.PHONY: xdebug-off

xdebug-on:
	$(EXEC) phpenmod xdebug
.PHONY: xdebug-on

composer-install:
	docker run --rm --interactive --tty \
        --volume $PWD:/code \
        composer install
.PHONY: composer-install

########################################################################################################################
# Configure Application
########################################################################################################################
server:
	php -S localhost:8080 -t web web/index.php
.PHONY: server

database-update:
	bin/console doctrine:schema:update --force
.PHONY: database-update

database-provision:
	bin/console doctrine:fixtures:load -n

compile-assets:
	./node_modules/.bin/encore dev --context .
.PHONY: compile-assets

########################################################################################################################
# Code Quality
########################################################################################################################
cs-fix:
	$(PHP_CS_FIXER) fix -vv
.PHONY: cs-fix

cs-fix-dry-run:
	$(PHP_CS_FIXER) fix --dry-run -vv
.PHONY:cs-fix-dry-run

cs-fix-test:
	$(PHP_CS_FIXER) fix ${FILES_TO_CHECK}
.PHONY: cs-fix-test

phpstan-check:
ifndef FILES_TO_CHECK
override FILES_TO_CHECK = src
endif
	$(PHPSTAN) ${FILES_TO_CHECK}
.PHONY: phpstan-check

phpstan-result:
	mkdir -p ${PHPSTAN_BUILD_FOLDER}
	$(MAKE) phpstan-check > ${PHPSTAN_RESULT_FILE} >/dev/null 2>&1 || true
.PHONY: phpstan-result

autoload-check:
	$(AUTOLOAD_CHECKER)

yamllint-check:
	$(YAML_LINT) ${FILES_TO_CHECK}
.PHONY: yamllint-check

phpmetrics:
	vendor/bin/phpmetrics --plugins=./vendor/phpmetrics/symfony-extension/SymfonyExtension.php --git --report-html=web/phpmetrics src/
	vendor/bin/phpmetrics --report-violations="./build/violations.xml" src/

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
	vendor/bin/phpunit --coverage-php=build/coverage_tests.cov -c app/
	vendor/bin/phpspec run -fdot -c "ci/phpspec-coverage.yml"

test-coverage-html:
	make test-coverage
	vendor/bin/phpcov merge --html build/coverage build

test-coverage-ci:
	$(RUN-WITH-PHPDBG) vendor/bin/phpunit --coverage-php=build/coverage/phpunit.cov
	$(RUN-WITH-PHPDBG) vendor/bin/phpspec run -c "ci/phpspec-coverage.yml"

test-coverage-codecov: test-coverage
	$(RUN) vendor/bin/phpcov merge --clover build/codecov/coverage.xml build

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
