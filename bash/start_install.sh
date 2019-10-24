#!/bin/bash
#install command below
#sudo apt-get install git -y && sudo mkdir -p /var/www && sudo mkdir -p /var/www/server-b && sudo git clone -b dev-z1 https://bbharathkumarreddy:bvsschool2019@github.com/bbharathkumarreddy/server-b.git /var/www/server-b/ && sudo bash /var/www/server-b/bash/start_install.sh

#/etc/ssh/sshd_config
#/etc/php/7.2/fpm/php.ini
#/etc/nginx/sites-enabled/default
#/etc/nginx/sites-enabled/conf

echo --------------------------------------------------
echo +++++  Server B Installation Started  ++++++
echo --------------------------------------------------

sudo rm -rf /var/www/server-b-data
sudo rm -rf /var/www/site_1
sudo rm -rf /var/www/site_1_cert

sudo mkdir /var/www/server-b-data
sudo mkdir /var/www/site_1
sudo mkdir /var/www/site_1/php
sudo mkdir /var/www/site_1/node
sudo mkdir /var/www/site_1/static
sudo mkdir /var/www/site_1_cert
sudo cp /var/www/server-b/bash/files/php_info.php /var/www/site_1/php/php_info.php

echo -------------------------------------------------
echo ++++++++     System Setup Started      ++++++++++
echo -------------------------------------------------

sudo bash /var/www/server-b/bash/scripts/update_upgrade.sh
sudo apt install nano -y

sudo bash /var/www/server-b/bash/scripts/ip-save.sh

server_os=$(. /etc/os-release; echo ${PRETTY_NAME/*, /})
echo $server_os > /var/www/server-b-data/server_os

sudo cp /etc/ssh/sshd_config /etc/ssh/sshd_config_bck
sudo bash /var/www/server-b/bash/scripts/ssh_port_set.sh

sudo bash /var/www/server-b/bash/scripts/nginx_install.sh
sudo cp /etc/nginx/sites-enabled/default /var/www/server-b-data/nginx-sites-enabled-default_bck
sudo cp /etc/nginx/nginx.conf /var/www/server-b-data/nginx_conf_bck
sudo cp /var/www/server-b/bash/files/nginx.conf /etc/nginx/sites-enabled/default
sudo service nginx reload

sudo bash /var/www/server-b/bash/scripts/php_install.sh
sudo cp /etc/php/7.2/fpm/php.ini /var/www/server-b-data/php_ini_bck

sudo bash /var/www/server-b/bash/scripts/node_npm_install.sh

sudo bash /var/www/server-b/bash/scripts/mysqldb_install.sh
sudo cp /etc/mysql/mysql.conf.d/mysqld_bck.cnf /etc/mysql/mysql.conf.d/mysqld.cnf
sudo bash /var/www/server-b/bash/scripts/mysqldb_config.sh

sudo bash /var/www/server-b/bash/scripts/nginx_timezone_config.sh
sudo bash /var/www/server-b/bash/scripts/php_config.sh

sudo bash /var/www/server-b/bash/scripts/shell_in_a_box.sh

read -p "Create new ubunut linux user : " shell_in_a_box_user
read -p "Set password : " shell_in_a_box_pwd

sudo bash  /var/www/server-b/bash/scripts/newuser shell_in_a_box_user shell_in_a_box_pwd

sudo bash /var/www/server-b/bash/scripts/generate_auth_key.sh
sleep 10
echo 'System restarts in 10 seconds and after restart system connects SSH only in new port entered';
#sudo apt install build-essential -y
#sudo service ssh reload
echo -------------------------------------------------
echo xxxxxxxxx    System Setup Completed    xxxxxxxxxx
echo -------------------------------------------------
server_ip=$(curl ifconfig.co)

server_b_port='8805'
echo $server_b_port > /var/www/server-b-data/server_b_port


server_b_port='linux-instance'
echo $server_b_port > /var/www/server-b-data/server_name


echo "Access your SERVER B at http://${server_ip}:${server_b_port}"
echo '/////////////// SERVER B INSTALLATION COMPLETED SUCCESSFULLY / RESTART FOR SSH PORT CHANGES IF REQUIRED \\\\\\\\\\\\\\\'