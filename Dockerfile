FROM php:5.4-apache

# Corrige sources.list para usar archive.debian.org
RUN sed -i 's|httpredir.debian.org|archive.debian.org|g' /etc/apt/sources.list \
    && sed -i '/security.debian.org/d' /etc/apt/sources.list \
    && sed -i '/jessie-updates/d' /etc/apt/sources.list \
    && echo 'Acquire::Check-Valid-Until "false";' > /etc/apt/apt.conf.d/99no-check-valid-until

# Instala dependências necessárias para Yii 1.1.15 e extensões comuns
RUN apt-get update && apt-get install -y --allow-unauthenticated \
    libmcrypt-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    autoconf \
    pkg-config \
    && rm -rf /var/lib/apt/lists/*

# Ativa extensões do PHP
RUN docker-php-ext-install mcrypt gd

# Habilita mod_rewrite para Yii
RUN a2enmod rewrite

# Ajusta diretório de trabalho
WORKDIR /var/www/html

# Copia código da aplicação
COPY . /var/www/html

# Ajusta permissões
RUN chown -R www-data:www-data /var/www/html
