#!/usr/bin/env bash

echo "📦 Installing dependencies..."
composer install --no-dev --working-dir=/var/www/html

echo "🧹 Caching config and routes..."
php artisan config:cache
php artisan route:cache

echo "🛠 Migrating database..."
php artisan migrate --force

echo "✅ Deployment script completed!"
