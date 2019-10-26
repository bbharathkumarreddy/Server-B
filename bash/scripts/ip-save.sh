#!/bin/bash
server_ip=$(curl ifconfig.co)
echo $server_ip > /var/www/server-b-data/server_public_ip

server_int_ip=$(hostname -I)
echo $server_int_ip > /var/www/server-b-data/server_int_ip