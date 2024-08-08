FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y git 

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql

RUN apt-get install -y libpq-dev 
RUN docker-php-ext-install -j$(nproc) pdo_pgsql

RUN apt-get install -y \
        libzip-dev \
        zip \
    && docker-php-ext-install zip

RUN apt-get install -y --no-install-recommends \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
    && docker-php-ext-install -j$(nproc) gd

# Install Imagick
RUN apt-get install -y libmagickwand-dev
RUN pecl install imagick
RUN docker-php-ext-enable imagick

# Install Node.js 20.0.0
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs=20.0.0-1nodesource1

# Get latest Composer
#COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


# Set working directory
WORKDIR /var/www/public
