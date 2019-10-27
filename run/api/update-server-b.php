<?php
echo 'git update started';
$a = exec("sudo bash /var/www/server-b/bash/scripts/server-b-git-update.sh");
echo $a;
echo 'complete';
?>