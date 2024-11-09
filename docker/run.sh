#!/bin/bash

source .env

DIRS=("${STORAGE_NGINX}" "${STORAGE_FPM}" "${STORAGE_SQLITE}")

for index in ${!DIRS[*]}
do
    mkdir -p "${DIRS[index]}"
done

# init logs files for mounting
LOG_FILES=("${STORAGE_FPM}/logs/fpm-php.www.log" "${STORAGE_NGINX}/logs/access.log" "${STORAGE_NGINX}/logs/error.log")

for index in ${!LOG_FILES[*]}
do
  subject="${LOG_FILES[$index]}"
  mkdir -p "$(dirname "${subject}")" && touch "$subject" && chmod 666 "$subject"
done

DOCKER_ARGS=''

while getopts 'b' opt; do
    case "$opt" in
        b)
            DOCKER_ARGS="${DOCKER_ARGS} --build"
            ;;
        ?)
            ;;
    esac
done

bash -c "docker compose --env-file=.env --env-file='${STORAGE_APP}/.env' -f ./docker-compose.yml up -d ${DOCKER_ARGS}"

