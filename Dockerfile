FROM php:8.2-apache

# 1. Install required MySQL extensions for PHP
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable mysqli

# 2. Completely remove lingering MPM module symlinks to fix AH00534
RUN rm -f /etc/apache2/mods-enabled/mpm_*.load /etc/apache2/mods-enabled/mpm_*.conf \
    && a2enmod mpm_prefork

# 3. Enable URL rewrite module
RUN a2enmod rewrite

# 4. Copy project files into Apache web root
COPY . /var/www/html/

# 5. Set ownership permissions for Apache user
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
