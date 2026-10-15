FROM php:8.2-apache

# Install MySQL drivers
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable mysqli

# Disable conflicting MPM modules
RUN a2dismod mpm_event mpm_worker || true && a2enmod mpm_prefork

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Configure Apache to listen on Railway's $PORT variable
RUN sed -i 's/80/${PORT}/g' /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf

# Copy project files into web root
COPY . /var/www/html/

# Set correct permissions
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
