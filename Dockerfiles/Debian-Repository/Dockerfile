FROM debian:bookworm            

LABEL version="1.0"
LABEL description="Debian Mirror"

# COPY --chown=myuser:mygroup --chmod=644 files* /somedir/
COPY ./Import/debian.sources /etc/apt/sources.list.d/
RUN apt-get update && apt-get upgrade -y 
RUN apt-get install apt-mirror -y && apt-get install apache2 -y
COPY ./Import/000-default.conf /etc/apache2/sites-enabled/
RUN /etc/init.d/apache2 restart
RUN ln -s /var/spool/apt-mirror/mirror/
RUN ln -s /var/spool/apt-mirror/mirror/ftp.br.debian.org/debian/ /var/www/debian \
&&  ln -s /var/spool/apt-mirror/mirror/deb.debian.org/debian-security/ /var/www/debian-security \
&&  ln -s /var/spool/apt-mirror/mirror/mirror.uepg.br/ubuntu/ /var/www/ubuntu \
&&  ln -s /var/spool/apt-mirror/mirror/security.ubuntu.com/ubuntu/ /var/www/ubuntu-security \
&&  ln -s /var/spool/apt-mirror/mirror/repo.zabbix.com/zabbix/6.5/debian /var/www/zabbix
COPY ./Import/mirror.list /etc/apt/
RUN apt-mirror
EXPOSE 80
CMD ["/usr/sbin/apache2ctl", "D", "FOREGROUND"]

