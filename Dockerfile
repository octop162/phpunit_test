FROM php:7.4-fpm

RUN apt update
RUN apt install -y git

COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /work