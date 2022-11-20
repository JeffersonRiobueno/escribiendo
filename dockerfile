FROM ghcr.io/jeffersonriobueno/wordpress/wordpress:latest
COPY . /var/www/html/wp-content/themes/rb_theme
COPY ./extra/ /var/www/html

RUN chown -R www-data:www-data /var/www/html/; \
    chmod -R 775 /var/www/html/ 

COPY ./extra/wp-cache-config.php /var/www/html/wp-content/wp-cache-config.php
RUN chmod 666 /var/www/html/wp-content/wp-cache-config.php

CMD ["apache2-foreground"]
