# Usamos la imagen base php:8.1-apache
FROM php:8.1-apache

# Instalamos las extensiones necesarias para MySQL
RUN docker-php-ext-install pdo pdo_mysql

# Copiamos el contenido de tu directorio local ./html en /var/www/html del contenedor
COPY ./app /var/www/html

# Asignar permisos a los archivos HTML/PHP
RUN chown -R www-data:www-data /var/www/html

# ssh

RUN apt-get update \
    && apt-get install -y openssh-server

RUN mkdir /run/sshd
RUN echo 'root:root' | chpasswd

RUN sed -i 's/#Port 22/Port 24/' /etc/ssh/sshd_config

RUN sed -i 's/#PermitRootLogin prohibit-password/PermitRootLogin yes/' /etc/ssh/sshd_config

RUN service ssh start

EXPOSE 24

COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

# Configurar el script de entrada como el comando principal
CMD ["/entrypoint.sh"]
