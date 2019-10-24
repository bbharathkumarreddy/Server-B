#!/bin/bash
echo -------------------------------------------------
echo ++++++++++++  SHELL IN A BOX    +++++++++++++++++
echo -------------------------------------------------
sudo apt-cache search shellinabox -y
sudo apt-get install openssl shellinabox -y
sleep 2
sed -i "4200/4201" /etc/default/shellinabox
sudo service shellinaboxd start