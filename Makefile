.PHONY: database-update cs-fix cs-fix-dry-run phpmetrics

database-update:
	bin/console doctrine:schema:update --force
	bin/console doctrine:fixtures:load

cs-fix:
	bin/php-cs-fixer fix -vv

cs-fix-dry-run:
	bin/php-cs-fixer fix --dry-run -vv

phpmetrics:
	bin/phpmetrics --plugins=./vendor/phpmetrics/symfony-extension/SymfonyExtension.php --git --report-html=web/phpmetrics src/
	bin/phpmetrics --report-violations="./build/violations.xml" src/