FROM httpd:2.4
# https://hub.docker.com/r/_/httpd/

# backup original apache config file
RUN cp /usr/local/apache2/conf/httpd.conf /usr/local/apache2/conf/httpd.conf.orig

# copy custom apache config file
COPY ./httpd/httpd.conf /usr/local/apache2/conf/httpd.confls
