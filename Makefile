DOCKER=docker-compose -f ./docker/docker-compose.yml
PHP=php81-fpm

coverage:
	$(DOCKER) run --rm $(PHP) php -dxdebug.mode=coverage ./vendor/bin/phpunit --coverage-text

down:
	$(DOCKER) down --remove-orphans

fix:
	$(DOCKER) run --rm $(PHP) ./vendor/bin/php-cs-fixer fix

install:
	$(DOCKER) build
	$(DOCKER) run --rm $(PHP) composer install

mutation:
	$(DOCKER) run --rm $(PHP) ./vendor/bin/infection --min-msi=80

phpstan:
	$(DOCKER) run --rm $(PHP) ./vendor/bin/phpstan analyse

psalm:
	$(DOCKER) run --rm $(PHP) ./vendor/bin/psalm --show-info=true

standards:
	$(DOCKER) run --rm $(PHP) ./vendor/bin/php-cs-fixer fix --dry-run -v

test: standards unit phpstan psalm mutation

unit:
	$(DOCKER) run --rm $(PHP) ./vendor/bin/phpunit

up:
	$(DOCKER) up -d
