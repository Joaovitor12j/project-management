# Imagem de desenvolvimento: o código é montado em /app pelo docker-compose.dev.yml
FROM php:8.1-cli-bookworm

ARG UID=1000
ARG GID=1000

RUN apt-get update && apt-get install -y --no-install-recommends \
        git unzip curl nodejs npm default-mysql-client \
        libzip-dev libpng-dev libjpeg62-turbo-dev libfreetype6-dev libicu-dev libxml2-dev libonig-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j"$(nproc)" pdo_mysql mysqli gd zip intl exif bcmath pcntl opcache \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

RUN groupadd -o -g ${GID} app && useradd -o -m -u ${UID} -g ${GID} -s /bin/bash app

WORKDIR /app
USER app

EXPOSE 8000
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
