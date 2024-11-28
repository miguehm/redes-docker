#!/bin/bash
# Iniciar SSH
service ssh start

# Iniciar MariaDB
exec docker-entrypoint.sh mariadbd
