FROM php:8.2-cli

# Install required MySQL extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable mysqli

WORKDIR /app

# Copy application files
COPY . .

EXPOSE 80

# Serve directly from the src directory and bind dynamically to Railway's PORT
CMD ["sh", "-c", "php -S 0.0.0.0:${PORT:-80} -t src"]
