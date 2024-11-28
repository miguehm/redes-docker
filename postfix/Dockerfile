FROM ubuntu:latest

ARG EMAIL
ARG EMAIL_PASSWORD
ARG MAIL_NAME
ARG SMTP_DOMAIN
ARG SMTP_PORT

RUN apt-get update && \
    apt-get install -y mailutils && \
    apt install -y postfix && \
    apt install -y openssh-server

COPY main.cf /etc/postfix/main.cf

# ssh

RUN mkdir /run/sshd
RUN echo 'root:root' | chpasswd

RUN sed -i 's/#Port 22/Port 23/' /etc/ssh/sshd_config

RUN sed -i 's/#PermitRootLogin prohibit-password/PermitRootLogin yes/' /etc/ssh/sshd_config

RUN service ssh start

EXPOSE 23

RUN sh -c 'echo "root: ${EMAIL}" >> /etc/aliases' && \
    sh -c 'echo "${MAIL_NAME}" >> /etc/mailname' && \
    sh -c 'echo "[${SMTP_DOMAIN}]:${SMTP_PORT} ${EMAIL}:${EMAIL_PASSWORD}" >> /etc/postfix/sasl_passwd' && \
    postmap /etc/postfix/sasl_passwd && \
    chmod 0600 /etc/postfix/sasl_passwd /etc/postfix/sasl_passwd.db

COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

# Configurar el script de entrada como el comando principal
CMD ["/entrypoint.sh"]
