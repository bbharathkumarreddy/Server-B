<?php
echo 'git update started<br>';
echo shell_exec("cd /var/www/server-b/ && sudo git stash");
echo shell_exec("cd /var/www/server-b/ && sudo git reset");
echo shell_exec("cd /var/www/server-b/ && sudo git pull origin dev-z1");
echo shell_exec("sudo chmod -R 777 /var/www/server-b");
echo shell_exec("sudo chmod -R 777 /var/www/server-b-data");
echo shell_exec('ls'); 
echo '<br>complete';
?>