FROM php:8.3
COPY --from=composer /usr/bin/composer /usr/bin/composer
RUN apt-get update && apt-get -y install libzip-dev libicu-dev
RUN docker-php-ext-install mysqli zip intl
RUN pecl install xdebug-3.3.2
RUN docker-php-ext-enable xdebug

WORKDIR /app

COPY .. /app

CMD ["php", "-S", "0.0.0.0:80", "-t", "/app"]

