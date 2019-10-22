#!/bin/bash
echo -------------------------------------------------
echo +++++++++++++  PHP ACCESS ROOT  +++++++++++++++++
echo -------------------------------------------------

echo 'Automatic php cannot be set to root access. Follow the manual steps below using terminal'
echo 'Step 1 : go to /etc/php/7.2/fpm/pool.d/www.conf use command => `sudo nano /etc/php/7.2/fpm/pool.d/www.conf`';
echo 'Step 2 : find `user = www-data` and `user = www-data` change it to   `user = root` and `user = root` ';
echo 'Step 3 : save the file by using `CTRL + x`';
echo 'Step 4 : go to /lib/systemd/system/php5-fpm.service use command => `sudo nano /lib/systemd/system/php5-fpm.service`';
echo 'Step 5 : add the -R flag to the end of the ExecStart line (to run as root) and save file by using `CTRL + x`';
echo 'Step 6 : use command `systemctl daemon-reload`';
echo 'Step 7 : use command `service php7.2-fpm stop`'
echo 'Step 7 : use command `service php7.2-fpm start`'
echo "Step 8 : use command `php -r 'echo exec("whoami");'`";

echo 'Last command should return `root` if root access is applied successfully'; 
echo -------------------------------------------------
echo xxxxxxx  PHP ACCESS ROOT PROCESS END    xxxxxxxxx
echo -------------------------------------------------