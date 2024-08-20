# Используем официальный образ PHP как базовый
FROM php:8.2-fpm

# Устанавливаем системные зависимости и PHP расширения
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    unzip \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd zip pdo pdo_mysql

# Устанавливаем Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Копируем исходный код приложения в контейнер
WORKDIR /var/www/html
COPY . .

# Устанавливаем зависимости приложения
RUN composer install --no-dev --optimize-autoloader

# Права на директории для Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Настраиваем рабочий каталог и команду по умолчанию
USER www-data
CMD ["php-fpm"]
