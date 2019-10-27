<?php
echo 'git update started<br>';
echo shell_exec("cd /var/www/server-b/ && sudo git pull origin dev-z1");
echo shell_exec("cd /var/www/server-b/ && sudo git stash");
echo shell_exec("cd /var/www/server-b/ && sudo git reset");
echo shell_exec("cd /var/www/server-b/ && sudo git pull origin dev-z1");

echo shell_exec("sudo bash /var/www/server-b/bash/scripts/server-b-git-update.sh");

echo shell_exec('ls'); 
echo '<br>complete';
?>