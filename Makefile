.PHONY: database-update

database-update:
	bin/console doctrine:schema:update --force
	bin/console doctrine:fixtures:load