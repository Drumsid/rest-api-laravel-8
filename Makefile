start:
	php artisan serve

setup:
	composer install
	cp -n .env.example .env
	php artisan key:gen --ansi

test:
	php artisan test
