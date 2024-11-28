# Usamos la imagen base php:8.1-apache
FROM php:8.1-apache

# Instalamos las extensiones necesarias para MySQL
RUN docker-php-ext-install pdo pdo_mysql

# Copiamos el contenido de tu directorio local ./html en /var/www/html del contenedor
COPY ./app /var/www/html

# Asignar permisos a los archivos HTML/PHP
RUN chown -R www-data:www-data /var/www/html
