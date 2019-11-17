<?php 
if(isset($_GET['live']) && $_GET['live'] == 'true')
{   $LOAD_1 = shell_exec('bash /var/www/server-b/bash/scripts/sys_stat_live.sh');
    echo "{data:".$LOAD_1."}";
}
else{
$data = shell_exec('tail -15 /var/www/server-b-data/sys_stat_log');
$data = str_replace("'", '"',$data);
$template = '[TIMESTAMP,CPU,LOAD_1,LOAD_5,LOAD_15,DISK_USAGE,DISK_TOTAL,MEM_USAGE,MEM_TOTAL,NET_RECEIVED,NET_TRANSMITTED,NET_TOTAL]';

$new_json =  '{"data":['.$data.']}';
header('Content-Type: application/json');
echo str_replace("],\n]", ']]',$new_json); 
}

function get_server_memory_usage(){

    $free = shell_exec('free -m');
  

    return $free;
}
?>