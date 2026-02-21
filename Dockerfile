# Use official PHP image
FROM php:8.2-apache

# ✅ Install mysqli and pdo_mysql extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copy all files to web root
COPY . /var/www/html/

# Expose port 10000 (Render uses this for web apps)
EXPOSE 10000

# Start PHP built-in server
CMD ["php", "-S", "0.0.0.0:10000", "-t", "/var/www/html"]
