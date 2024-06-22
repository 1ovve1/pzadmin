FROM php:8.3-cli

RUN mkdir /root/scripts
COPY ./scripts /root/scripts
RUN bash /root/scripts/install.sh -d "${APP_XDEBUG}"
