FROM php:8.2-apache
RUN docker-php-ext-install mysqli
COPY index.php /var/www/html/index.php
COPY search.php /var/www/html/search.php
RUN chmod 644 /var/www/html/index.php /var/www/html/search.php
