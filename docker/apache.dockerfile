FROM php:7.4-apache-bullseye
# add dependencies
RUN docker-php-ext-install mysqli pdo pdo_mysql \
    && docker-php-ext-enable pdo_mysql mysqli