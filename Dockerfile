FROM php:8.2-cli

WORKDIR /app

COPY . /app

RUN chmod +x /app/start.sh

EXPOSE 8080

CMD ["./start.sh"]
