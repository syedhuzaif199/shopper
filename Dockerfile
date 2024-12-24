# Use an official PHP image with the necessary extensions
FROM php:8.1-fpm

# Install necessary PHP extensions
RUN docker-php-ext-install pdo pdo_mysql

# Install Composer (PHP dependency manager)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set the working directory in the container
WORKDIR /var/www

# Copy the project files into the container
COPY . .

# Install the PHP dependencies
RUN composer install --optimize-autoloader --no-dev

# Set permissions for storage and cache
RUN chmod -R 775 storage bootstrap/cache

# Expose the port the app will run on
EXPOSE 9000
EXPOSE 10000

# Start the PHP-FPM server (backend)
CMD ["php-fpm"]
