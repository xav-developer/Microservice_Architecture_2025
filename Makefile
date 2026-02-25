build-authorization:
	docker build application/authorization --platform=linux/amd64 --tag phexel/authorization:latest

build-profile:
	docker build application/profile --platform=linux/amd64 --tag phexel/profile:latest

push-authorization:
	docker push phexel/authorization:latest

push-profile:
	docker push phexel/profile:latest

build:
	docker compose build

install:
	docker compose run --rm authorization composer install
	docker compose run --rm profile composer install

update:
	docker compose run --rm authorization composer update
	docker compose run --rm profile composer update

fix:
	docker compose run --rm authorization composer fix
	docker compose run --rm profile composer fix

init:
	docker compose run --rm authorization php artisan key:generate
	docker compose run --rm profile php artisan key:generate

optimize:
	docker compose run --rm authorization php artisan optimize
	docker compose run --rm profile php artisan optimize

up:
	docker compose up --detach --wait

down:
	docker compose down

restart: down up
