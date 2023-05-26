# TVCompany-System-MVC
Project building:
1. composer update
2. cp .env.example .env
3. docker(-)compose up --build -d
4. Run migrations:
	1) docker(-)compose exec -it php-fpm bash
	2) cd migrations/
	3) php index.php
