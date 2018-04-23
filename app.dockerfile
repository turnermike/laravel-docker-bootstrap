FROM php:7.1-apache

MAINTAINER Mike Turner <turner.mike@gmail.com>

# disable interactive functions
ENV DEBIAN_FRONTEND noninteractive

# update
RUN apt-get update

# tools
RUN apt-get install -y --no-install-recommends git zip unzip nano nodejs npm

# copy apache config
COPY ./httpd/000-default.conf /etc/apache2/sites-available/000-default.conf


# php modules
RUN apt-get install -y libmcrypt-dev libpng-dev \
    mysql-client libmagickwand-dev --no-install-recommends \
    && pecl install imagick \
    && docker-php-ext-enable imagick \
    && docker-php-ext-install mcrypt pdo_mysql gd

# clean up
RUN apt-get autoremove && apt-get clean


# download/install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# add a new user
# RUN useradd -ms /bin/bash docker

# switch to new user
# USER docker

# open ports
EXPOSE 80


ENTRYPOINT echo 'APACHE_LOG_DIR: ' $APACHE_LOG_DIR

CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]
