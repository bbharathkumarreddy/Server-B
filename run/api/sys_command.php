<?php
$status = 'fail';
if(isset($_GET['cmd']) && $_GET['cmd'] == 'shutdown'){ 
    $data = shell_exec('shutdown');
    $status = 'success';
}
elseif(isset($_GET['cmd']) && $_GET['cmd'] == 'reboot'){ 
    $data = shell_exec('reboot');
    $status = 'success';
}
echo $status.'<br>'.$data;
?>