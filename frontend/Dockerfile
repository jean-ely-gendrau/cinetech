FROM php:8.2-fpm-alpine

# Set timezone
ENV FR=${FR:-UTC}
RUN ln -snf /usr/share/zoneinfo/$FR /etc/localtime && echo $FR > /etc/timezone

# Install non-dev dependencies
RUN apk update && apk upgrade && apk add \
  icu-dev \
  libpq-dev \
  libpng-dev \
  openssl \
  curl-dev \
  zip \
  jpegoptim optipng pngquant gifsicle \
  vim \
  unzip \
  git \
  oniguruma-dev \
  curl \
  libzip-dev \
  $PHPIZE_DEPS \
  && rm -rf /var/lib/apt/lists/* \
  && docker-php-ext-install bz2 && docker-php-ext-enable bz2 \
  && docker-php-ext-install curl && docker-php-ext-enable curl \
  && docker-php-ext-install gd && docker-php-ext-enable gd \
  && docker-php-ext-install intl && docker-php-ext-enable intl \
  && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
  && docker-php-ext-install pdo_mysql && docker-php-ext-enable pdo_mysql \
  && docker-php-ext-install pdo && docker-php-ext-enable pdo \
  && docker-php-ext-install pdo_pgsql && docker-php-ext-enable pdo_pgsql \
  && docker-php-ext-install pgsql && docker-php-ext-enable pgsql \
  && docker-php-ext-install mysqli && docker-php-ext-enable mysqli \
  && docker-php-ext-install mbstring && docker-php-ext-enable mbstring \
  && docker-php-ext-install exif && docker-php-ext-enable exif \
  && docker-php-ext-install fileinfo && docker-php-ext-enable fileinfo \
  && docker-php-ext-install zip && docker-php-ext-enable zip 

# install composer from official image
COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /www

# install composer dependencies
COPY ./composer.lock composer.lock
COPY ./composer.json composer.json
RUN composer install --no-scripts --no-autoloader --no-dev

# copy project files
COPY . .

# change public path to html
RUN cp -R ./public_html/* ./html

# generate autoload files
RUN composer dump-autoload --optimize