#!/bin/bash

source /root/.bashrc

cd /var/www/html && php artisan inertia:start-ssr
