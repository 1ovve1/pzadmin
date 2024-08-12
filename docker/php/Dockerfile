FROM php:8.3-cli

RUN docker-php-ext-install pcntl
RUN docker-php-ext-configure pcntl --enable-pcntl

RUN mkdir /root/scripts
COPY ./scripts /root/scripts
RUN bash /root/scripts/install.sh -d "${APP_XDEBUG}"
