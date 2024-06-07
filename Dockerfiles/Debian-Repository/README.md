# ####### mirror DEBIAN

#

#

deb http://ip.host-debian/debian/ stable main contrib non-free
deb http://ip.host-debian/debian/ Bookworm main contrib non-free
deb http://ip.host-debian/debian/ Bookworm-updates main contrib non-free

#

#

deb http://ip.host-debian/debian-security/ Bookworm-security main contrib non-free-firmware
deb http://ip.host-debian/debian-security/ stable-security main contrib non-free

#

#

# ####### mirror UBUNTU

#

deb http://ip.host-debian/ubuntu/ jammy main restricted
deb http://ip.host-debian/ubuntu/ jammy-updates main restricted
deb http://ip.host-debian/ubuntu/ jammy universe
deb http://ip.host-debian/ubuntu/ jammy-updates universe
deb http://ip.host-debian/ubuntu/ jammy multiverse
deb http://ip.host-debian/ubuntu/ jammy-updates multiverse
deb http://ip.host-debian/ubuntu/ jammy-backports main restricted universe multiverse

clean http://ip.host-debian/ubuntu/

#

deb http://ip.host-debian/ubuntu/ jammy-security main restricted
deb http://ip.host-debian/ubuntu/ jammy-security universe
deb http://ip.host-debian/ubuntu/ jammy-security multiverse

#

#

# ####### mirror ZABBIX

deb http://ip.host-debian/zabbix/ bookworm main contrib non-free

#

#
