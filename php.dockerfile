FROM php:8.2-fpm-alpine3.16

ADD ./php/www.conf /usr/local/etc/php-fpm.d/www.conf

RUN addgroup -g 1000 laravel && adduser -G laravel -g laravel -s /bin/sh -D laravel

RUN mkdir -p /var/www/html

RUN chown laravel:laravel /var/www/html

WORKDIR /var/www/html

#RUN docker-php-ext-install pdo pdo_mysql pdo_pgsql
#RUN docker-php-ext-install mysqli
# Install required PHP extensions
RUN apk add --no-cache postgresql-dev \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql mysqli \
    && apk add --no-cache postgresql-libs
# Clean up
RUN apk del postgresql-dev