FROM php:7.3.4-apache-stretch
# image is using debian:stretch-slim
# https://github.com/docker-library/php/blob/a5c895da277a71578af9561b0e282e6cb0764434/7.3/stretch/apache/Dockerfile

# set default "working" directory
WORKDIR /var/www

# add server name to apache config, which is overwritten later with apache-config/000-default.conf
# just to surpress a docker-compose warning
RUN echo "ServerName laravel-docker-bootstrap.test" >> /etc/apache2/apache2.conf

MAINTAINER Mike Turner <turner.mike@gmail.com>

# disable interactive functions
ENV DEBIAN_FRONTEND noninteractive

# update package lists from their repositories
RUN apt-get update
RUN apt-get upgrade -y

# tools
RUN apt-get install -y --no-install-recommends apt-utils git zip unzip nano nodejs build-essential wget iputils-ping yum openssh-client

# create public dir (docker-compose gives an error if it does not previously exist)
RUN mkdir /var/www/public

# apache config - backup the original apache config in container and copy custom file
RUN cp /etc/apache2/sites-available/000-default.conf /etc/apache2/sites-enabled/000-default.conf.orig
COPY ./apache-config/000-default.conf /etc/apache2/sites-enabled/000-default.conf

# copy ssl certificate/key
COPY ./apache-config/server.crt /etc/apache2/ssl/server.crt
COPY ./apache-config/server.key /etc/apache2/ssl/server.key

# apache ssl config - backup the original apache ssl config in the container and copy custom file
RUN cp /etc/apache2/sites-available/default-ssl.conf /etc/apache2/sites-available/default-ssl.conf.orig
COPY ./apache-config/default-ssl.conf /etc/apache2/sites-available/default-ssl.conf

# enable ssl
RUN a2enmod ssl

# enable the custom ssl vhost
RUN a2ensite default-ssl

# restart apache
RUN service apache2 restart

# enable mod_rewrite
RUN a2enmod rewrite

# update package lists from their repositories
RUN apt-get update

# install php modules
RUN apt-get install -y libmcrypt-dev libpng-dev libzip-dev \
    mysql-client mysql-server libmagickwand-dev --no-install-recommends \
    && docker-php-ext-install mysqli pdo_mysql gd zip \
    && pecl install imagick

# copy php config
COPY ./php-config/php.ini /usr/local/etc/php


# download/install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# clean up
RUN apt-get autoremove && apt-get clean

# open ports
EXPOSE 80
EXPOSE 443

# set timezone
ENV TZ=America/Toronto
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

# restart apache
RUN service apache2 restart



COPY docker-entrypoint.sh /usr/local/bin/
RUN chmod 775 /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh
ENTRYPOINT ["docker-entrypoint.sh"]


## moved this to docker-entrypoint.sh ##
# CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]
