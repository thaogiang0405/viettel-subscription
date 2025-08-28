FROM php:8.2-fpm

# Cài đặt các extension và dependencies
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

# Cài đặt Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Tạo thư mục làm việc
WORKDIR /var/www

# Copy chỉ file composer để cài dependencies trước
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-scripts --autoloader --optimize-autoloader

# Copy TOÀN BỘ source code vào
COPY . .

# Chạy các script post-install và optimize
RUN composer run post-install-cmd
RUN php artisan optimize:clear
RUN php artisan optimize

# Build frontend assets (nếu có)
RUN if [ -f "package.json" ]; then npm install && npm run build; fi

# Chỉ định thư mục public là root web và chạy server
EXPOSE 8000
CMD php -S 0.0.0.0:8000 -t public/