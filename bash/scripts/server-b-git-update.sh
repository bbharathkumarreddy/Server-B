#!/bin/bash
sudo git stash
sudo git reset
sudo git pull origin dev-z1
sudo server-b-update-change.sh
sudo chmod -R 777 /var/www/server-b
sudo chmod -R 777 /var/www/server-b-data