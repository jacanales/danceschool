.PHONY: database-update cs-fix cs-fix-dry-run

database-update:
	bin/console doctrine:schema:update --force
	bin/console doctrine:fixtures:load

cs-fix:
	bin/php-cs-fixer fix -vv

cs-fix-dry-run:
	bin/php-cs-fixer fix --dry-run -vv

