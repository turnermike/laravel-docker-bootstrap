#! /bin/bash
set -e

if [ "$1" = 'composer' ]; then
    touch '/testing123.abc'
fi

exec "$@"
