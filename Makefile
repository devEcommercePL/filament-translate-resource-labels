APPLICATION_NAME ?= filament-translate-resource-labels

build:
	docker build -f ./docker/Dockerfile --tag ${APPLICATION_NAME} .

run:
	docker run --rm -t -v $(shell pwd):/var/www/html -u "$(shell id -u):$(shell id -g)" ${APPLICATION_NAME} $(CMD)