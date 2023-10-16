ARG BUILD_BASE_IMAGE=zabbix/zabbix-web-apache-mysql:6.0-ubuntu-latest


FROM ${BUILD_BASE_IMAGE} as builder

LABEL Maintainer: "Aquiles Rodrigues - cyberfazer@gmail.com"

LABEL description="Zabbix Web "

USER root


WORKDIR /var/lib/zabbix
/var/lib/zabbix/
/var/lib/zabbix/ssh_keys
/var/lib/zabbix/ssl
/var/lib/zabbix/ssl/certs
/var/lib/zabbix/ssl/keys
/var/lib/zabbix/ssl/ssl_ca

/etc/zabbix
/etc/zabbix/zabbix_web_service.conf
/etc/zabbix/zabbix_server.conf

/usr/sbin/zabbix_web_service

/usr/bin/

chown --quiet -R zabbix:root /etc/zabbix/ /var/lib/zabbix/ && \
    chgrp -R 0 /etc/zabbix/ /var/lib/zabbix/ && \
    chmod -R g=u /etc/zabbix/ /var/lib/zabbix/ && \

     /etc/ssl/apache2/
     /etc/zabbix/web/certs
     