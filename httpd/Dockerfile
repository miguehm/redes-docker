# Usamos la imagen base php:8.1-apache
FROM php:8.1-apache

# Instalamos las extensiones necesarias para MySQL
RUN docker-php-ext-install pdo pdo_mysql

# Copiamos el contenido de tu directorio local ./app en /var/www/html del contenedor
COPY ./app /var/www/html

# Asignamos permisos a los archivos HTML/PHP
RUN chown -R www-data:www-data /var/www/html

# Instalamos y configuramos el servidor SSH
RUN apt-get update && \
    apt-get install -y openssh-server && \
    mkdir /var/run/sshd && \
    echo 'root:root' | chpasswd && \
    sed -i 's/#Port 22/Port 24/' /etc/ssh/sshd_config && \
    sed -i 's/#PermitRootLogin prohibit-password/PermitRootLogin yes/' /etc/ssh/sshd_config

# Exponemos el puerto 24 para SSH
EXPOSE 24

# Copiamos el script de entrada y le damos permisos de ejecución
COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

# Configuramos el script de entrada como el comando principal
CMD ["/entrypoint.sh"]
