FROM php:8.1-fpm

# install packages and extentions

RUN apt-get update && \
    apt-get upgrade -y && \
    apt-get install -y libpq-dev && \
    docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql && \
    docker-php-ext-install pdo pdo_pgsql pgsql && \
    pecl install xdebug && \
    docker-php-ext-enable xdebug

# install composer

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy xdebug configs

COPY /docker/php-fpm/xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# Copy xdebug configs

COPY /docker/php-fpm/xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# define workdir

WORKDIR /var/www/html

# open port

EXPOSE 9000

# Run php-fpm

CMD 'php-fpm'