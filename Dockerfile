# Usar la imagen base de PHP 8.3
FROM php:8.3-fpm-alpine

# Instalar dependencias y extensiones necesarias para MySQL
RUN apk add --no-cache \
    mariadb-client \
    bash \
    git \
    unzip \
    curl \
    libpng-dev \
    && docker-php-ext-install pdo pdo_mysql mysqli

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Establecer el directorio de trabajo
WORKDIR /var/www/html

# Copiar los archivos del proyecto
COPY . .

# Instalar dependencias de Composer
RUN composer install --no-dev --optimize-autoloader

# Generar la clave de la aplicación
RUN php artisan key:generate

# Ejecutar migraciones
#RUN php artisan migrate
