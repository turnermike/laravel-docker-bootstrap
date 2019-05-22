#!/bin/sh

echo "Running docker-entrypoint.sh..."

# test command
# touch "/var/www/ENTRYPOINT-TEST.TXT"

# start apache
apachectl -D FOREGROUND

