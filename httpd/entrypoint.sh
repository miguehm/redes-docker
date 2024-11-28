#!/bin/bash
# Inicia el servidor SSH
service ssh start
# Inicia el servidor Apache en primer plano
apache2-foreground
