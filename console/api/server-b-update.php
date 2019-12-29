<?php
echo '-------------------------------------------------------------------------------------<br>';
echo '+                          Server B Update Started                                   +<br>';
echo '-------------------------------------------------------------------------------------<br>';
echo shell_exec("cd /var/www/server-b/ && git stash");
echo shell_exec("cd /var/www/server-b/ && git reset");
echo '<br>&nbsp;&nbsp;&nbsp;Note:';
echo shell_exec("cd /var/www/server-b/ && git pull origin dev-z1");
echo '<br>';
echo shell_exec("bash /var/www/server-b/bash/scripts/update-formation.sh");
echo shell_exec("chmod -R 777 /var/www/server-b");
echo shell_exec("chmod -R 777 /var/www/server-b-data");
echo shell_exec("bash /var/www/server-b/system/scripts/service.sh setKey update_date ".date("Y-m-d").'.'.date("h:i:sa"));
echo '<br>complete';
echo '-------------------------------------------------------------------------------------<br>';
echo '+                          Server B Update Completed                                 +<br>';
echo '-------------------------------------------------------------------------------------<br>';
?>