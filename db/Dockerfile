# Usamos la imagen base de MariaDB
FROM mariadb:latest

# Configuramos las variables de entorno necesarias para MariaDB
ENV MYSQL_ROOT_PASSWORD=rootpassword
ENV MYSQL_DATABASE=proyecto_docker
ENV MYSQL_USER=usuario
ENV MYSQL_PASSWORD=password

# Instalamos SSH
RUN apt-get update && \
    apt-get install -y openssh-server && \
    mkdir /var/run/sshd && \
    echo 'root:root' | chpasswd && \
    sed -i 's/#Port 22/Port 26/' /etc/ssh/sshd_config && \
    sed -i 's/#PermitRootLogin prohibit-password/PermitRootLogin yes/' /etc/ssh/sshd_config

# Exponemos los puertos necesarios
EXPOSE 26 3306

# Creamos el script de entrada
COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

# Usamos el script de entrada personalizado como comando principal
ENTRYPOINT ["/entrypoint.sh"]
