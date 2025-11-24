FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    curl zip unzip git \
    libpq-dev libzip-dev libonig-dev \
    && docker-php-ext-install pdo pdo_mysql zip

RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

RUN composer install --no-dev --optimize-autoloader

RUN npm install && npm run build

EXPOSE 8080

CMD php artisan serve --host 0.0.0.0 --port 8080
