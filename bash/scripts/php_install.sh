#!/bin/bash
echo -------------------------------------------------
echo +++++++++++  PHP INSTALL STARTED  +++++++++++++++
echo -------------------------------------------------
sleep 5
sudo apt install php-fpm php-mysql -y
echo "PHP Version"
php -r 'echo PHP_VERSION;'
sleep 5
echo -------------------------------------------------
echo xxxxxxxxxx  PHP INSTALL COMPLETED     xxxxxxxxxxx
echo -------------------------------------------------