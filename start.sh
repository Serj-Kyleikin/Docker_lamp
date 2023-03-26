#!/bin/bash

sudo mkdir -p /opt/docker/redis/etc; 
sudo echo requirepass password >/opt/docker/redis/etc/redis.conf

docker-compose up -d --build

echo "Done! Good luck.."