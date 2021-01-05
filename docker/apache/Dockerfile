FROM ubuntu:latest

ENV DEBIAN_FRONTEND noninteractive

RUN apt-get update && \
    apt-get install software-properties-common -y && \
    add-apt-repository ppa:ondrej/php && \
    apt-get install -y php7.3 apache2 libapache2-mod-php7.3  \
    php7.3-mbstring php7.3-intl php7.3-mysql php7.3-curl php7.3-gd php7.3-dom php7.3-sqlite3 \
    git htop vim composer && \
    a2enmod rewrite headers ssl && \
    apt-get purge php7.4* -y && \
    echo "ServerName tgmm" >> /etc/apache2/apache2.conf

ENV DEBIAN_FRONTEND newt

ADD project.conf /etc/apache2/sites-enabled/000-default.conf

RUN mkdir /var/www/project

ADD start.sh /start.sh
RUN chmod +x /start.sh

COPY ../../. /var/www/project

CMD ["/start.sh"]