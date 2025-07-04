FROM php:8.2-apache

# Install PHP extensions required for MySQL
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Enable Apache rewrite module (optional)
RUN a2enmod rewrite

# Copy project files to Apache web root
COPY
