FROM php:8.0-apache
WORKDIR /var/www/html
COPY . .
RUN docker-php-ext-install pdo pdo_mysql
RUN apt-get update
RUN apt-get install zip unzip 
COPY --from=composer:2.1.8 /usr/bin/composer /usr/local/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER=1 
RUN  composer require guzzlehttp/guzzle