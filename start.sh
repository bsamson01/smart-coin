#!/bin/bash

#create apache user if specified
if [ ! -z "$APACHE_UID" ]
then
    adduser --disabled-password --gecos "" -u $APACHE_UID apache2
    sed -i 's/www-data/apache2/g' /etc/apache2/envvars
fi

#start service
/usr/sbin/apache2ctl -D FOREGROUND
