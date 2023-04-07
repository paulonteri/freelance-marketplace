FROM php:8-fpm

WORKDIR /app

RUN apt update
RUN apt install zip unzip -y

RUN docker-php-ext-install pdo pdo_mysql

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --filename=composer

COPY ./ .

RUN php composer install
RUN php composer update

RUN ls -la

WORKDIR /app/public

CMD [ "php", "-S", "0.0.0.0:9000" ]