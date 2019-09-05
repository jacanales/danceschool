PHP_CS_FIXER?=vendor/bin/php-cs-fixer --config=${PWD}/etc/php_cs_fixer/.php_cs --cache-file=${PWD}/etc/php_cs_fixer/.php_cs.cache --allow-risky=yes -n
PHP_STAN?=vendor/bin/phpstan analyse --memory-limit=-1 -l max -c ${PWD}/etc/phpstan/phpstan.neon --no-progress --no-interaction
YAML_LINT?=yamllint -c ${PWD}/etc/yamllint/.yamllint
AUTOLOAD_CHECKER?=bin/autoload-checker --config=${PWD}/etc/autoload/.autoload-checker.yml
DOCKER_FILE?=etc/docker/docker-compose.yml
DOCKER?=docker-compose -f $(DOCKER_FILE)
EXEC?=$(DOCKER) exec $(SERVICE)
RUN?=$(DOCKER) run $(SERVICE)

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
.PHONY: up

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

########################################################################################################################
# Configure Application
########################################################################################################################
server:
	php -S localhost:8080 -t web web/index.php
.PHONY: server

database-update:
	bin/console doctrine:schema:update --force
	bin/console doctrine:fixtures:load -n
.PHONY: database-update

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
	$(PHP_STAN) ${FILES_TO_CHECK}

autoload-check:
	$(AUTOLOAD_CHECKER)

yamllint-check:
	$(YAML_LINT) ${FILES_TO_CHECK}
.PHONY: yamllint-check

phpmetrics:
	vendor/bin/phpmetrics --plugins=./vendor/phpmetrics/symfony-extension/SymfonyExtension.php --git --report-html=web/phpmetrics src/
	vendor/bin/phpmetrics --report-violations="./build/violations.xml" src/

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
	vendor/bin/phpspec run -fdot -c "phpspec-coverage.yml"

test-coverage-html:
	make test-coverage
	vendor/bin/phpcov merge --html build/coverage build

clean-build:
	rm -rf build/*

compile-assets:
	./node_modules/.bin/encore dev --context .

composer-install:
	docker run --rm --interactive --tty \
        --volume $PWD:/code \
        composer install
k8s-up:
	kubectl create -f infra/k8s/namespace.yaml || echo 'Already exists'
	kubectl config set-context danceschool --namespace=danceschool \
		--cluster=docker-desktop \
		--user=docker-desktop
	kubectl config use-context danceschool

k8s-down:
	kubectl delete namespace danceschool

git-hooks:
	bash bin/install-hooks.sh