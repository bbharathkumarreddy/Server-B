#!/bin/bash

source '/var/www/server-b/system/scripts/install_config.sh'
# config_path /var/www/server-b-data/config.sh
install(){
    echo --------------------------------------------------
    echo ++++++++  Server B Installation Started  +++++++++
    echo --------------------------------------------------
    sudo mkdir -p $server_b_data_path
    sudo mkdir -p $site_path
    sudo touch ${server_b_data_path}'reboot.sh'
    sudo touch ${server_b_data_path}'general.sh'
    sudo touch ${server_b_data_path}'git_trigger_history.txt'
    sudo mkdir -p '/var/log/server-b'
    sudo touch '/var/log/server-b/server-b.log'
    write_log 'Welcome to Server B'
    write_log 'Server B Installation Started'
    #sudo mkdir -p $site_path'php'
    #sudo mkdir -p $site_path'node'
    #sudo mkdir -p $site_path'static'
    #sudo mkdir -p $site_path'cert'
    write_log 'Created Config File'
    echo server_name"='"$server_name"'" >> $server_b_config_path
    echo server_b_path"='"$server_b_path"'" >> $server_b_config_path
    echo server_b_username"='"$server_b_username"'" >> $server_b_config_path
    echo server_b_password"='"$server_b_password"'" >> $server_b_config_path
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
    echo public_server_b_domain"='"$public_server_b_domain"'" >> $server_b_config_path
    echo shell_in_box_access_port"='"$shell_in_box_access_port"'" >> $server_b_config_path
    echo shell_in_a_box_username"='"$shell_in_a_box_username"'" >> $server_b_config_path
    echo shell_in_a_box_password"='"$shell_in_a_box_password"'" >> $server_b_config_path
    echo shell_in_box_port"='"$shell_in_box_port"'" >> $server_b_config_path
    echo server_b_auth_key"='"$server_b_auth_key"'" >> $server_b_config_path
    echo mysql_port"='"$mysql_port"'" >> $server_b_config_path
    echo mysql_password"='"$mysql_password"'" >> $server_b_config_path
    echo mysql_alt_user"='"$mysql_alt_user"'" >> $server_b_config_path
    echo mysql_alt_pwd"='"$mysql_alt_pwd"'" >> $server_b_config_path
    echo update_date"='"$update_date"'" >> $server_b_config_path
    echo server_twp_hash_path"='"$server_twp_hash_path"'" >> $server_b_config_path
    echo hosting_link"='"$hosting_link"'" >> $server_b_config_path
    echo ping_1_link"='"$ping_1_link"'" >> $server_b_config_path
    echo ping_2_link"='"$ping_2_link"'" >> $server_b_config_path
    echo domain"='"$domain"'" >> $server_b_config_path

    echo git_folder_path_1"='"$git_folder_path_1"'" >> $server_b_config_path
    echo git_repo_1"='"$git_repo_1"'" >> $server_b_config_path
    echo git_username_1"='"$git_username_1"'" >> $server_b_config_path
    echo git_password_1"='"$git_password_1"'" >> $server_b_config_path
    echo git_ip_list_1"='"$git_ip_list_1"'" >> $server_b_config_path
    echo git_trigger_enable_1"='"$git_trigger_enable_1"'" >> $server_b_config_path
    echo git_branch_1"='"$git_branch_1"'" >> $server_b_config_path

    echo git_folder_path_2"='"$git_folder_path_2"'" >> $server_b_config_path
    echo git_repo_2"='"$git_repo_2"'" >> $server_b_config_path
    echo git_username_2"='"$git_username_2"'" >> $server_b_config_path
    echo git_password_2"='"$git_password_2"'" >> $server_b_config_path
    echo git_ip_list_2"='"$git_ip_list_2"'" >> $server_b_config_path
    echo git_trigger_enable_2"='"$git_trigger_enable_2"'" >> $server_b_config_path
    echo git_branch_2"='"$git_branch_2"'" >> $server_b_config_path

    echo git_folder_path_3"='"$git_folder_path_3"'" >> $server_b_config_path
    echo git_repo_3"='"$git_repo_3"'" >> $server_b_config_path
    echo git_username_3"='"$git_username_3"'" >> $server_b_config_path
    echo git_password_3"='"$git_password_3"'" >> $server_b_config_path
    echo git_ip_list_3"='"$git_ip_list_3"'" >> $server_b_config_path
    echo git_trigger_enable_3"='"$git_trigger_enable_3"'" >> $server_b_config_path
    echo git_branch_3"='"$git_branch_3"'" >> $server_b_config_path

    echo git_folder_path_4"='"$git_folder_path_4"'" >> $server_b_config_path
    echo git_repo_4"='"$git_repo_4"'" >> $server_b_config_path
    echo git_username_4"='"$git_username_4"'" >> $server_b_config_path
    echo git_password_4"='"$git_password_4"'" >> $server_b_config_path
    echo git_ip_list_4"='"$git_ip_list_4"'" >> $server_b_config_path
    echo git_trigger_enable_4"='"$git_trigger_enable_4"'" >> $server_b_config_path
    echo git_branch_4"='"$git_branch_4"'" >> $server_b_config_path

    echo git_folder_path_5"='"$git_folder_path_5"'" >> $server_b_config_path
    echo git_repo_5"='"$git_repo_5"'" >> $server_b_config_path
    echo git_username_5"='"$git_username_5"'" >> $server_b_config_path
    echo git_password_5"='"$git_password_5"'" >> $server_b_config_path
    echo git_ip_list_5"='"$git_ip_list_5"'" >> $server_b_config_path
    echo git_trigger_enable_5"='"$git_trigger_enable_5"'" >> $server_b_config_path
    echo git_branch_5"='"$git_branch_5"'" >> $server_b_config_path

    echo slack_webhook_url"='"$slack_webhook_url"'" >> $server_b_config_path
    echo slack_name"='"$slack_name"'" >> $server_b_config_path
    echo slack_icon_url"='"$slack_icon_url"'" >> $server_b_config_path
    
    echo cron_file"='"$cron_file"'" >> $server_b_config_path
    echo temp_cron"='"$temp_cron"'" >> $server_b_config_path
    source $server_b_main_path'system/scripts/main.sh'
    source $server_b_config_path

    server_b_file_per
    sudo apt-get install git-core curl build-essential openssl libssl-dev ufw -y
    write_log 'created ufw default values'
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
    sudo apt-get install php-curl -y
    if [ "$install_mysql" = 'true' ]; then
    install_mysql $mysql_password $mysql_alt_user $mysql_alt_pwd $mysql_port 0.0.0.0
    fi
    install_shell_in_a_box $shell_in_box_port
    if [ "$install_node_js" = 'true' ]; then
    install_node_npm
    fi
    sudo cp /etc/ssh/sshd_config $backup_path'sshd_config_bck'
    generate_auth_key
    new_user $shell_in_a_box_username $shell_in_a_box_password
    ssh_port_set 24
    generate_htpasswd $server_b_username $server_b_password
    server_b_file_per

    crontab -l | { cat; echo "@reboot ${scripts_path}service.sh load_ip > /dev/null 2>&1"; } | crontab -
    crontab -l | { cat; echo "@reboot /var/www/server-b-data/reboot.sh load_ip > /dev/null 2>&1"; } | crontab -
    addLogFile 'syslog' '/var/log/syslog'
    addLogFile 'authlog' '/var/log/auth.log'
    addLogFile 'GIT_Triggers' '/var/www/server-b-data/git_logs.txt'
    clear_ram
    show_legends
}

install