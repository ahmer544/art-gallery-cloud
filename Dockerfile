FROM php:8.2-cli

# Install MySQL drivers
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable mysqli

WORKDIR /app

# Copy project files
COPY . .

EXPOSE 80

# Serve from the src directory on port 80
CMD ["sh", "-c", "php -S 0.0.0.0:${PORT:-80} -t src"]
