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
    && apt-get install --yes --no-install-recommends lsb-release ca-certificates \
    && install --directory /usr/share/postgresql-common/pgdg \
    && curl --output /usr/share/postgresql-common/pgdg/apt.postgresql.org.asc --fail https://www.postgresql.org/media/keys/ACCC4CF8.asc \
    && echo "deb [signed-by=/usr/share/postgresql-common/pgdg/apt.postgresql.org.asc] https://apt.postgresql.org/pub/repos/apt $(lsb_release --codename --short)-pgdg main" > /etc/apt/sources.list.d/pgdg.list \
    && apt-get update \
    && apt-get install --yes --no-install-recommends libpq-dev postgresql-client-18 \
    && docker-php-ext-install pdo_pgsql \
    && docker-php-ext-enable pdo_pgsql \
    && apt-get clean && apt-get autoclean && apt-get autoremove --purge --yes

COPY docker/build/php/usr/ /usr/

WORKDIR /var/www/html/

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]

#
# Compose
#
FROM php-cli AS compose

RUN apt-get update \
    && apt-get install --yes --no-install-recommends nano curl unzip p7zip-full \
    && apt-get clean && apt-get autoclean && apt-get autoremove --purge --yes

COPY --from=composer:2.9 /usr/bin/composer /usr/bin/composer

USER www-data

#
# Composer
#
FROM composer:2.9 AS composer

COPY html/ /app/

WORKDIR /app/

RUN composer install --ignore-platform-reqs --no-dev --no-scripts
RUN composer audit || exit 0

#
# Node
#
FROM node:22-trixie AS node

COPY html/ /app/

WORKDIR /app/

RUN npm install && npm run build

#
# Production
#
FROM php-cli AS production

COPY --chown=www-data:www-data html/ /var/www/html/
COPY --chown=www-data:www-data --from=composer /app/vendor/ /var/www/html/vendor/
COPY --chown=www-data:www-data --from=node /app/public/build/ /var/www/html/public/build/

USER www-data
