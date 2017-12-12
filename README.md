# Laravel Docker Boostrap
A custom boostrap based off of Laravel, Docker and Webpack.

Using:

- Docker
- Laravel
- Webpack


# Project Setup

## Docker
Start Docker in detached mode for a local development.
```
docker-compose up -d
```
If containers have not yet been built. Build and start in detached mode.
```
docker-compose up -d --build
```

## Larvel
We're using the [Laravel](https://laravel.com/docs/5.5) PHP framework.
Installation guide: [https://laravel.com/docs/5.1/installation](https://laravel.com/docs/5.1/installation)

Run composer to install PHP dependencies.
```
cd app
composer install
```

Migrate database.
```
php artisan migrate
```


# Resources
Links Tutorial: [https://laravel-news.com/your-first-laravel-application](https://laravel-news.com/your-first-laravel-application)
Quickstart Tutorial: [https://laravel.com/docs/5.1/quickstart](https://laravel.com/docs/5.1/quickstart)
Localization: [https://laravel.com/docs/5.5/localization](https://laravel.com/docs/5.5/localization)





