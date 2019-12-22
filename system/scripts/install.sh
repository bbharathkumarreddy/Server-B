#!/bin/bash

#install command below
#sudo apt-get install git -y && sudo mkdir -p /var/www && sudo mkdir -p /var/www/server-b && sudo git clone -b dev-z1 https://bbharathkumarreddy:bvsschool2019@github.com/bbharathkumarreddy/server-b.git /var/www/server-b/ && sudo bash /var/www/server-b/system/scripts/install.sh
source ../main.sh

echo --------------------------------------------------
echo +++++  Server B Installation Started  ++++++
echo --------------------------------------------------

sudo mkdir $site_path
sudo mkdir $site_path'php'
sudo mkdir $site_path'node'
sudo mkdir $site_path'static'
sudo mkdir $site_path'cert'

server_b_file_per

load_ip
load_os
update_upgrade
install_nano
install_nginx
install_php
install_mysql mysql123 alt_root mysql123 3305 0.0.0.0
install_shell_in_a_box 8887
install_node_npm
sudo cp /etc/ssh/sshd_config $backup_path`sshd_config_bck`
generate_auth_key
new_user ubt ubt
ssh_port_set 24

server_b_file_per

crontab -l | { cat; echo "@reboot $scripts_path'main.sh' load_ip > /dev/null 2>&1"; } | crontab -
