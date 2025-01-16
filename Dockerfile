# Use an official PHP image
FROM php:8.0-apache

# Install any required PHP extensions (if needed)
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Enable Apache mod_rewrite (optional, if your app needs it)
RUN a2enmod rewrite

# Copy the current directory contents into the container at /var/www/html
COPY . /var/www/html/

# Expose port 80 to be able to reach the app from outside the container
EXPOSE 80

# Set the default command to run the Apache web server
CMD ["apache2-foreground"]
