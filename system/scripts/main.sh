#!/bin/bash
config_path='/var/www/server-b-data/config.sh'
logpoint_path='/var/www/server-b-data/logpoint.sh'
cron_file='/var/www/server-b-data/cron'
temp_cron='/var/www/server-b-data/temp_cron'
source $config_path

#/etc/ssh/sshd_config
#/etc/php/7.2/fpm/php.ini
#/etc/nginx/sites-enabled/default
#/etc/nginx/sites-enabled/conf


getallKey(){
   cat $config_path
}

getKey(){
    value="${!1}"
    echo $value
}

setKey(){
    key=$1
    value=value="${!1}"
    if [ -z "$value" ]
    then
        echo $key"='"$2"'" >> $config_path
    else
        echo $2
        value="${2//\//\\/}"
        sed -i "s/^$1=.*/$1='$value'/" $config_path
        echo $value
    fi
    
    return 1
}

get_disk(){
    DISK_TOTAL=$(df -h | awk '$NF=="/"{printf "%.1f\n", $2}')
    echo $DISK_TOTAL;
}

get_mem(){
    MEM_TOTAL=$(free -m | awk 'NR==2{printf "%s\n", $2}')
    echo $MEM_TOTAL;
}

get_mac_address(){
    cat /sys/class/net/*/address
}

get_os(){
    os=$(. /etc/os-release; echo ${PRETTY_NAME/*, /})
    echo $os;
}

get_cron_file(){
    rm -rf $cron_file
    rm -rf $temp_cron
    crontab -l >> $cron_file
    crontab -l >> $temp_cron
    cat $cron_file
}

publish_cron_file(){
    crontab $temp_cron
    rm -rf $cron_file
    rm -rf $temp_cron
    crontab -l >> $cron_file
    crontab -l >> $temp_cron
    echo 'cron published'
}

get_whoami(){
    os=$(whoami)
    echo $os;
}

get_cpu_info(){
    cpu_info=$(lscpu | grep "Model name"  | awk '{print $3" "$4" "$5" "$6" "$7" "$8}')
    echo $cpu_info;
}

get_cpu_speed(){
    cpu_speed=$(lscpu | awk '/CPU MHz/ {print $3/1000}')
    echo $cpu_speed;
}

get_cpu_cores(){
    cores=$(nproc --all)
    echo $cores;
}

load_ip(){
    public_ip=$(curl ifconfig.co)
    private_ip=$(hostname -I)
    setKey 'public_ip' $public_ip
    setKey 'private_ip' $private_ip
    echo 'Public IP => '$public_ip
    echo 'Private IP => '$private_ip
}

load_os(){
    os=$(. /etc/os-release; echo ${PRETTY_NAME/*, /})
    setKey 'os' $os
}

update_upgrade(){
    echo -------------------------------------------------
    echo +++++++  Update and Upgrade Started      ++++++++
    echo -------------------------------------------------
    sudo apt update -y
    sudo apt upgrade -y
    echo -------------------------------------------------
    echo xxxxxx   Update and Upgrade Completed    xxxxxxxx
    echo -------------------------------------------------
}

install_nano(){
    echo -------------------------------------------------
    echo ++++++  Nano Editor Install Started      ++++++++
    echo -------------------------------------------------
    sudo apt install nano -y
    echo -------------------------------------------------
    echo xxxxxx   Nano Editor Install Completed    xxxxxxx
    echo -------------------------------------------------
}

install_nginx(){
    echo -------------------------------------------------
    echo +++++++++  NGINX INSTALL STARTED  +++++++++++++++
    echo -------------------------------------------------
    sudo apt install nginx -y
    nginx -v
    sleep 3
    sudo timedatectl set-timezone $time_zone
    
    echo "Nginx Timezone setting complete"
    timedatectl status | grep "Time zone"
    sudo openssl req -x509 -nodes -days 5475 -newkey rsa:2048 -keyout /etc/nginx/server-b-cert.key -out /etc/nginx/server-b-cert.crt -subj "/OU=Server B Panel"
    sudo cp /etc/nginx/sites-enabled/default $backup_path'nginx-sites-enabled-default_bck'
    sudo cp /etc/nginx/nginx.conf $backup_path'nginx_conf_bck'
    sudo cp $files_path'nginx.conf' /etc/nginx/sites-enabled/default
    sudo service nginx reload

    addLogFile 'server_b_config' '/var/www/server-b-data/config.sh'
    addLogFile 'nginx_access_log' '/var/log/nginx/access.log'
    addLogFile 'nginx_server_block' '/etc/nginx/sites-enabled/default'
    addLogFile 'nginx_error_log' 'nginx_error_log /var/log/nginx/error.log'

    echo -------------------------------------------------
    echo xxxxxxxx  NGINX INSTALL COMPLETED     xxxxxxxxxxx
    echo -------------------------------------------------
}

install_node_npm(){
    echo -------------------------------------------------
    echo +++++++++  NODE NPM INSTALL STARTED  ++++++++++++
    echo -------------------------------------------------
    sudo apt install nodejs -y
    sudo apt install npm -y
    echo "Node version"
    nodejs -v
    echo "NPM version"
    npm -v
    sleep 5

    sudo npm install -g express
    sudo npm install -g pm2
    sudo npm install -g mysql2

    echo -------------------------------------------------
    echo ++++ NODE AND NPM MODULES INSTALL COMPLETED  ++++             
    echo -------------------------------------------------
}

install_php(){
    echo -------------------------------------------------
    echo +++++++++++  PHP INSTALL STARTED  +++++++++++++++
    echo -------------------------------------------------
    sleep 3
    sudo apt install php-fpm php-mysql -y
    echo "PHP Version"
    php -r 'echo PHP_MAJOR_VERSION;'
    php_major=`php -r 'echo PHP_MAJOR_VERSION;'`
    php_minor=`php -r 'echo PHP_MINOR_VERSION;'`
    php_service_name='php'$php_major'.'$php_minor'-fpm'
    php_ini_file="/etc/php/${php_major}.${php_minor}/fpm/php.ini"
    php_www_conf_file="/etc/php/${php_major}.${php_minor}/fpm/pool.d/www.conf"
    php_fpm_service_file="/lib/systemd/system/php${php_major}.${php_minor}-fpm.service"
    
    sed -i "s/php7.2-fpm.sock/php${php_major}.${php_minor}-fpm.sock/g" /etc/nginx/sites-enabled/default
    sed -i "s/user = www-data/user = root/g" $php_www_conf_file
    sed -i "s/group = www-data/group = root/g" $php_www_conf_file
    sed -i "s/\/etc\/php\/${php_major}.${php_minor}\/fpm\/php-fpm.conf/\/etc\/php\/${php_major}.${php_minor}\/fpm\/php-fpm.conf -R/g" $php_fpm_service_file

    systemctl daemon-reload
    
    setKey 'php_service' $php_service_name
    setKey 'php_ini' $php_ini_file

    #sudo cp $files_path'php_info.php' $site_path'php/php_info.php'
    sudo cp $php_ini_file $backup_path'php.ini.bck'
    php_timezone="${time_zone//\//\\/}"
    sudo sed -i "s/^;date.timezone =$/date.timezone = \"$php_timezone\"/" $php_ini_file
    sudo sed -i "s/^date.timezone =.*$/date.timezone = \"$php_timezone\"/" $php_ini_file
    sudo service nginx reload reload
    sudo service $php_service_name stop
    sudo service $php_service_name start

    new_php_timezone_string=$(sudo grep  "\bdate.timezone\b" $php_ini_file | tail -1 | grep -o '"[^"]\+"');
    echo "PHP New Current Timezone = ${new_php_timezone_string}"

    addLogFile "php_log" "/var/log/${php_service_name}.log"
    addLogFile "php_ini" ${php_ini_file}
    addLogFile "php_www_conf_file" ${php_www_conf_file}
    
    echo -------------------------------------------------
    echo xxxxxxxxxx  PHP INSTALL COMPLETED     xxxxxxxxxxx
    echo -------------------------------------------------
}

php_nginx_root_restart(){

    php_major=`php -r 'echo PHP_MAJOR_VERSION;'`
    php_minor=`php -r 'echo PHP_MINOR_VERSION;'`
    php_fpm_service_file="/lib/systemd/system/php${php_major}.${php_minor}-fpm.service"
    sed -i "s/\/etc\/php\/${php_major}.${php_minor}\/fpm\/php-fpm.conf/\/etc\/php\/${php_major}.${php_minor}\/fpm\/php-fpm.conf -R/g" $php_fpm_service_file
    php_service_name='php'$php_major'.'$php_minor'-fpm'
    
    systemctl daemon-reload
    sudo service $php_service_name stop
    sudo service $php_service_name start
    sudo service nginx stop
    sudo service nginx start

    echo "php nginx root restart successful";

}

install_mysql(){
    echo -------------------------------------------------
    echo +++++++++  MYSQL INSTALL STARTED    +++++++++++++
    echo -------------------------------------------------

    sudo apt update -y
    export DEBIAN_FRONTEND="noninteractive"
    sudo debconf-set-selections <<< "mysql-server mysql-server/root_password password $root_password"
    sudo debconf-set-selections <<< "mysql-server mysql-server/root_password_again password $root_password"
    sudo apt-get install mysql-server -y
    sleep 3

    root_password=$1
    mysql_alt_user=$2
    mysql_alt_pwd=$3
    mysql_port=$4
    mysql_bind_address=$5

    #mysql  -e "ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY '"$root_password"'";
    mysql -uroot -p$root_password -e "CREATE USER '$mysql_alt_user'@'localhost' IDENTIFIED BY '"$mysql_alt_pwd"'";
    mysql -uroot -p$root_password -e "CREATE USER '$mysql_alt_user'@'%' IDENTIFIED BY '"$mysql_alt_pwd"'";
    mysql -uroot -p$root_password -e "flush privileges";
    mysql -uroot -p$root_password -e "SELECT user,authentication_string,plugin,host FROM mysql.user;";

    setKey 'mysql_root_password' $root_password
    setKey 'mysql_mysql_alt_user' $mysql_alt_user
    setKey 'mysql_alt_password' $mysql_alt_pwd


    sudo cp /etc/mysql/mysql.conf.d/mysqld.cnf $backup_path'mysqld.cnf.bck'
    service mysql stop
    sleep 2
    service mysql start
    sleep 1
    addLogFile "mysql_conf" "/etc/mysql/mysql.conf.d/mysqld.cnf"
    config_mysql $mysql_port $mysql_bind_address

    echo -------------------------------------------------
    echo ++++++++++   MYSQL INSTALL COMPLETE   +++++++++++             
    echo -------------------------------------------------
}

config_mysql(){
    echo -------------------------------------------------
    echo ++++++++++++  MYSQL PORT CONFIG   +++++++++++++++
    echo -------------------------------------------------

    mysql_port=$1
    mysql_bind_address=$2
    
    cur_mysqlport_string=$(sudo grep "\bport\b" /etc/mysql/mysql.conf.d/mysqld.cnf)
    sed -i "s/${cur_mysqlport_string}/port            = ${mysql_port}/g" /etc/mysql/mysql.conf.d/mysqld.cnf
    setKey 'mysql_port' $mysql_port

    cur_mysqlbind_addr_string=$(sudo grep "\bbind-address\b" /etc/mysql/mysql.conf.d/mysqld.cnf)
    sed -i "s/${cur_mysqlbind_addr_string}/bind-address            = ${mysql_bind_address}/g" /etc/mysql/mysql.conf.d/mysqld.cnf
    setKey 'mysql_bind_address' $mysql_bind_address

    echo 'Note: MySQL service restarts in new configuration => Port:'$mysql_port' AND bind to address:'$mysql_bind_address
    service mysql stop
    sleep 2
    service mysql start
    sleep 1

    echo -------------------------------------------------
    echo ++++++++++   MYSQL CONFIG COMPLETE   +++++++++++             
    echo -------------------------------------------------

}


install_shell_in_a_box(){
    echo -------------------------------------------------
    echo ++++++++++++  SHELL IN A BOX    +++++++++++++++++
    echo -------------------------------------------------
    sudo apt-cache search shellinabox
    sudo apt-get install openssl shellinabox -y
    sleep 2
    sed -i "s/4200/$1/g" /etc/default/shellinabox
    sed -i "s/--no-beep/--no-beep   --disable-ssl  --localhost-only/g" /etc/default/shellinabox
    shell_in_box_port=$1
    setKey 'shell_in_box_port' $shell_in_box_port
    sleep 1
    sudo service shellinabox stop
    sleep 1
    sudo service shellinabox start
}

ssh_port_set(){
    echo -------------------------------------------------
    echo ++++++++++++  SSH PORT SETINGS  +++++++++++++++++
    echo -------------------------------------------------
    
    ssh_port_string=$(sudo grep "\bPort\b" /etc/ssh/sshd_config)
    ssh_port=$(cat /etc/ssh/sshd_config | grep 'Port ' | grep -oE [0-9] | tr -d '\n')
    new_ssh_port=$1
    sed -i "s/${ssh_port_string}/Port ${1}/g" /etc/ssh/sshd_config
    setKey 'ssh_port' $new_ssh_port
    echo 'Note: Restart Server After all installation or process is completed to start the ssh in new port'
    echo -------------------------------------------------
    echo xxxxxx   SSH PORT CONFIG COMPLETE        xxxxxxxx
    echo -------------------------------------------------
}

generate_auth_key(){
    echo -------------------------------------------------
    echo +++++++++  GENERATE AUTH STARTED  +++++++++++++++
    echo -------------------------------------------------
    auth_key=$(head /dev/urandom | tr -dc A-Za-z0-9 | head -c 20 ; echo '');
    echo "Note: This is the auth key, cannot be viewed again but can generate a new key. Please copy and store securely. Used for GIT Integrations & APIs."
    echo $auth_key
    setKey 'server_b_auth_key' $auth_key
    echo -------------------------------------------------
    echo xxxxxxxx   GENERATE AUTH COMPLETE     xxxxxxxxxxx
    echo -------------------------------------------------
}

new_user(){
    echo -------------------------------------------------
    echo ++++  CREATING NEW USER WITH ALL PRIVILEGES +++++
    echo -------------------------------------------------
    new_user=$1
    new_pwd=$2
    if [ "$new_user" == "new_username" ] || [ "$new_password" == "new_password" ] ; then
        echo "!!! Error: Default Username or Password is not allowed; Change shell_in_a_box_username and shell_in_a_box_password in install_config.sh"
        exit;
    fi
    echo "${new_user}    ALL=(ALL:ALL) ALL" >> /etc/sudoers
    sudo useradd -p $(openssl passwd -1 $new_user) $new_pwd
    setKey 'shell_in_a_box_username' $new_user
    setKey 'shell_in_a_box_password' $new_pwd
}

del_user(){
    echo -------------------------------------------------
    echo ++++++++++++++  DELETING USER ++++++++++++++++++
    echo -------------------------------------------------
    userdel -f -r $1
    echo 'User Deleted :'$1
}

clear_ram(){
    sync; echo 1 > /proc/sys/vm/drop_caches
    sync; echo 2 > /proc/sys/vm/drop_caches
    sync; echo 3 > /proc/sys/vm/drop_caches
    echo "RAM CLEARED"
}

restart(){
    sudo reboot
}

shutdown(){
    sudo shutdown
}

service_status_all(){
    sudo service --status-all
}

system_stat_current(){
    LOAD_1=$(top -bn1 | grep load | awk '{printf "%s\n", $10}')
    if [ $LOAD_1 == "load" ]
    then
        LOAD_1=$(top -bn1 | grep load | awk '{printf "%s\n", $12}')
        LOAD_5=$(top -bn1 | grep load | awk '{printf "%s\n", $13}')
        LOAD_15=$(top -bn1 | grep load | awk '{printf "%s\n", $14}')
    else
        LOAD_5=$(top -bn1 | grep load | awk '{printf "%s\n", $11}')
        LOAD_15=$(top -bn1 | grep load | awk '{printf "%s\n", $12}')
    fi
   
    CPU=$(top -bn1 | grep load | awk '{printf "%.2f\n", $(NF-2)}')
    DISK_USAGE=$(df -h | awk '$NF=="/"{printf "%.1f\n", $3}')
    DISK_TOTAL=$(df -h | awk '$NF=="/"{printf "%.1f\n", $2}')
    MEM_USAGE=$(free -m | awk 'NR==2{printf "%s\n", $3}')
    MEM_TOTAL=$(free -m | awk 'NR==2{printf "%s\n", $2}')
    TIMESTAMP=$(date +%s)

    LINE=`grep ens4 /proc/net/dev | sed s/.*://`;
    NET_RECEIVED=`echo $LINE | awk '{print $1}'`
    NET_TRANSMITTED=`echo $LINE | awk '{print $9}'`

    NET_RECEIVED=$(($NET_RECEIVED/1000))
    NET_TRANSMITTED=$(($NET_TRANSMITTED/1000))
    NET_TOTAL=$(($NET_RECEIVED+$NET_TRANSMITTED))

    DATA_STRING="'${TIMESTAMP}','${CPU}','${LOAD_1}','${LOAD_5}','${LOAD_15}','${DISK_USAGE}','${DISK_TOTAL}','${MEM_USAGE}','${MEM_TOTAL}','${NET_RECEIVED}','${NET_TRANSMITTED}','${NET_TOTAL}'"
    echo ${DATA_STRING}
}

server_b_file_per(){
    sudo chmod -R 777 $server_b_path
    sudo chmod -R 777 $server_b_data_path
    sudo chmod -R 777 $site_path
}

addLogFile(){
    name=$1
    location=$2
    echo $1 $2 >> $logpoint_path
}

getLogFile(){
    cat $logpoint_path
}

removeLogFile(){
   full_name_path=$1
   full_name_path="${full_name_path//\//\\/}"
   sed -i "/${full_name_path}/d" $logpoint_path
}

generate_htpasswd(){
    echo -------------------------------------------------
    echo +++++  GENERATE SERVER B LOGIN CREDENTIALS  +++++
    echo -------------------------------------------------
    twp_salt="zkd44ldvdQpl84mf5n"
    twp_username=$1
    twp_passwd=$2
    if [ "$twp_username" == "username" ] || [ "$twp_passwd" == "password" ] ; then
        echo "!!! Error: Default Username or Password is not allowed; Change server_b_username and server_b_password in install_config.sh"
        exit;
    fi
    twp_hash_passwd=$(perl -le "print crypt("$twp_passwd", "$twp_salt")")
    twp_file=$twp_username':'$twp_hash_passwd
    rm -f $server_twp_hash_path
    echo $twp_file >> $server_twp_hash_path
    service nginx reload;
    echo -------------------------------------------------
    echo ++++++ SERVER B LOGIN CREDENTIALS SUCCESS +++++++
    echo -------------------------------------------------
}

show_legends(){

    echo "  ----------------------------------------------------------------------------------------"
    echo "                             SERVER B CONSOLE v2.1                                        "
    echo "  ----------------------------------------------------------------------------------------"
    echo "  *                                                                                       "
    echo "  *   Server B Dashboard        : https://${public_ip}:${server_b_port}/app/dashboard.php  "
    echo "  *   Username                  : ${server_b_username}                                    "
    echo "  *   Password                  : ${server_b_password}                                    "
    echo "  *                                                                                       "
    echo "  *   Server B Shell            : https://${public_ip}:${server_b_port}/app/ssh.php        "
    echo "  *   Shell Username            : ${shell_in_a_box_username}                              "
    echo "  *   Shell Password            : ${shell_in_a_box_password}                              "
    echo "  *                                                                                       "
    echo "  *        Note: Shell web page credentials are same as server b;                         "
    echo "  *        Note: shell credentials are used only inside shell box;                        "           
    echo "  *                                                                                       "
    echo "  *   Server B Port             : ${server_b_port}                                        "
    echo "  *   Server B SSH Access Port  : ${shell_in_box_access_port}                             "
    echo "  *   Server B SSH Port         : ${shell_in_box_port}                                    "
    echo "  *                                                                                       "
    echo "  *        Note: Protect all Server B Ports using firewall for better security            "
    echo "  *                                                                                       "
    echo "  *   Server B Auth Key         : ${server_b_auth_key}                                    "
    echo "  *                                                                                       "    
    echo "  ----------------------------------------------------------------------------------------"
    echo "                                                                                          "
    echo "  ----------------------------------------------------------------------------------------"

}