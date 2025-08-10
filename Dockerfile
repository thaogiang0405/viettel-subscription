FROM php:8.2-fpm

# Cài composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Cài các extension Laravel cần
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Copy toàn bộ project vào container
WORKDIR /var/www
COPY . .

# Cài dependencies Laravel
RUN composer install --no-dev --optimize-autoloader

# Build frontend nếu có Vite
RUN npm install && npm run build || true

# Mở port và chạy server
EXPOSE 8000
CMD php artisan serve --host 0.0.0.0 --port 8000
