FROM debian:bookworm            

COPY ./Import/debian.sources /etc/apt/sources.list.d/
RUN apt-get update && apt-get upgrade -y 
RUN apt-get install apt-mirror -y && apt-get install apache2 -y
COPY ./Import/000-default.conf /etc/apache2/sites-enabled/
RUN service apache2 restart
RUN ln -s /var/spool/apt-mirror/mirror/
RUN ln -s /var/spool/apt-mirror/mirror/ftp.br.debian.org/debian/ /var/www/debian \
&&  ln -s /var/spool/apt-mirror/mirror/deb.debian.org/debian-security/ /var/www/debian-security \
&&  ln -s /var/spool/apt-mirror/mirror/mirror.uepg.br/ubuntu/ /var/www/ubuntu \
&&  ln -s /var/spool/apt-mirror/mirror/security.ubuntu.com/ubuntu/ /var/www/ubuntu-security
COPY ./Import/mirror.list /etc/apt/
RUN apt-mirror
EXPOSE 80
CMD ["/usr/sbin/apache2ctl", "D", "FOREGROUND"]
