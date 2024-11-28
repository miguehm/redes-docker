FROM ubuntu:latest

RUN apt-get update \
    && apt-get install -y openssh-server
    
RUN mkdir /var/run/sshd

# Permitir conexiones SSH (opcionalmente eliminamos las restricciones de autenticación con key)
RUN echo 'PermitRootLogin yes' >> /etc/ssh/sshd_config
RUN echo 'root:root' | chpasswd  # Asignamos contraseña al usuario root (root:root)

# Exponer el puerto del SSH (22)
EXPOSE 29

# Comando para iniciar el servicio de SSH
CMD ["/usr/sbin/sshd", "-D"]
CMD ["/usr/sbin/sshd", "-D"]
