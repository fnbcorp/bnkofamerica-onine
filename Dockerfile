FROM richarvey/nginx-php-fpm:latest

COPY . .

# Image config
ENV SKIP_COMPOSER 1
ENV WEBROOT /var/www/html
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 0
ENV REAL_IP_HEADER 1


# Allow composer to run as root
ENV COMPOSER_ALLOW_SUPERUSER 1

RUN sed -i 's#try_files $uri $uri/ =404;#try_files $uri $uri/ $uri.html /$uri.php?$args;#g' /etc/nginx/sites-available/default.conf

RUN wget https://raw.githubusercontent.com/mitchellkrogza/nginx-ultimate-bad-bot-blocker/master/install-ngxblocker -O /usr/local/sbin/install-ngxblocker

RUN chmod +x /usr/local/sbin/install-ngxblocker
RUN /usr/local/sbin/install-ngxblocker -x
RUN chmod +x /usr/local/sbin/setup-ngxblocker
RUN chmod +x /usr/local/sbin/update-ngxblocker

RUN /usr/local/sbin/setup-ngxblocker setup-ngxblocker -x

RUN nginx -t

EXPOSE 80

CMD ["/start.sh"]