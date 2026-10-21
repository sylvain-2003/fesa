FROM php:8.2-apache

# Extension MySQL pour PHP
RUN docker-php-ext-install mysqli

# Copie du site (index.html + dossier php/)
COPY . /var/www/html/

# Render fournit le port dans la variable PORT : Apache doit l'écouter
CMD sed -i "s/Listen 80/Listen ${PORT:-80}/" /etc/apache2/ports.conf \
 && sed -i "s/:80>/:${PORT:-80}>/" /etc/apache2/sites-available/000-default.conf \
 && apache2-foreground
