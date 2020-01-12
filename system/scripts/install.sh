#!/bin/bash


# Change the below configuration as per requirments, 
# Exclusive Config file is created after installation in server-b-data folder

server_b_loc_path='/var/www/server-b/'
server_b_loc_data_path='/var/www/server-b-data/'
server_b_loc_config_path='/var/www/server-b-data/config.sh'

server_name='Server B'
server_b_path=${server_b_loc_path}
server_b_data_path=${server_b_loc_data_path}
server_b_config_path=${server_b_loc_config_path}
server_b_username='username'
server_b_password='password'
system_path='/var/www/server-b/system/'
scripts_path='/var/www/server-b/system/scripts/'
files_path='/var/www/server-b/system/files/'
backup_path='/var/www/server-b/system/bck/'
console_path='/var/www/server-b/console/'
app_path='/var/www/server-b/console/app/'
api_path='/var/www/server-b/console/api/'
site_path='/var/www/site/'
logpoint_path='/var/www/server-b-data/logpoint.sh'
time_zone='Etc/UTC'
os='Ubuntu'
dashboard_refresh='5000'
public_ip='2401:4900:1b34:ec76:cd6e:7894:666:219c'
private_ip='192.168.56.1'
php_ini='/etc/php/7.2/cli/php.ini'
php_service='php7.2-fpm'
server_b_v='2.1'
ssh_port='22'
server_b_port='8886'
shell_in_box_access_port='8887'
shell_in_box_port='8888'
server_b_auth_key='a'
cron_file='/var/www/server-b-data/cron'
temp_cron='/var/www/server-b-data/cron_temp'
alt_user='ubu'
alt_pwd='ppp'
update_date=''
hosting_link=''
ping_1_link=''
ping_2_link=''
domain=''
server_twp_hash_path=$server_b_loc_data_path'.htpasswd'

install(){
    echo --------------------------------------------------
    echo ++++++++  Server B Installation Started  +++++++++
    echo --------------------------------------------------
    sudo mkdir -p $server_b_data_path
    sudo mkdir -p $site_path
    sudo mkdir -p $site_path'php'
    sudo mkdir -p $site_path'node'
    sudo mkdir -p $site_path'static'
    sudo mkdir -p $site_path'cert'
    server_b_file_per

    echo server_name"='"$server_name"'" >> $server_b_loc_config_path
    echo server_b_path"='"$server_b_path"'" >> $server_b_loc_config_path
    echo server_b_data_path"='"$server_b_data_path"'" >> $server_b_loc_config_path
    echo server_b_config_path"='"$server_b_config_path"'" >> $server_b_loc_config_path
    echo system_path"='"$system_path"'" >> $server_b_loc_config_path
    echo scripts_path"='"$scripts_path"'" >> $server_b_loc_config_path
    echo files_path"='"$files_path"'" >> $server_b_loc_config_path
    echo backup_path"='"$backup_path"'" >> $server_b_loc_config_path
    echo console_path"='"$console_path"'" >> $server_b_loc_config_path
    echo app_path"='"$app_path"'" >> $server_b_loc_config_path
    echo api_path"='"$api_path"'" >> $server_b_loc_config_path
    echo site_path"='"$site_path"'" >> $server_b_loc_config_path
    echo logpoint_path"='"$logpoint_path"'" >> $server_b_loc_config_path
    echo time_zone"='"$time_zone"'" >> $server_b_loc_config_path
    echo os"='"$os"'" >> $server_b_loc_config_path
    echo dashboard_refresh"='"$dashboard_refresh"'" >> $server_b_loc_config_path
    echo public_ip"='"$public_ip"'" >> $server_b_loc_config_path
    echo private_ip"='"$private_ip"'" >> $server_b_loc_config_path
    echo php_ini"='"$php_ini"'" >> $server_b_loc_config_path
    echo php_service"='"$php_service"'" >> $server_b_loc_config_path
    echo server_b_v"='"$server_b_v"'" >> $server_b_loc_config_path
    echo ssh_port"='"$ssh_port"'" >> $server_b_loc_config_path
    echo server_b_port"='"$server_b_port"'" >> $server_b_loc_config_path
    echo shell_in_box_port"='"$shell_in_box_port"'" >> $server_b_loc_config_path
    echo server_b_auth_key"='"$server_b_auth_key"'" >> $server_b_loc_config_path
    echo alt_user"='"$alt_user"'" >> $server_b_loc_config_path
    echo alt_pwd"='"$alt_pwd"'" >> $server_b_loc_config_path
    echo update_date"='"$update_date"'" >> $server_b_loc_config_path
    echo server_twp_hash_path"='"$server_twp_hash_path"'" >> $server_b_loc_config_path
    echo hosting_link"='"$hosting_link"'" >> $server_b_loc_config_path
    echo domain"='"$domain"'" >> $server_b_loc_config_path
    echo cron_file"='"$cron_file"'" >> $server_b_loc_config_path
    echo temp_cron"='"$temp_cron"'" >> $server_b_loc_config_path
    source $server_b_loc_path'system/scripts/main.sh'
    source $server_b_config_path

    sudo apt-get install git-core curl build-essential openssl libssl-dev -y
    ufw allow $server_b_port
    ufw allow $shell_in_box_access_port
    ufw allow $ssh_port
    ufw allow 80
    ufw allow 443
    load_ip
    load_os
    update_upgrade
    install_nano
    install_nginx
    install_php
    install_mysql mysql123 alt_root mysql123 3305 0.0.0.0
    install_shell_in_a_box $shell_in_box_port
    install_node_npm
    sudo cp /etc/ssh/sshd_config $backup_path'sshd_config_bck'
    generate_auth_key
    new_user ubt ubt
    ssh_port_set 24
    generate_htpasswd $server_b_username $server_b_password
    server_b_file_per

    crontab -l | { cat; echo "@reboot ${scripts_path}service.sh load_ip > /dev/null 2>&1"; } | crontab -
    addLogFile 'syslog' '/var/log/syslog'
    addLogFile 'authlog' '/var/log/auth.log'
    clear_ram
    show_legends
}

install