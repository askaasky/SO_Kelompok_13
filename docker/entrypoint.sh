#!/bin/bash
set -e

echo "──────────────────────────────────────"
echo "  Laravel Docker Entrypoint"
echo "──────────────────────────────────────"

# Hapus cache bootstrap lama agar env baru terbaca
rm -f /var/www/html/bootstrap/cache/*.php

# Pastikan .env ada
if [ ! -f /var/www/html/.env ]; then
    echo "[INFO] .env tidak ditemukan, menyalin dari .env.docker..."
    cp /var/www/html/.env.docker /var/www/html/.env
fi

# Generate APP_KEY jika kosong
APP_KEY_VALUE=$(grep -E "^APP_KEY=" /var/www/html/.env | cut -d '=' -f2-)
if [ -z "$APP_KEY_VALUE" ]; then
    echo "[INFO] Generating APP_KEY..."
    php artisan key:generate --force
fi

# Tunggu MySQL siap dengan cara yang lebih sederhana
echo "[INFO] Menunggu koneksi database (host: ${DB_HOST:-mysql}, port: ${DB_PORT:-3306})..."
MAX_TRIES=30
COUNT=0
until php -r "
    \$conn = @mysqli_connect(
        getenv('DB_HOST') ?: 'mysql',
        getenv('DB_USERNAME') ?: 'laravel',
        getenv('DB_PASSWORD') ?: 'secret',
        getenv('DB_DATABASE') ?: 'laravel',
        intval(getenv('DB_PORT') ?: 3306)
    );
    if (\$conn) { echo 'ok'; mysqli_close(\$conn); exit(0); }
    exit(1);
" 2>/dev/null; do
    COUNT=$((COUNT + 1))
    if [ "$COUNT" -ge "$MAX_TRIES" ]; then
        echo "[ERROR] Database tidak bisa dihubungi setelah ${MAX_TRIES} percobaan. Keluar."
        exit 1
    fi
    echo "[INFO] Menunggu database... percobaan ${COUNT}/${MAX_TRIES}"
    sleep 2
done

echo "[INFO] Database terhubung!"

# Jalankan migrasi
echo "[INFO] Menjalankan migrasi database..."
php artisan migrate --force

# Jalankan database seeder
echo "[INFO] Menjalankan database seeder..."
php artisan db:seed --force

# Cache konfigurasi untuk performa
echo "[INFO] Caching config, routes, views..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Set permissions
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

echo "──────────────────────────────────────"
echo "  Memulai PHP-FPM..."
echo "──────────────────────────────────────"

exec php-fpm
