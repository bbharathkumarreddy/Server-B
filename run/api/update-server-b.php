<?php
echo 'git update started';
$a = exec("sudo bash /var/www/server-b/scripts/server-b-git-update.sh");
echo $a;
echo 'complete';
?>