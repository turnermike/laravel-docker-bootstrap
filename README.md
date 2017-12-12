# AtoMc Hockey Website 2018
A custom web application developed by Cossette for McDonalds.

Using:

- Docker
- Laravel


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

Create tasks table
```
php artisan make:migration create_tasks_table --create=tasks
```

# Resources

Tutorial: [https://laravel.com/docs/5.1/quickstart](https://laravel.com/docs/5.1/quickstart)






