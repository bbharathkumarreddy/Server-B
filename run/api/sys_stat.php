<?php 
if(isset($_GET['live']) && $_GET['live'] == 'true')
{   echo 'a';
    $LOAD_1 = shell_exec(`free -m`);
 /*   $LOAD_1 = shell_exec("top -bn1 | grep load | awk '{printf "%s\n", $11}");
    LOAD_1=$(top -bn1 | grep load | awk '{printf "%s\n", $10}')
LOAD_5=$(top -bn1 | grep load | awk '{printf "%s\n", $11}')
LOAD_15=$(top -bn1 | grep load | awk '{printf "%s\n", $12}')
CPU=$(top -bn1 | grep load | awk '{printf "%.2f\n", $(NF-2)}')
DISK_USAGE=$(df -h | awk '$NF=="/"{printf "%.1f\n", $3}')
DISK_TOTAL=$(df -h | awk '$NF=="/"{printf "%.1f\n", $2}')
MEM_USAGE=$(free -m | awk 'NR==2{printf "%s\n", $3}')
MEM_TOTAL=$(free -m | awk 'NR==2{printf "%s\n", $2}')
TIMESTAMP=$(date +%s)

LINE=`grep ens4 /proc/net/dev | sed s/.*://`;
NET_RECEIVED=`echo $LINE | awk '{print $1}'`
NET_TRANSMITTED=`echo $LINE | awk '{print $9}'`

NET_RECEIVED=$(($NET_RECEIVED/1000))

NET_TRANSMITTED=$(($NET_TRANSMITTED/1000))*/


     echo $LOAD_1;
}
else{
$data = shell_exec('tail -15 /var/www/server-b-data/sys_stat_log');
$data = str_replace("'", '"',$data);
$template = '[TIMESTAMP,CPU,LOAD_1,LOAD_5,LOAD_15,DISK_USAGE,DISK_TOTAL,MEM_USAGE,MEM_TOTAL,NET_RECEIVED,NET_TRANSMITTED,NET_TOTAL]';

$new_json =  '{"data":['.$data.']}';
echo str_replace("],\n]", ']]',$new_json); 
}
?>