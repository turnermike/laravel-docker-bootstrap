FROM php:7.1.14-fpm

# disable interactive functions
ENV DEBIAN_FRONTEND noninteractive

# php modules
RUN apt-get update && apt-get install -y libmcrypt-dev libpng-dev \
    mysql-client libmagickwand-dev --no-install-recommends \
    && pecl install imagick \
    && docker-php-ext-enable imagick \
    && docker-php-ext-install mcrypt pdo_mysql gd

# other tools
RUN apt-get install -y unzip

# composer
# RUN cd /tmp && curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer
# RUN cd /var/www && composer install


RUN adduser docker
USER docker
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install