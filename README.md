# Laravel Docker Bootstrap
A custom Laravel application developed by Mike Turner. Includes multiple locales and out-of-the-box user authentication.

Locales includes:
- en-CA
- fr-CA
- en-QC
- fr-QC

Using:

- Docker (Docker Compose 2)
- Laravel 5.6.4
- Foundation 6
- Webpack 4

# Requirements

- Node.js
- NPM
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

### Packages Used
Localization: larvel-localization
[https://github.com/mcamara/laravel-localization](https://github.com/mcamara/laravel-localization)

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

Laravel Localization: [https://github.com/mcamara/laravel-localization](https://github.com/mcamara/laravel-localization)
Quickstart Tutorial: [https://laravel.com/docs/5.1/quickstart](https://laravel.com/docs/5.1/quickstart)
Localization: [https://laravel.com/docs/5.5/localization](https://laravel.com/docs/5.5/localization)

------------------------------------------

# New Project Setup - Quick Steps
1. docker-compose build
2. docker-compose up -d
3. composer install
4. cd deploy/app
5. cp .env.example .env
6. php artisan key:generate
7. populate db creds in .env (look in docker-compose.yml)
8. php artisan migrate:fresh --seed
9. cd deploy/build
10. npm install

