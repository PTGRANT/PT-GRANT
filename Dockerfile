# Use official PHP 8.2 image with Apache web server
FROM php:8.2-apache

# Install required PHP extensions for MySQL database connectivity
RUN docker-php-ext-install pdo pdo_mysql

# Enable Apache URL rewriting
RUN a2enmod rewrite

# Set the working directory inside the container
WORKDIR /var/www/html

# Copy all your project files into the container web root
COPY . /var/www/html/

# Automatically create the uploads folder and grant correct write permissions for document & payment screenshots
RUN mkdir -p /var/www/html/uploads \
    && chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/uploads

# Expose port 80 for web traffic
EXPOSE 80
