# Use the official PHP Apache image
FROM php:8.1-apache

# Enable PHP extensions
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Copy project files into container
COPY . /var/www/html/

# Set working directory
WORKDIR /var/www/html/

# Expose port 80
EXPOSE 80
