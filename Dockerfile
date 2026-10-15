FROM php:8.2-cli

# Install required MySQL extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable mysqli

WORKDIR /app

# Copy all repository files
COPY . .

EXPOSE 80

# Start PHP built-in server on Port 80
CMD php -S 0.0.0.0:80
