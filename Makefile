.PHONY : main build-image build-container start test shell stop clean
main: build-image build-container

build-image:
	docker build -t docker-php-kataexamen .

build-container:
	docker run -dt --name docker-php-kataexamen -v .:/540/kataexamen docker-php-kataexamen
	docker exec docker-php-kataexamen composer install

start:
	docker start docker-php-kataexamen

test: start
	docker exec docker-php-kataexamen ./vendor/bin/phpunit tests/$(target)

shell: start
	docker exec -it docker-php-kataexamen /bin/bash

stop:
	docker stop docker-php-kataexamen

clean: stop
	docker rm docker-php-kataexamen
	rm -rf vendor
