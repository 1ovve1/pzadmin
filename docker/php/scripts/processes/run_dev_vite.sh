#!/bin/bash

source /root/.bashrc

cd /var/www/html && npm run dev -- --host 0.0.0.0
