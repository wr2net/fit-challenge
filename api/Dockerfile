FROM php:8.1-cli

WORKDIR /var/www

RUN apt-get update && \
    apt-get install libzip-dev -y && \
    docker-php-ext-install zip pdo pdo_mysql

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php \
    && rm composer-setup.php \
    && chmod +x composer.phar \
    && mv composer.phar /usr/local/bin/composer

RUN composer install

ENTRYPOINT [ "php", "artisan", "serve" ]

CMD [ "--host=0.0.0.0" ]
