#!/bin/bash
echo -------------------------------------------------
echo +++++++++  NODE NPM INSTALL STARTED  ++++++++++++
echo -------------------------------------------------
sudo apt install nodejs -y
sudo apt install npm -y
echo "Node version"
nodejs -v
echo "NPM version"
npm -v
echo -------------------------------------------------
echo ++++++++ NODE NPM INSTALL COMPLETED    ++++++++++            
echo -------------------------------------------------

echo -------------------------------------------------
echo +++++  NPM BASE MODULES INSTALL STARTED  ++++++++
echo +++++++++ EXPRESS - PM2 -  MYSQL2 +++++++++++++++ 
echo -------------------------------------------------

sudo npm install -g express
sudo npm install -g pm2
sudo npm install -g mysql2

echo -------------------------------------------------
echo ++++++++  NPM MODULES INSTALL COMPLETED  ++++++++              
echo -------------------------------------------------