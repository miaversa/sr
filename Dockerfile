FROM php:7.2.7-apache
VOLUME /templates
COPY . /var/www/html/
