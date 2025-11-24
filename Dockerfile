# Base PHP image
FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    curl zip unzip git libzip-dev libonig-dev libpng-dev \
    build-essential python3 g++ make

# Install Node.js (v18)
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Install Node dependencies and build frontend
RUN npm ci
RUN npm run build

# Expose port
EXPOSE 8080

# Run Laravel
CMD php artisan serve --host 0.0.0.0 --port 8080
