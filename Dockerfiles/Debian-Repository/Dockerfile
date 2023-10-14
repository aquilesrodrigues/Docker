FROM debian:Bookworm

COPY debian.sources /etc/apt/sources.list.d/
RUN apt-get update \
&&  apt-get upgrade -y \
&&  apt-get mirror -y \
&&  apt-get apache2 -y \