# Utiliser une image de PHP comme base
FROM php:8.3-fpm

# Installer les dépendances nécessaires
RUN apt-get update \
    && apt-get install -y \
        git \
        curl \
        libpng-dev \
        libjpeg-dev \
        libpq-dev \
        zip \
        unzip \
        postgresql-client \
    && docker-php-ext-configure gd --with-jpeg \
    && docker-php-ext-install gd pdo pdo_pgsql pgsql

# Installer Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Définir le répertoire de travail
WORKDIR /var/www/html

# Copier les fichiers de l'application Laravel
COPY . .

# Installer les dépendances PHP avec Composer
RUN composer install --no-dev --optimize-autoloader

# Donner les permissions nécessaires
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Exposer le port 8000 pour le serveur PHP intégré de Laravel
EXPOSE 9000

# Commande pour démarrer le serveur intégré de Laravel
CMD ["php-fpm"]