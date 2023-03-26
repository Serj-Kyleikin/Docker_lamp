# Docker_lamp
Сборка готовой рабочей среды в изолированных контейнерах Docker.

Настройка REDIS

1) Создать конфигурационный файл /opt/docker/redis/etc/redis.conf с данными авторизации: requirepass somePassword
2) Создать файл сборки /opt/docker/redis/docker-compose.yml

redis:
    image: redis
    container_name: 'redis-server'
    restart: unless-stopped
    ports:
        - "6379:6379"
    volumes:
        - /opt/docker/redis/etc:/usr/local/etc/redis
    command: [ "redis-server", "/usr/local/etc/redis/redis.conf" ]
