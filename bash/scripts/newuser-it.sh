#!/bin/bash
read -p "Create new ubunut linux user : " shell_in_a_box_user
read -p "Set password : " shell_in_a_box_pwd

sudo bash  /var/www/server-b/bash/scripts/newuser.sh ${shell_in_a_box_user} ${shell_in_a_box_pwd}