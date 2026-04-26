FROM php:8.2-apache

RUN a2enmod rewrite

WORKDIR /var/www/html
COPY . /var/www/html

# Keep uploaded incident files writable for Apache in container.
RUN mkdir -p /var/www/html/uploads/incidents \
    && chown -R www-data:www-data /var/www/html/uploads \
    && chmod -R 775 /var/www/html/uploads

# Render web services listen on port 10000.
RUN sed -i 's/Listen 80/Listen 10000/' /etc/apache2/ports.conf \
    && sed -i 's/:80/:10000/g' /etc/apache2/sites-available/000-default.conf

EXPOSE 10000
