FROM php:8.2-cli

WORKDIR /app

RUN apt-get update \
    && apt-get install -y libcurl4-openssl-dev \
    && docker-php-ext-install curl \
    && rm -rf /var/lib/apt/lists/*

COPY . /app

RUN chmod +x /app/start.sh

EXPOSE 8080

CMD ["./start.sh"]
