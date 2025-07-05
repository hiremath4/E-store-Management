# Use official PHP image with Apache
FROM php:8.2-apache

# Install PHP extensions for MySQL
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Enable Apache mod_rewrite (needed for clean URLs and .htaccess support)
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html/

# Copy project files into the container
COPY . /var/www/html/

# Set permissions for Apache user
RUN chown -R www-data:www-data /var/www/html/ \
    && chmod -R 755 /var/www/html/

# Expose Apache port
EXPOSE 80
