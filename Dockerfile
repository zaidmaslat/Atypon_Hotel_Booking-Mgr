FROM gcr.io/hotel-booking-378919/php-frontend:base
COPY src/ /var/www/html/ 
COPY apache2-forground.sh /
RUN chown -R www-data /var/www/html/
ENTRYPOINT ["/apache2-forground.sh"]

