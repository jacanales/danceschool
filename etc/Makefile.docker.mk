DOCKER_FILE?=docker-compose.yml
DOCKER?=docker-compose -f $(DOCKER_FILE)
SERVICE?=php
RUN?=$(DOCKER) run $(SERVICE)
EXEC?=$(DOCKER) exec $(SERVICE)
RUN-WITH-XDEBUG?=$(DOCKER) run -e ENABLE_XDEBUG=1 $(SERVICE)
RUN-WITH-PHPDBG?=$(DOCKER) run $(SERVICE) phpdbg -qrr

########################################################################################################################
# Building images
########################################################################################################################
docker-login:
	echo ${PACKAGES} | docker login ghcr.io -u jacanales --password-stdin 

docker-build-php:
	DOCKER_BUILDKIT=1 docker build etc/docker/.docker/php -t ghcr.io/jacanales/danceschool/php:7.4

docker-push-php: docker-login docker-build-php
	docker push ghcr.io/jacanales/danceschool/php:7.4

docker-build-nodejs:
	DOCKER_BUILDKIT=1 docker build etc/docker/.docker/php -t ghcr.io/jacanales/danceschool/node:latest

docker-push-nodejs: docker-login docker-build-nodejs
	docker push ghcr.io/jacanales/danceschool/node:latest

########################################################################################################################
# Container operations
########################################################################################################################
up:
	$(DOCKER) up -d

up-ci:
	DOCKER_FILE=etc/docker/docker-compose-ci.yml $(MAKE) up

down:
	$(DOCKER) down -v

reload:
	$(MAKE) down
	sleep 1
	$(MAKE) up

provision: database-update
	$(MAKE) database-provision

build:
	$(DOCKER) build --parallel

xdebug-off:
	$(EXEC) phpdismod xdebug

xdebug-on:
	$(EXEC) phpenmod xdebug

composer-install:
	docker-compose -f etc/docker/docker-compose-ci.yml run $(SERVICE) composer install --no-scripts
.PHONY: up up-ci down reload provision build xdebug-on xdebug-off composer-install
