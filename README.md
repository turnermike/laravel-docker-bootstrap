# Laravel Docker Boostrap
A custom boostrap based off of Laravel, Docker, Foundation and Webpack. Includes a basic
demo form that submits links to the database and displays them on the Landing page. Support
for locales has also been configured.

Using:

- Docker (Docker Compose 2)
- Laravel 5.5.25
- Foundation 6
- Webpack 4

# Requirements

- Node.js
- Docker

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

Generate a new app_key.
```
php artisan key:generate
```

Migrate database.
```
php artisan migrate
```

Seed database.
```
php artisan migrate:fresh --seed
```

## Webpack
The task running in use. Used for SASS/JS autoprefixing, source maps and minification.

### Development
Watches files for changes. Uses source maps and expanded code.
```
npm run start
```

### Dev Build
A single run build using source maps and expanded code.
```
npm run build:dev
```

### Production build
A single run build without source maps or comments and minifies.
```
npm run build:prod
```

# Resources
Links Tutorial: [https://laravel-news.com/your-first-laravel-application](https://laravel-news.com/your-first-laravel-application)

Quickstart Tutorial: [https://laravel.com/docs/5.1/quickstart](https://laravel.com/docs/5.1/quickstart)

Localization: [https://laravel.com/docs/5.5/localization](https://laravel.com/docs/5.5/localization)




# Quick Steps
1. docker-compose build
2. docker-compose up -d
3. composer install
4. cd app
5. cp .env.example .env
6. php artisan key:generate
7. populate db creds in .env (look in docker-compose.yml)
8. php artisan migrate:fresh --seed
