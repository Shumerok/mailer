
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

php:
	${DOCKER_EXEC} bash

fresh:
	${DOCKER_EXEC} php artisan m:fr

key:
	${DOCKER_EXEC} php artisan key:generate

composer:
	${DOCKER_EXEC} composer install

link:
	${DOCKER_EXEC} php artisan storage:link

cp_env:
	${DOCKER_EXEC} cp .env.example .env

restart:
	make down up

init:
	make build up composer cp_env key migrate link print

print:
	@echo http://localhost:8080/ - form to send email
	@echo http://localhost:8025/ - mailhog  smtp server to check send letters



