<?php
echo 'git update started<br>';
echo shell_exec("cd /var/www/server-b/ && git stash");
echo shell_exec("cd /var/www/server-b/ && git reset");
echo shell_exec("cd /var/www/server-b/ && git pull origin dev-z1");
echo shell_exec("bash /var/www/server-b/bash/scripts/update-formation.sh");
echo shell_exec("chmod -R 777 /var/www/server-b");
echo shell_exec("chmod -R 777 /var/www/server-b-data");
echo '<br>complete';
?>