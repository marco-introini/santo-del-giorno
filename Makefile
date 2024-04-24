check:
	composer rector-preview
	phpstan

recreate:
	rm -f storage/public/avatars/*
	php artisan migrate:fresh --seed
