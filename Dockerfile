FROM php:8.2-apache

# System libs required by extensions
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libzip-dev \
    && rm -rf /var/lib/apt/lists/*

# Configure GD with JPEG + FreeType support, then install all extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install mysqli gd zip opcache

# Enable Apache mod_rewrite; suppress ServerName warning; disable server signature
RUN a2enmod rewrite \
    && echo "ServerName localhost" >> /etc/apache2/apache2.conf \
    && echo "ServerTokens Prod" >> /etc/apache2/apache2.conf \
    && echo "ServerSignature Off" >> /etc/apache2/apache2.conf

# Apply production PHP config
COPY php-production.ini /usr/local/etc/php/conf.d/production.ini

# Copy application source (respects .dockerignore — .env is never baked in)
COPY . /var/www/html/

# Set proper permissions; remove php-production.ini from web root
# product/ must be writable by www-data for image uploads
RUN rm -f /var/www/html/php-production.ini \
    && rm -f /var/www/html/.dockerignore \
    && chown -R www-data:www-data /var/www/html \
    && find /var/www/html -type f -exec chmod 644 {} \; \
    && find /var/www/html -type d -exec chmod 755 {} \; \
    && chmod 775 /var/www/html/product
