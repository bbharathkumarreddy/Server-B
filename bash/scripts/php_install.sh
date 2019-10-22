#!/bin/bash
echo -------------------------------------------------
echo +++++++++++  PHP INSTALL STARTED  +++++++++++++++
echo -------------------------------------------------
sudo apt install php-fpm php-mysql -y
echo "PHP Version"
php -r 'echo PHP_VERSION;'
echo -------------------------------------------------
echo xxxxxxxxxx  PHP INSTALL COMPLETED     xxxxxxxxxxx
echo -------------------------------------------------