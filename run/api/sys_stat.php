<?php 
$data = shell_exec('tail -13 /var/www/server-b-data/sys_stat_log');
$data = str_replace("'", '"',$data);

$new_json =  '{"data":['.$data.']}';
echo str_replace("],\n]", ']]',$new_json); 
?>