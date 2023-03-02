FROM php:8.0-apache
RUN apt-get update && apt-get install -y \
libonig-dev \
zip \
unzip && docker-php-ext-install pdo_mysql

# Install Composer
COPY --from=composer/composer /usr/bin/composer /usr/bin/composer

#ENV COMPOSER_ALLOW_SUPERUSER 1

WORKDIR /app

#RUN composer update

