FROM php:8.2-apache
RUN a2dismod mpm_event mpm_worker || true && a2enmod mpm_prefork
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable mysqli
RUN a2enmod rewrite
COPY ./src /var/www/html/
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
