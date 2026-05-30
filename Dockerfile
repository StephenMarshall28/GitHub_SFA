FROM php:8.2-apache

# Install PHP MySQL extension
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Enable Apache rewrite module
RUN a2enmod rewrite

# Copy project files into Apache web root
COPY . /var/www/html/

# Render provides PORT. Apache must listen on that port.
ENV PORT=10000
EXPOSE 10000

CMD sed -i "s/Listen 80/Listen ${PORT}/" /etc/apache2/ports.conf && \
    sed -i "s/<VirtualHost \*:80>/<VirtualHost *:${PORT}>/" /etc/apache2/sites-available/000-default.conf && \
    apache2-foreground
