<?php
echo 'git update started<br>';
print_r(shell_exec("sudo bash /var/www/server-b/bash/scripts/server-b-git-update.sh"));
echo '<br>complete';
?>