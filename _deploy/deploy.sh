#!/bin/bash

# Deploy - to be executed as normal user

cd /var/www/santodelgiorno || exit

php artisan down

sudo chown -R marco:www-data .
git pull
composer install --no-interaction --optimize-autoloader --no-dev
npm install
npm run build

php artisan optimize:clear

php artisan down

php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan filament:upgrade

sudo chown -R www-data:www-data .

php artisan up
