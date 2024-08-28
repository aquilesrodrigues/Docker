#
#--------------------------------------------------------------------------
# Image Setup
#--------------------------------------------------------------------------
#
FROM python:3.9.19-slim-bullseye
LABEL Aquiles Rodrigues <cyberfazer@gmail.com>

# Set Environment Variables
ENV DEBIAN_FRONTEND noninteractive

#
#--------------------------------------------------------------------------
# Software's Installation
#--------------------------------------------------------------------------
#
# Installing tools and PHP extentions using "apt", "docker-php", "pecl",
#

# Install "curl", "libmemcached-dev", "libpq-dev", "libjpeg-dev",
#         "libpng-dev", "libfreetype6-dev", "libssl-dev", "libmcrypt-dev",
RUN set -eux; \
    apt-get update; \
    apt-get upgrade -y; \
RUN apt-get install python3-venv python3-pip
RUN python -m pip install --upgrade pip


RUN python3 -m pip install -r requirements.txt

 
# CMD [ "php", "/var/www/html/index.php" ]

