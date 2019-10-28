<?php
$status = 'fail';
if(isset($_GET['cmd']) && $_GET['cmd'] == 'shutdown'){ 
    $data = shell_exec('sudo shutdown');
    $status = 'success';
}
elseif(isset($_GET['cmd']) && $_GET['cmd'] == 'reboot'){ 
    $data = exec('sudo /sbin/reboot');
    $status = 'success';
}
echo $status.'<br>'.$data;
?>