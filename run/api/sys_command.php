<?php
$status = 'fail';
if(isset($_GET['cmd']) && $_GET['cmd'] == 'shutdown'){ 
    $data = shell_exec("bash /var/www/server-b/bash/scripts/shutdown.sh");
    $status = 'success';
}
elseif(isset($_GET['cmd']) && $_GET['cmd'] == 'reboot'){ 
    $data = shell_exec("bash /var/www/server-b/bash/scripts/reboot.sh");
    $status = 'success';
}
echo $status.'<br>'.$data;
?>