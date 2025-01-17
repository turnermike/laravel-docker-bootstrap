# Laravel Docker Bootstrap
A custom Laravel application developed by Mike Turner. Functionality includes:

- multiple locales (en-CA, fr-CA, en-QC, fr-QC)
- Google 2 factor authentication via Google Authenticator
- SSL support via Docker (need to accept certificate warning when browsing https://)


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
Localization
[https://github.com/mcamara/laravel-localization](https://github.com/mcamara/laravel-localization)

2 Factor Authentication via Google Authenticator
[https://github.com/antonioribeiro/google2fa](https://github.com/antonioribeiro/google2fa)

Laravel Scout and TNTSearch
[https://github.com/teamtnt/laravel-scout-tntsearch-driver](https://github.com/teamtnt/laravel-scout-tntsearch-driver)


## Requirements

- Node.js
- NPM
- Docker
- Composer




# Project Setup

## Docker
The docker-compose files are set to pull environment variables from a specific .env file.
docker-compose.yml = app/.env
docker-compose.staging.yml = app/.env.staging

### Local/Development Startup
Start and build:
```
docker-compose up -d --build
```

Start:
```
docker-compose up -d
```

### Staging Start up
Start and build:
```
docker-compose -f docker-compose.yml -f docker-compose.staging.yml up -d --build
```


### Docker Notes/Details

The app image (php:7.1-apache) is using debian:jessie for OS.
PHP config (php.ini) location: `/usr/local/etc/php/php.ini` A local copy (./php/php.ini) is copied to the container durring build.
APACHE_LOG_DIR: `/var/log/apache2`



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


## Installing New NPM Packages
When adding a new NPM package, we can install them as development dependency or regular project dependency.

If the package is requried for anything development related, most likely Webpack use:
```
npm install --require-dev <package_name>
```

If the package is required for the app it's self, please use:
```
npm install --require <package_name>
```


# 2 Factor Authentication
Using `pragmarx/google2fa-laravel` and `bacon/bacon-qr-code` packages via composer. User will need to install Google Authenticator on
thier mobile device.

## /re-authenticate
If a user feels that someone has access to their secret. They may reset it if they have been previously authenticated. The controller
is behind auth middleware.

## Manual Reset
If a user lost their phone and has no access to their dashboard, we may manually reset their secret with the following command. This will
require the user's email address and then provide them with a code they may manually enter into Google Authenticator.

```
php artisan 2fa:reauthenticate
```

For example, here are the results of running that command:
```
 what is the user's email?:
 > turner.mike@gmail.com

A new secret will be generated for turner.mike@gmail.com
This action will invalidate the previous secret key.

 Do you wish to continue? (yes/no) [no]:
 > yes

A new secret has been generated for turner.mike@gmail.com
The new secret is: QLNEWONFWIZVGGT6
```



# Search
Use the following command to update the search index:
```php artisan tntsearch:import App\\User```



# Upgrading Laravel Version For This Project
These were the steps taken to update Laravel from 5.6 to 5.8:

1. Backed up the original composer.json.
2. Copied the coposer.json file from the Laravel Git repo.
3. Removed composer.lock.
4. Ran `composer install`.
5. Ran `composer require <package/name>` for each required package listed in old composer.json.






# Resources

- Laravel Localization: [https://github.com/mcamara/laravel-localization](https://github.com/mcamara/laravel-localization)
- Quickstart Tutorial: [https://laravel.com/docs/5.1/quickstart](https://laravel.com/docs/5.1/quickstart)
- Localization: [https://laravel.com/docs/5.5/localization](https://laravel.com/docs/5.5/localization)


2FA Tutorial (branch 2fa-2):
https://scotch.io/tutorials/how-to-add-googles-two-factor-authentication-to-laravel




# To Do
- add ajax uplaod with progress bar





------------------------------------------

# New Project Setup - Quick Steps
1. docker-compose build
2. docker-compose up -d
3. composer install
4. cd deploy/app
5. cp .env.example .env
6. php artisan key:generate
7. populate db creds in .env (look in docker-compose.yml)
8. php artisan migrate
9. cd deploy/build
10. npm install

