#!/bin/bash

scripts_folder=/root/scripts/

while getopts 'x:' opt; do
    case "$opt" in
        x)
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
