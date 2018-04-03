# Laravel Docker Bootstrap
A custom Laravel application developed by Mike Turner. Includes multiple locales and out-of-the-box user authentication.

Locales includes:

- en-CA
- fr-CA
- en-QC
- fr-QC

## Using:

- [Docker](https://docs.docker.com/)
- [Docker Compose 2](https://docs.docker.com/compose/)
- [Laravel 5.6.4](https://laravel.com/docs/5.6)
- [Foundation 6](https://foundation.zurb.com/sites/docs/)
- [Webpack 4](https://webpack.js.org/concepts/)


### Laravel Packages Used
Localization: larvel-localization
[https://github.com/mcamara/laravel-localization](https://github.com/mcamara/laravel-localization)


## Requirements

- Node.js
- NPM
- Docker
- Composer

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

## Laravel

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
The task runner in use. Used for SASS/JS autoprefixing, source maps, image optimization and code minification.

### Development Watch
Watches files for changes. Uses source maps and expanded code.
```
npm run start
```

### Development/Staging Build
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

- Laravel Localization: [https://github.com/mcamara/laravel-localization](https://github.com/mcamara/laravel-localization)
- Quickstart Tutorial: [https://laravel.com/docs/5.1/quickstart](https://laravel.com/docs/5.1/quickstart)
- Localization: [https://laravel.com/docs/5.5/localization](https://laravel.com/docs/5.5/localization)


Last 2FA Tutorial:
https://www.sitepoint.com/2fa-in-laravel-with-google-authenticator-get-secure/





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

