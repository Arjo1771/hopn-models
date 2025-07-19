FROM richarvey/nginx-php-fpm:3.1.6

# Copy everything
COPY . .

# Set environment (optional)
ENV SKIP_COMPOSER=1 \
    WEBROOT=/var/www/html/public \
    PHP_ERRORS_STDERR=1 \
    RUN_SCRIPTS=1 \
    COMPOSER_ALLOW_SUPERUSER=1

CMD ["/start.sh"]
