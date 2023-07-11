FROM php:8.1

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

WORKDIR /app

RUN apt update && \
    apt install -y git libpq-dev libzip-dev zip && \
    docker-php-ext-install zip && \
    docker-php-ext-install pdo pdo_mysql