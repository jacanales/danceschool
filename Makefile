PHP_CS_FIXER?=vendor/bin/php-cs-fixer --config=${PWD}/etc/php_cs_fixer/.php_cs --allow-risky=yes -n
PHP_STAN?=vendor/bin/phpstan analyse src/ --memory-limit=-1 -l max -c ${PWD}/etc/phpstan/phpstan.neon --no-progress --no-interaction

.PHONY: database-update cs-fix cs-fix-dry-run phpmetrics

server:
	php -S localhost:8080 -t web web/index.php

database-update:
	php bin/console doctrine:schema:update --force
	php bin/console doctrine:fixtures:load -n

cs-fix:
	$(PHP_CS_FIXER) fix -vv

cs-fix-dry-run:
	$(PHP_CS_FIXER) fix --dry-run -vv

cs-fix-test:
	$(PHP_CS_FIXER) fix ${FILES_TO_CHECK}

phpstan-check:
	$(PHP_STAN) ${FILES_TO_CHECK}

phpmetrics:
	bin/phpmetrics --plugins=./vendor/phpmetrics/symfony-extension/SymfonyExtension.php --git --report-html=web/phpmetrics src/
	bin/phpmetrics --report-violations="./build/violations.xml" src/

phpunit:
	./bin/phpunit --exclude-group config

phpunit-debug:
	./bin/phpunit --debug

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

composer-install:
	docker run --rm --interactive --tty \
        --volume $PWD:/code \
        composer install
up:
	docker-compose up -d

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