# Sử dụng image base có sẵn PHP và Apache (giải quyết LUÔN vấn đề static files)
FROM php:8.2-apache

# Cài đặt các extensions cần thiết cho Laravel
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd

# Bật mod_rewrite của Apache để xử lý routing Laravel
RUN a2enmod rewrite

# Cài đặt Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Thiết lập thư mục làm việc
WORKDIR /var/www/html

# Copy file composer trước để tận dụng cache Docker layer
COPY composer.json composer.lock ./

# Cài đặt dependencies - CHẠY THỬ LỆNH NÀY TRƯỚC
RUN composer install --no-dev --no-autoloader --no-scripts --no-interaction

# Copy toàn bộ source code vào
COPY . .

# Chạy dump-autoload và optimize
RUN composer dump-autoload --optimize
RUN php artisan optimize:clear

# Build frontend assets (nếu có), bỏ qua nếu lỗi
RUN if [ -f "package.json" ]; then npm ci --no-audit --no-fund && npm run build; fi

# Fix permission cho Laravel storage và cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Apache đã tự động phục vụ từ /var/www/html (chính là thư mục public)
# Không cần CMD vì image base đã có sẵn