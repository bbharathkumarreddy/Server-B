#!/bin/bash
echo -------------------------------------------------
echo ++++++++++++  SSH PORT SETINGS  +++++++++++++++++
echo -------------------------------------------------
cur_sshport_string=$(sudo grep "\bPort\b" /etc/ssh/sshd_config)
cur_sshport=$(cat /etc/ssh/sshd_config | grep 'Port ' | grep -oE [0-9] | tr -d '\n')

if [[ $cur_sshport_string == *"#"* ]]; then
  echo "Note: Current SSHPORT from config file = ${cur_sshport} not active"
else
  echo "Note: Current SSHPORT set to = ${cur_sshport}"
fi
read -p "Set New SSH PORT (Default 22) : " server_sshport
sed -i "s/${cur_sshport_string}/Port ${server_sshport}/g" /etc/ssh/sshd_config

cur_sshport_a=$(cat /etc/ssh/sshd_config | grep 'Port ' | grep -oE [0-9] | tr -d '\n')
echo $cur_sshport_a > /var/www/sever-b-data/server_ssh_port
echo "Note: Your SSH Connection may stop due to port changes after finishing this installation, Please connect to Port ${cur_sshport_a} is stopped after installtion.";

echo -------------------------------------------------
echo xxxxxx   SSH PORT CONFIG COMPLETE        xxxxxxxx
echo -------------------------------------------------