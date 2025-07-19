FROM php:8.2-cli

# Install system dependencies
RUN apt-get update && apt-get install -y unzip git curl libzip-dev libpng-dev libonig-dev zip

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql zip mbstring

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /app

# Copy everything
COPY . .

# Install dependencies
RUN composer install --no-dev --optimize-autoloader

# Set correct permissions
RUN chmod -R 775 storage bootstrap/cache

# Expose port
EXPOSE 10000

# Start Laravel app
CMD php artisan serve --host=0.0.0.0 --port=10000
