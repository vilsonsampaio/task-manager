FROM php:7.3-fpm
COPY . /var/www/html
WORKDIR /var/www/html
CMD ["php", "-S", "0.0.0.0:80"]


