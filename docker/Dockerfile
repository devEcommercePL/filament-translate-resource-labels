FROM php:8.4-cli

RUN apt-get update && \
	apt-get install -y libzip-dev --no-install-recommends && \
	apt-get install -y zip && \
	apt-get install -y libicu-dev libpng-dev libxml2-dev && \
	docker-php-ext-install bcmath && \
	docker-php-ext-install intl && \
	docker-php-ext-install zip && \
	docker-php-ext-install gd && \
	docker-php-ext-install simplexml && \
	docker-php-ext-install pcntl && \
    docker-php-ext-configure intl && \
	apt-get update && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

WORKDIR /var/www/html
