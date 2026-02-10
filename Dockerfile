FROM php:8.2-apache

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    netcat \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Instalar Composer
COPY --from=composer:2.5 /usr/bin/composer /usr/bin/composer

# Configurar Apache para servir /public
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN a2enmod rewrite

WORKDIR /var/www/html

# Copiar archivos de la app
COPY . .

# Instalar dependencias de PHP
RUN composer install

# Instalar Node y construir assets de Vite/Tailwind
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && npm install \
    && npm run build

# Copiar script para esperar MySQL
COPY wait-for-db.sh /usr/local/bin/wait-for-db.sh
RUN chmod +x /usr/local/bin/wait-for-db.sh

EXPOSE 80

# Espera a MySQL antes de iniciar Apache
CMD ["wait-for-db.sh", "apache2-foreground"]
