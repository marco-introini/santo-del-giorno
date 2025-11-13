.DEFAULT_GOAL := check

check:
	composer audit
	./vendor/bin/phpstan analyse
	vendor/bin/rector --dry-run
	./vendor/bin/pint --test
	./vendor/bin/pest

recreate:
	rm -f storage/public/avatars/*
	php artisan migrate:fresh --seed

update: clear
	@echo "Current Laravel Version"
	php artisan --version
	@echo "\nUpdating..."
	composer update
	php artisan filament:upgrade
	@echo "UPDATED Laravel Version"
	php artisan --version
	php artisan boost:update
	npm update

clear_all: clear
	rm -f .idea/httpRequests/*
	rm -fr storage/app/backup/*

clear:
	@echo "Clearing..."
	php artisan config:clear
	php artisan route:clear
	php artisan view:clear
	php artisan filament:optimize-clear

