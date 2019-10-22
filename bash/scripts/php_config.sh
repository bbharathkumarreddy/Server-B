#!/bin/bash
echo -------------------------------------------------
echo +++++++++++  PHP CONFIG STARTED  +++++++++++++++
echo -------------------------------------------------
cur_php_timezone_string=$(sudo grep  "\bdate.timezone\b" /etc/php/7.2/fpm/php.ini | tail -1);
cur_php_timezone=$(sudo grep  "\bdate.timezone\b" /etc/php/7.2/fpm/php.ini | tail -1 | grep -o '"[^"]\+"');
echo "PHP Current Timezone = ${cur_php_timezone}"

read -p 'Set timezone eg "Asia/Kolkata" (or) "America/New_York"  with double quotes= ' set_new_timezone
sed -i 's,^date.timezone =.*$,date.timezone = '$set_new_timezone',' /etc/php/7.2/fpm/php.ini

echo "Timezone setting complete"
new_php_timezone_string=$(sudo grep  "\bdate.timezone\b" /etc/php/7.2/fpm/php.ini | tail -1 | grep -o '"[^"]\+"');
echo "PHP New Current Timezone = ${new_php_timezone_string}"
sudo service php7.2-fpm reload
sleep 2 
echo -------------------------------------------------
echo xxxxxxxxxxx  PHP CONFIG STARTED     xxxxxxxxxxxx
echo -------------------------------------------------

#timedatectl list-timezones
#sudo timedatectl set-timezone $set_timezone