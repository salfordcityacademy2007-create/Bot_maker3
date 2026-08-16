#!/bin/sh
set -eu
PORT="${PORT:-8080}"
php -S "0.0.0.0:${PORT}" index.php > /tmp/php-server.log 2>&1 &
PID=$!
sleep 2
php register.php || true
wait "$PID"
