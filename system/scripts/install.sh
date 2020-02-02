#!/bin/bash

source '/var/www/server-b/system/scripts/install_config.sh'

install(){
    echo --------------------------------------------------
    echo ++++++++  Server B Installation Started  +++++++++
    echo --------------------------------------------------
    sudo mkdir -p $server_b_data_path
    sudo mkdir -p $site_path
    #sudo mkdir -p $site_path'php'
    #sudo mkdir -p $site_path'node'
    #sudo mkdir -p $site_path'static'
    #sudo mkdir -p $site_path'cert'
    server_b_file_per

    echo server_name"='"$server_name"'" >> $server_b_config_path
    echo server_b_path"='"$server_b_path"'" >> $server_b_config_path
    echo server_b_data_path"='"$server_b_data_path"'" >> $server_b_config_path
    echo server_b_config_path"='"$server_b_config_path"'" >> $server_b_config_path
    echo system_path"='"$system_path"'" >> $server_b_config_path
    echo scripts_path"='"$scripts_path"'" >> $server_b_config_path
    echo files_path"='"$files_path"'" >> $server_b_config_path
    echo backup_path"='"$backup_path"'" >> $server_b_config_path
    echo console_path"='"$console_path"'" >> $server_b_config_path
    echo app_path"='"$app_path"'" >> $server_b_config_path
    echo api_path"='"$api_path"'" >> $server_b_config_path
    echo site_path"='"$site_path"'" >> $server_b_config_path
    echo logpoint_path"='"$logpoint_path"'" >> $server_b_config_path
    echo time_zone"='"$time_zone"'" >> $server_b_config_path
    echo os"='"$os"'" >> $server_b_config_path
    echo dashboard_refresh"='"$dashboard_refresh"'" >> $server_b_config_path
    echo public_ip"='"$public_ip"'" >> $server_b_config_path
    echo private_ip"='"$private_ip"'" >> $server_b_config_path
    echo php_ini"='"$php_ini"'" >> $server_b_config_path
    echo php_service"='"$php_service"'" >> $server_b_config_path
    echo server_b_v"='"$server_b_v"'" >> $server_b_config_path
    echo ssh_port"='"$ssh_port"'" >> $server_b_config_path
    echo server_b_port"='"$server_b_port"'" >> $server_b_config_path
    echo shell_in_box_port"='"$shell_in_box_port"'" >> $server_b_config_path
    echo server_b_auth_key"='"$server_b_auth_key"'" >> $server_b_config_path
    echo mysql_port"='"$mysql_port"'" >> $server_b_config_path
    echo mysql_alt_user"='"$mysql_alt_user"'" >> $server_b_config_path
    echo mysql_alt_pwd"='"$mysql_alt_pwd"'" >> $server_b_config_path
    echo update_date"='"$update_date"'" >> $server_b_config_path
    echo server_twp_hash_path"='"$server_twp_hash_path"'" >> $server_b_config_path
    echo hosting_link"='"$hosting_link"'" >> $server_b_config_path
    echo domain"='"$domain"'" >> $server_b_config_path
    echo cron_file"='"$cron_file"'" >> $server_b_config_path
    echo temp_cron"='"$temp_cron"'" >> $server_b_config_path
    source $server_b_main_path'system/scripts/main.sh'
    source $server_b_config_path

    sudo apt-get install git-core curl build-essential openssl libssl-dev ufw -y
    sudo ufw allow $server_b_port
    sudo ufw allow $shell_in_box_access_port
    sudo ufw allow $ssh_port
    sudo ufw allow 80
    sudo ufw allow 443
    load_ip
    load_os
    update_upgrade
    install_nano
    install_nginx
    install_php
    install_mysql $mysql_password $mysql_alt_user $mysql_alt_password $mysql_port 0.0.0.0
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