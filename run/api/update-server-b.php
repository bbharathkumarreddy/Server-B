<?php
echo 'git update started<br>';
$a = shell_exec("sudo bash /var/www/server-b/bash/scripts/server-b-git-update.sh");
echo $a;
echo shell_exec('ls'); 
echo '<br>complete';
?>