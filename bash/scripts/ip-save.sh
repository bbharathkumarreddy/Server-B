#!/bin/bash
server_ip=$(curl ifconfig.co)
echo $server_ip > /var/www/server-b-data/server_public_ip

server_int_ip=$(ifconfig | sed -En 's/127.0.0.1//;s/.*inet (addr:)?(([0-9]*\.){3}[0-9]*).*/\2/p')
echo $server_int_ip > /var/www/server-b-data/server_int_ip

echo 'userconnect1' > /s.txt 