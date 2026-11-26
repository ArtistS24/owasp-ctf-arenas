FROM php:8.2-apache
RUN apt-get update && apt-get install -y iputils-ping net-tools && rm -rf /var/lib/apt/lists/*
COPY html/ /var/www/html/
RUN mkdir -p /var/www/html/uploads \
 && chown -R www-data:www-data /var/www/html \
 && chmod -R 755 /var/www/html \
 && chmod 777 /var/www/html/uploads
EXPOSE 80
