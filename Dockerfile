FROM php:8.2-apache

# 1. Install required MySQL extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable mysqli

# 2. Force-remove ALL existing MPM module links cleanly
RUN a2dismod -f mpm_event mpm_worker mpm_prefork || true \
    && rm -f /etc/apache2/mods-enabled/mpm_* \
    && a2enmod mpm_prefork

# 3. Enable URL rewrite module
RUN a2enmod rewrite

# 4. TEST Apache syntax inside the build (If this fails, Docker stops build immediately with details)
RUN apache2ctl configtest

# 5. Copy project files into web root
COPY . /var/www/html/

# 6. Set permissions
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
