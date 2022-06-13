FROM php:cli-alpine

COPY ./project/ /var/www/html/

COPY ./prod.octane.docker-entrypoint.sh /entrypoint.sh

WORKDIR /var/www/html

RUN apk add --no-cache \
    php8-pear php8-dev gcc musl-dev make git bash nano libzip-dev \
    pcre-dev $PHPIZE_DEPS \
    && pecl install swoole \
    && docker-php-ext-enable swoole \
    && rm -rf /tmp/*

RUN docker-php-ext-install pdo pdo_mysql zip bcmath pcntl sockets \
    && docker-php-ext-enable pdo pdo_mysql zip bcmath pcntl sockets

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer \
    && alias composer='php composer.phar' \
    && composer update --no-scripts --ignore-platform-reqs

RUN chmod -R 777 storage bootstrap/cache

RUN php artisan key:generate

RUN php artisan octane:install --server=swoole

EXPOSE 9000
