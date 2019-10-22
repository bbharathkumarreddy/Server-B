#!/bin/bash
echo -------------------------------------------------
echo ++++++++++++  MYSQL PORT CONFIG   +++++++++++++++
echo -------------------------------------------------

cur_mysqlport_string=$(sudo grep "\bport\b" /etc/mysql/mysql.conf.d/mysqld.cnf)
cur_mysqlport=$(cat /etc/mysql/mysql.conf.d/mysqld.cnf | grep 'port' | grep -oE [0-9] | tr -d '\n')
echo "Note Current MYSQL PORT = " ${cur_mysqlport}
read -p "Set New MYSQL PORT (Default 3306) : " server_sqlport
sed -i "s/${cur_mysqlport_string}/port            = ${server_sqlport}/g" /etc/mysql/mysql.conf.d/mysqld.cnf
new_mysqlport=$(cat /etc/mysql/mysql.conf.d/mysqld.cnf | grep 'port' | grep -oE [0-9] | tr -d '\n')
echo $new_mysqlport > /var/www/server-b-data/server_mysql_port

echo -------------------------------------------------
echo +++++++++  MYSQL REMOTE ACCESS CONFIG   +++++++++
echo -------------------------------------------------

cur_mysqlbind_addr_string=$(sudo grep "\bbind-address\b" /etc/mysql/mysql.conf.d/mysqld.cnf)
cur_mysqlbind_addr=$(cat /etc/mysql/mysql.conf.d/mysqld.cnf | grep 'bind-address' | grep -oE "\b((25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\b" | tr -d '\n')
echo "Note Current MYSQL BIND ADDRESS = " ${cur_mysqlbind_addr}
read -p "Set New MYSQL BIND ADDRESS (Default 0.0.0.0 for open internet access / 127.0.0.1 for localhost only / private ip) : " server_bind_address
sed -i "s/${cur_mysqlbind_addr_string}/bind-address            = ${server_bind_address}/g" /etc/mysql/mysql.conf.d/mysqld.cnf
new_mysqlbind_addr=$(cat /etc/mysql/mysql.conf.d/mysqld.cnf | grep 'bind-address' | grep -oE "\b((25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\b" | tr -d '\n')
echo $new_mysqlbind_addr > /var/www/server-b-data/server_mysql_bind_address

service mysql stop
sleep 2
service mysql start
sleep 1

echo -------------------------------------------------
echo ++++++++++   MYSQL CONFIG COMPLETE   +++++++++++             
echo -------------------------------------------------