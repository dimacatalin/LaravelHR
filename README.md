# Containerized web application

## Description
Laravel Containerized HR web application.

## Getting started 

create.env file from .env.example

```
docker-compose up -d --build
docker-compose exec php bash
composer install
php artisan migrate:fresh --seed
```

## Used technologies

- [x] Laravel
- [x] PHP
- [x] Docker
- [x] PostgreSQL
- [x] Blade
- [x] Bootstrap
- [x] HTML
- [x] CSS
- [x] Javascript
