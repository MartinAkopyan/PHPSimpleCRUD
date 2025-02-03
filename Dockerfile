# Используем официальный образ PHP с Apache
FROM php:8.2-apache

# Копируем исходный код в контейнер
COPY .. /var/www/html/

# Устанавливаем права на запись для папки images (для загрузки изображений)
RUN mkdir -p /var/www/html/users/images && chmod -R 777 /var/www/html/users/images

# Открываем порт 80
EXPOSE 80