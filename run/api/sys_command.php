<?php
echo 'user-'.shell_exec('whoami');
$status = 'fail';
if(isset($_GET['cmd']) && $_GET['cmd'] == 'shutdown'){ 
    $data = shell_exec("sudo -u www-data  /bin/shutdown");
    $status = 'success';
}
elseif(isset($_GET['cmd']) && $_GET['cmd'] == 'reboot'){ 
    $data = shell_exec("sudo reboot");
    $status = 'success';
}
echo $status.'<br>'.$data;
?>