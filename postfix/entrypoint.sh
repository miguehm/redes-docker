#!/bin/bash

# Iniciar postfix en segundo plano
service postfix start

# Iniciar SSH en modo foreground
exec /usr/sbin/sshd -D
