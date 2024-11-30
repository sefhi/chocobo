# VARIABLES
DOCKER_COMPOSE = docker compose
CONTAINER      = chocobo-php
EXEC           = docker exec -t --user=root $(CONTAINER)
EXEC_PHP       = $(EXEC) php
COMPOSER       = $(EXEC) composer
CURRENT-DIR  := $(dir $(abspath $(lastword $(MAKEFILE_LIST))))
CURRENT_UID  := $(shell id -u)

.DEFAULT_GOAL := deploy

.PHONY: deploy build deps update-deps composer-install ci composer-update cu composer-require cr composer start stop down recreate rebuild test

deploy: build
	@echo "📦 Build done"

build: rebuild

# 🚚 Dependencies
deps: composer-install

update-deps: composer-update

# 🐘 Composer
composer-install ci: ACTION=install

composer-update cu: ACTION=update $(module)

composer-require cr: ACTION=require $(module)

composer composer-install ci composer-update composer-require cr:
	$(COMPOSER) $(ACTION) \
			--ignore-platform-reqs \
			--no-ansi
# 🐳 Docker Compose
start: deps
	@echo "🚀 Start!!!"
	@$(DOCKER_COMPOSE) up -d
stop:
	$(DOCKER_COMPOSE) stop
down:
	$(DOCKER_COMPOSE) down
recreate:
	@echo "🔥 Recreate container!!!"
	$(DOCKER_COMPOSE) up -d --build --remove-orphans --force-recreate
	make deps
rebuild:
	@echo "🔥 Rebuild container!!!"
	$(DOCKER_COMPOSE) build --pull --force-rm --no-cache
	make start
	make deps

# 🧪 Tests
test:
	docker exec -t $(CONTAINER) ./vendor/bin/phpunit --no-coverage

test/coverage:
	docker exec -t $(CONTAINER) ./vendor/bin/phpunit --coverage-text --coverage-clover=coverage.xml --order-by=random

# 🐚 Shell
bash:
	$(DOCKER_COMPOSE) exec -it $(CONTAINER) /bin/bash

# 🐦 Run PHP ChocoboBilly
run-chocoBilly:
	@$(EXEC_PHP) src/ChocoBilly/ChocoScript.php $(inputFilePath) $(outputFilePath)