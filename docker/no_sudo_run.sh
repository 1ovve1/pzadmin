#!/bin/bash

WORKDIR=.

# init data files for mounting
DATA_FILES=()

for index in ${!DATA_FILES[*]}
do
    subject="${WORKDIR}/data/${DATA_FILES[$index]}"
    touch "$subject" && chmod 644 "$subject"
done

# init logs files for mounting
LOG_FILES=(fpm/logs/fpm-php.www.log nginx/logs/access.log nginx/logs/error.log)

for index in ${!LOG_FILES[*]}
do
  subject="${WORKDIR}/${LOG_FILES[$index]}"
  touch "$subject" && chmod 666 "$subject"
done

docker compose --env-file="$WORKDIR"/.env -f "$WORKDIR"/docker-compose.yml up --build
