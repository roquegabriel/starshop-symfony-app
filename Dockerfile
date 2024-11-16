FROM php:8.3-apache

RUN apt update && apt install -y \
    libicu-dev \
    libonig-dev \
    libzip-dev \
    zip \
    unzip \
    curl \
    git \
    && git config --global user.email "you@example.com" && git config --global user.name "Your Name" \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl \
    && docker-php-ext-install mbstring \
    && docker-php-ext-install zip \
    && docker-php-ext-install pdo_mysql
RUN docker-php-ext-enable intl mbstring zip pdo_mysql

RUN a2enmod rewrite

WORKDIR /var/www/html

COPY . /var/www/html

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN COMPOSER_ALLOW_SUPERUSER=1 composer install --no-scripts

COPY apache.conf /etc/apache2/sites-available/000-default.conf

RUN a2enmod rewrite

EXPOSE 80

RUN curl -1sLf 'https://dl.cloudsmith.io/public/symfony/stable/setup.deb.sh' | bash && apt install -y symfony-cli

COPY ./docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh

RUN chmod +x /usr/local/bin/docker-entrypoint.sh

ENTRYPOINT ["docker-entrypoint.sh"]

CMD ["apache2-foreground"]
