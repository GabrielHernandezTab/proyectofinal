#!/bin/sh
echo "Esperando a que MySQL esté listo..."

while ! nc -z db 3306; do
  sleep 1
done

echo "MySQL listo, iniciando Laravel..."
exec "$@"
