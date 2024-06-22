FROM php:8.3-fpm

RUN apt-get update &&  \
    apt-get upgrade -y && \
    apt-get install -y libbz2-dev zlib1g-dev libpng-dev libpq-dev libonig-dev libzip-dev libmagickwand-dev libmagickcore-dev curl screen
RUN docker-php-ext-install pdo mbstring exif pcntl bcmath gd zip bz2
RUN pecl install xdebug redis imagic
RUN docker-php-ext-enable xdebug redis

RUN touch /var/log/fpm-php.www.log && chmod 666 /var/log/fpm-php.www.log

RUN usermod -u 1000 www-data && groupmod -g 1000 www-data
