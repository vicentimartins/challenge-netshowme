FROM php:8-fpm

# App dir
RUN useradd netshowme
RUN mkdir /app;
RUN chown -R netshowme:netshowme /app
WORKDIR /app

# Basic install
RUN apt update; \
    apt autoremove -y; \
    apt install -y \
    libpq-dev \
    zip \
    unzip \
    git;

RUN docker-php-ext-install pdo \
    pdo_pgsql;

RUN rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

# Enable xdebug
RUN pecl install xdebug; \
    docker-php-ext-enable xdebug;

# Install composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

USER netshowme
