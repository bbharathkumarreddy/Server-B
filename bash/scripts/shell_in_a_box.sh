#!/bin/bash
echo -------------------------------------------------
echo ++++++++++++  SHELL IN A BOX    +++++++++++++++++
echo -------------------------------------------------
sudo apt-cache search shellinabox
sudo apt-get install openssl shellinabox -y
sleep 2
echo $1 > /var/www/server-b-data/shell_in_a_box_port
sed -i "s/4200/$1/g" /etc/default/shellinabox
sed -i "s/--no-beep/--no-beep   --disable-ssl/g" /etc/default/shellinabox
sleep 1
sudo service shellinabox stop
sleep 1
sudo service shellinabox start