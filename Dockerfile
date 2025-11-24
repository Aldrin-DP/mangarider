FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    curl zip unzip git libzip-dev libonig-dev libpng-dev \
    && docker-php-ext-install pdo pdo_mysql zip

RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs build-essential

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

RUN composer install --no-dev --optimize-autoloader

RUN npm ci
RUN npm run build

EXPOSE 8080

CMD php artisan serve --host 0.0.0.0 --port 8080
