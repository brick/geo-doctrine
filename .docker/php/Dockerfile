ARG PHP_VERSION

FROM php:${PHP_VERSION}-cli

ARG UID
ARG GID

SHELL ["/bin/sh", "-e", "-c"]

RUN <<EOF
apt update
apt install --yes libpq-dev
rm -rf /var/lib/apt/lists/*
EOF

RUN docker-php-ext-install pdo pdo_pgsql pdo_mysql

# Composer
COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN groupadd -g ${GID} user
RUN useradd -u ${UID} -g ${GID} -m -s /bin/bash user

USER user

CMD sleep infinity
