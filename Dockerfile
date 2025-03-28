FROM richarvey/nginx-php-fpm:latest

# Image config
ENV SKIP_COMPOSER 1
ENV WEBROOT /var/www/html
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 0
ENV REAL_IP_HEADER 1
ENV PHP_ENV 1


# Allow composer to run as root
ENV COMPOSER_ALLOW_SUPERUSER 1

RUN sed -i 's#try_files $uri $uri/ =404;#try_files $uri $uri/ $uri.html /$uri.php?$args;#g' /etc/nginx/sites-available/default.conf

RUN sed -i 's#root /var/www/html;#root /var/www;#g' /etc/nginx/sites-available/default.conf


WORKDIR "/var/www"

COPY . .


RUN wget https://raw.githubusercontent.com/mitchellkrogza/nginx-ultimate-bad-bot-blocker/master/install-ngxblocker -O /usr/local/sbin/install-ngxblocker

RUN chmod +x /usr/local/sbin/install-ngxblocker
RUN /usr/local/sbin/install-ngxblocker -x
RUN chmod +x /usr/local/sbin/setup-ngxblocker
RUN chmod +x /usr/local/sbin/update-ngxblocker

RUN /usr/local/sbin/setup-ngxblocker -x -e conf

COPY ./bots.d/blacklist-user-agents.conf /etc/nginx/bots.d/blacklist-user-agents.conf
COPY ./bots.d/blacklist-ips.conf /etc/nginx/bots.d/blacklist-ips.conf
# COPY ./bots.d/blockbots.conf /etc/nginx/bots.d/blockbots.conf

RUN nginx -t

EXPOSE 80

CMD ["/start.sh"]