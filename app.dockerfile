FROM php:7.1-apache

MAINTAINER Mike Turner <turner.mike@gmail.com>

# disable interactive functions
ENV DEBIAN_FRONTEND noninteractive

# update package lists from their repositories
RUN apt-get update

# tools
RUN apt-get install -y --no-install-recommends git zip unzip nano nodejs npm



# copy ssl certificate/key
COPY ./httpd/server.crt /etc/apache2/ssl/server.crt
COPY ./httpd/server.key /etc/apache2/ssl/server.key

# apache config - backup the original apache config in container and copy custom file
RUN cp /etc/apache2/sites-available/000-default.conf /etc/apache2/sites-available/000-default.conf.orig
COPY ./httpd/000-default.conf /etc/apache2/sites-available/000-default.conf

# apache ssl config - backup the original apache ssl config in the container and copy custom file
RUN cp /etc/apache2/sites-available/default-ssl.conf /etc/apache2/sites-available/default-ssl.conf.orig
COPY ./httpd/default-ssl.conf /etc/apache2/sites-available/default-ssl.conf

# enable ssl
RUN a2enmod ssl

# enable mod_rewrite
RUN a2enmod rewrite



# restart apache
RUN service apache2 restart

# install php modules
RUN apt-get install -y libmcrypt-dev libpng-dev \
    mysql-client libmagickwand-dev --no-install-recommends \
    && pecl install imagick \
    && docker-php-ext-enable imagick \
    && docker-php-ext-install mcrypt mysqli pdo pdo_mysql mbstring gd

# copy php config
COPY ./php/php.ini /usr/local/etc/php

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


# ENTRYPOINT echo 'APACHE_LOG_DIR: ' $APACHE_LOG_DIR

CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]
