<?php
echo '<b>---------------------------------------------------------------------------------------------<br>';
echo '..............................Server B Update Started....................................................<br>';
echo '---------------------------------------------------------------------------------------------</b><br>';
echo shell_exec("cd /var/www/server-b/ && git stash").'<br>';
echo shell_exec("cd /var/www/server-b/ && git reset").'<br>';
echo '<br><b>Info:</b>';
echo shell_exec("cd /var/www/server-b/ && git pull origin dev-z1");
echo '<br>';
echo shell_exec("bash /var/www/server-b/bash/scripts/update-formation.sh").'<br>';
echo shell_exec("chmod -R 777 /var/www/server-b");
echo shell_exec("chmod -R 777 /var/www/server-b-data").'<br>';
echo shell_exec("bash /var/www/server-b/system/scripts/service.sh setKey update_date ".date("Y-m-d").'.'.date("h:i:sa"));
echo '<br>complete<br>';
echo '<b>---------------------------------------------------------------------------------------------<br>';
echo '..............................Server B Update Completed.............................................<br>';
echo '---------------------------------------------------------------------------------------------</b><br>';
?>