<?php 
if(isset($_GET['live']) && $_GET['live'] == 'true')
{   echo 'a';
    $LOAD_1 = get_server_memory_usage();

     echo $LOAD_1;
}
else{
$data = shell_exec('tail -15 /var/www/server-b-data/sys_stat_log');
$data = str_replace("'", '"',$data);
$template = '[TIMESTAMP,CPU,LOAD_1,LOAD_5,LOAD_15,DISK_USAGE,DISK_TOTAL,MEM_USAGE,MEM_TOTAL,NET_RECEIVED,NET_TRANSMITTED,NET_TOTAL]';

$new_json =  '{"data":['.$data.']}';
echo str_replace("],\n]", ']]',$new_json); 
}

function get_server_memory_usage(){

    $free = shell_exec(`free -m`);
  

    return $free;
}
?>