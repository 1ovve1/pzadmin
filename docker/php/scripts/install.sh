#!/bin/bash

# NVM, NPM, COMPOSER INSTALLATION AND BUILD

scripts_folder=/root/scripts/

while getopts 'd:' opt; do
    case "$opt" in
        d)
            arg="$OPTARG"
            if [ "$arg" == "true" ]; then
                bash "$scripts_folder"installers/xdebug.sh
            fi
            ;;
        *)
          ;;
    esac
done

bash "$scripts_folder"installers/composer.sh
bash "$scripts_folder"installers/nvm.sh
