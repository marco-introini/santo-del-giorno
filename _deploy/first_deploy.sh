#!/bin/bash

# Must be run as root

# Cloned in /var/www/santodelgiorno

cp nginx.conf /etc/nginx/sites-available/santodelgiorno
ln -s /etc/nginx/sites-available/santodelgiorno /etc/nginx/sites-enabled/
service nginx reload

certbot --nginx

chown -R www-data:www-data /var/www/santodelgiorno/

echo "* * * * * marco cd /var/www/santodelgiorno && php artisan schedule:run >> /dev/null 2>&1" >> /etc/crontab

cd /var/www/santodelgiorno || exit
php artisan storage:link
