<?php 
$data = shell_exec('tail -13 /var/www/server-b-data/sys_stat_log');
$data = str_replace("'", '"',$data);
$data = str_replace("], ]", ']]',$data);

$new_json =  '{"data":['.$data.']}'; 
echo json_encode($new_json);
?>