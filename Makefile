
DOCKER_COMPOSE = docker-compose
DOCKER_EXEC = docker exec -it mail_php

build:
	${DOCKER_COMPOSE} build

up:
	${DOCKER_COMPOSE} up -d

down:
	${DOCKER_COMPOSE} down

migrate:
	${DOCKER_EXEC} php artisan migrate

seed:
	${DOCKER_EXEC} php artisan db:seed

test:
	${DOCKER_EXEC} php artisan test

fresh:
	${DOCKER_EXEC} php artisan m:fr

composer:
	${DOCKER_EXEC} composer install

link:
	${DOCKER_EXEC} php artisan storage:link

php:
	${DOCKER_EXEC} bash

cp_env:
	${DOCKER_EXEC} cp .env.example .env

pause:
	sleep 3

restart:
	make down up

init:
	make build up composer cp_env migrate link print

print:
	@echo http://localhost:8080/ - form to send email
	@echo http://localhost:8025/ - mailhog  smtp server to check send letters



