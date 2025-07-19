FROM richarvey/nginx-php-fpm:3.1.6

COPY . .

# ✅ Set correct permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

ENV SKIP_COMPOSER=1 \
    WEBROOT=/var/www/html/public \
    PHP_ERRORS_STDERR=1 \
    RUN_SCRIPTS=1 \
    COMPOSER_ALLOW_SUPERUSER=1

CMD ["/start.sh"]
