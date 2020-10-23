FROM php:7.4-cli-alpine

RUN apk update && apk add git zlib-dev

RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer

COPY . /var/www/symfony
WORKDIR /var/www/symfony