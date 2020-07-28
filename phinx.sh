#!/bin/sh

sleep 5

if [ $# -eq 0 ]; then
  vendor/bin/phinx migrate
  apache2-foreground
fi

exec "$@"