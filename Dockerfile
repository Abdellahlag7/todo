FROM php:latest
COPY /www /var/www/html
EXPOSE 80
CMD ["php", "-S", "0.0.0.0:80"]
