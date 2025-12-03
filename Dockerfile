FROM php:8.4-cli-trixie AS php-cli

ARG UID=33
ARG GID=33

RUN set -e \
    && usermod --uid="${UID}" "www-data" \
    && groupmod --gid="${GID}" "www-data"

RUN ls -l /var/www/ \
    && chown --recursive www-data:www-data /var/www/

RUN apt-get update \
    && apt-get install --yes --no-install-recommends nano procps \
    && apt-get clean && apt-get autoclean && apt-get autoremove --purge --yes

COPY docker/build/php/usr/ /usr/

WORKDIR /var/www/html/

USER www-data

CMD ["php", "-S", "0.0.0.0:8000", "-t", "/var/www/html/public/"]

#
# Compose
#
FROM php-cli AS compose

#
# Production
#
FROM php-cli AS production

COPY html/ /var/www/html/
