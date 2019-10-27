<?php 
$data  = shell_exec('tail -30 /var/www/server-b-data/sys_stat_log');
$data = str_replace("'", '"',$data);
$data = substr($data, 0, -1);

echo '{"data":'.$data.'}'; 
?>