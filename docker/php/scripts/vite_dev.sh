#!/bin/bash

scripts_folder=/root/scripts/

while getopts 'd:' opt; do
    case "$opt" in
        d)
            arg="$OPTARG"
            if [ "$arg" == "true" ]; then
                bash "$scripts_folder"processes/run_dev_vite.sh
            fi
            ;;
        *)
          ;;
    esac
done
