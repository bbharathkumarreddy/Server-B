#!/bin/bash
echo -------------------------------------------------
echo +++++++++  MYSQL INSTALL STARTED    +++++++++++++
echo -------------------------------------------------

sudo apt update -y
sudo apt install mysql-server -y
sleep 2

read -p "Set MySQL root & userconnect1 password : " mysql_pwd
mysql  -e "ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY '"$mysql_pwd"'";
mysql -uroot -p$mysql_pwd -e "CREATE USER 'userconnect1'@'localhost' IDENTIFIED BY '"$mysql_pwd"'";
mysql -uroot -p$mysql_pwd -e "CREATE USER 'userconnect1'@'%' IDENTIFIED BY '"$mysql_pwd"'";
mysql -uroot -p$mysql_pwd -e "flush privileges";
mysql -uroot -p$mysql_pwd -e "SELECT user,authentication_string,plugin,host FROM mysql.user;";
echo $mysql_pwd > /var/www/server-b-data/server_mysql_pass
echo 'userconnect1' > /var/www/server-b-data/server_mysql_user

service mysql stop
sleep 2
service mysql start
sleep 1

echo -------------------------------------------------
echo ++++++++++   MYSQL INSTALL COMPLETE   +++++++++++             
echo -------------------------------------------------