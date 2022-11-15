.RECIPEPREFIX +=
.DEFAULT_GOAL := help
PROJECT_NAME=jump
include .env

help:
	@echo "Welcome to $(PROJECT_NAME) IT Support, have you tried turning it off and on again?"

install:
	docker-compose run --rm app composer install

fresh:
	docker-compose run --rm app php artisan migrate:fresh

pint:
	docker-compose run --rm app ./vendor/bin/pint

php:
	@docker exec -it $(PROJECT_NAME)_php /bin/bash

f-user:
	docker-compose run --rm app php artisan filament:user
