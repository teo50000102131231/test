# Use the official PHP Apache image as a base image
FROM php:8.0-apache

# Install necessary dependencies for PostgreSQL connection
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Enable mod_rewrite (optional for your PHP application)
RUN a2enmod rewrite

# Configure Apache to look for index.php first
RUN echo "DirectoryIndex index.php index.html" >> /etc/apache2/apache2.conf

# Copy application code into the container (assuming your app is in the current directory)
COPY ./src/ /var/www/html/

# Expose Apache port (default HTTP port)
EXPOSE 80
