# Use official PHP image with Apache
FROM php:8.2-apache

# Install PHP extensions for MySQL
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Enable Apache mod_rewrite (optional if using clean URLs)
RUN a2enmod rewrite

# Copy all project files to Apache web root
COPY . /var/www/html/

# Set working directory
WORKDIR /var/www/html/

# Set permissions (optional but useful)
RUN chown -R www-data:www-data /var/www/html/

# Expose default HTTP port
EXPOSE 80
