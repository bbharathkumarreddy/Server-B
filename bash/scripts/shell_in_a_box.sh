#!/bin/bash
echo -------------------------------------------------
echo ++++++++++++  SHELL IN A BOX    +++++++++++++++++
echo -------------------------------------------------
#sudo apt-cache search shellinabox
#sudo apt-get install openssl shellinabox -y
sleep 2
sed -i "s/4200/4201/g" /etc/default/shellinabox
sed -i "s/--no-beep/--no-beep   --disable-ssl/g" /etc/default/shellinabox
sleep
sudo service shellinaboxd start