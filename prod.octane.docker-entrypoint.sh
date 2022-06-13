#!/bin/bash

php artisan migrate --force
php artisan db:seed --force
php artisan config:cache
php artisan optimize
composer dump:autoload

php artisan octane:start --host=0.0.0.0 --port=9000 --workers=4 --task-workers=6

