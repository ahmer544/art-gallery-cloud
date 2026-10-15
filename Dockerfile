FROM php:8.2-apache

# Install required MySQL extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable mysqli

# Fix Apache MPM module conflict
RUN a2dismod mpm_event mpm_worker || true && a2enmod mpm_prefork

# Enable rewrite module
RUN a2enmod rewrite

# Copy project files into web root
COPY . /var/www/html/

# Set permissions
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
