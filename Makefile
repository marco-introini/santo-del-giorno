check:
	composer rector-preview
	vendor/bin/phpstan

recreate:
	rm -f storage/public/avatars/*
	php artisan migrate:fresh --seed
