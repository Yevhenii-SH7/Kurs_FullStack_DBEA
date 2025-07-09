FROM php:8.2-apache

# Установка расширений
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable pdo_mysql

# Включим mod_rewrite (если потребуется)
RUN a2enmod rewrite

# Настроим права доступа (если потребуется)
RUN chown -R www-data:www-data /var/www/html