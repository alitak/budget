FROM php:8.1-apache

RUN apt-get update && \
    apt-get -y install apt-utils gnupg2 && \
    apt-get -y upgrade && \
    apt-get update --fix-missing && \
    apt-get --purge autoremove -y

RUN apt-get install -y \
    openssl \
    zip \
    zlib1g-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libzip-dev \
    supervisor \
    wget

RUN a2enmod rewrite proxy proxy_http proxy_wstunnel headers

# install redis
#RUN pecl install -o -f redis && \
#    rm -rf /tmp/pear && \
#    docker-php-ext-enable redis

# install pdo mysql, gd lib, mbstring
RUN docker-php-ext-install \
    pdo pdo_mysql \
    mbstring
#RUN docker-php-ext-configure gd --with-freetype --with-jpeg
#RUN docker-php-ext-install -j$(nproc) gd
#RUN docker-php-ext-enable gd

# copy files
WORKDIR /var/www
COPY ./.docker/apache.conf /etc/apache2/sites-available/000-default.conf
#COPY ./ /var/www

# install npm
#RUN curl -sL https://deb.nodesource.com/setup_16.x | bash - && \
#    apt-get install -y nodejs && \
#    npm install && \
#    npm run prod && \
#    rm -rf node_modules

# install composer packages
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
# && \
#    composer install && \
#    rm -rf /root/.composer

# cleanup
RUN rmdir /var/www/html && \
    chown -R www-data: /var/www
#    rm -rf /var/lib/apt/lists/*
