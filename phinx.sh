#!/bin/sh

sleep 10

if [ $# -eq 0 ]; then
  vendor/bin/phinx migrate
  apache2-foreground
fi

exec "$@"