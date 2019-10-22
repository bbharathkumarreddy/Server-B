#!/bin/bash
echo -------------------------------------------------
echo +++++++  NGINX TIMEZONE CONFIG STARTED  ++++++++
echo -------------------------------------------------
echo 'Current Timezone'
timedatectl status | grep "Time zone"
read -p 'Set Server timezone eg Asia/Kolkata (or) America/New_York without quotes = ' set_new_timezone
sudo timedatectl set-timezone $set_new_timezone

echo "Nginx Timezone setting complete"
timedatectl status | grep "Time zone"

sudo service nginx reload reload
sleep 2 
echo -------------------------------------------------
echo xxxxxxx  NGINX TIMEZONE CONFIG STARTED     xxxxx
echo -------------------------------------------------
