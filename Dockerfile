# Gunakan image PHP resmi dengan Composer
FROM php:8.2-cli

# Install ekstensi yang dibutuhkan Laravel (pdo, sqlite, dsb)
RUN apt-get update && apt-get install -y \
    unzip \
    libsqlite3-dev \
    && docker-php-ext-install pdo pdo_sqlite

# Copy semua file proyek ke container
WORKDIR /app
COPY . .

# Install dependencies Laravel
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && composer install --no-dev --optimize-autoloader

# Generate app key (kalau belum ada)
RUN php artisan key:generate || true

# Jalankan Laravel di port 10000
EXPOSE 10000
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=10000"]
