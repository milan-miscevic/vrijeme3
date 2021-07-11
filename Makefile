CONFIG=./docker/docker-compose.yml

check: coverage phpstan psalm standards unit

coverage:
	docker-compose -f $(CONFIG) run php -dxdebug.mode=coverage ./vendor/bin/phpunit --coverage-text

down:
	docker-compose -f $(CONFIG) down --remove-orphans

fix:
	docker-compose -f $(CONFIG) run php ./vendor/bin/php-cs-fixer fix

install:
	docker-compose -f $(CONFIG) build
	docker-compose -f $(CONFIG) run php composer install

phpstan:
	docker-compose -f $(CONFIG) run php ./vendor/bin/phpstan analyse

psalm:
	docker-compose -f $(CONFIG) run php ./vendor/bin/psalm --show-info=true

standards:
	docker-compose -f $(CONFIG) run php ./vendor/bin/php-cs-fixer fix --dry-run -v

unit:
	docker-compose -f $(CONFIG) run php ./vendor/bin/phpunit

up:
	docker-compose -f $(CONFIG) up -d
