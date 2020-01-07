<?php
if (isset($_GET['o'])) {
    $service='bash /var/www/server-b/system/scripts/service.sh';
    $o = $_GET['o'];
    if ($o == 'shutdown') {
        echo shell_exec($service.' shutdown');
        echo 'Server Shuting Down After 1min';
    }
    else if ($o == 'restart') {
        echo shell_exec($service.' restart');
        echo 'Restarting System Now';
    }
    else if ($o == 'service_start') {
        $service_name = $_GET['service_name'];
        echo shell_exec('sudo service '.$service_name.' start');
        echo '\n Server B =>'.$service_name.' Service Starting';
    }
    else if ($o == 'service_restart') {
        $service_name = $_GET['service_name'];
        echo shell_exec('sudo service '.$service_name.' restart');
        echo '\n Server B =>'.$service_name.' Service Restarting';
    }
    else if ($o == 'service_stop') {
        $service_name = $_GET['service_name'];
        echo shell_exec('sudo service '.$service_name.' stop');
        echo '\n Server B =>'.$service_name.' Service Stopping';
    }
    else if ($o == 'service_status') {
        $service_name = $_GET['service_name'];
        echo shell_exec('sudo service '.$service_name.' status');
        echo '\n Server B =>'.$service_name.' Service Status';
    }
    else if ($o == 'system_stat_current') {
        $stat=shell_exec($service.' system_stat_current');
        $stat=explode(',',$stat);
        $stat=str_replace('"','',$stat);
        $stat=str_replace("'",'',$stat);
        $stat=str_replace("\n",'',$stat);
        $stat_arr = [];
        foreach($stat as $stat_each){
            if($stat_each == ',') continue;
            else if($stat_each == '') continue;
            $stat_arr[]=$stat_each;
        }
        echo json_encode($stat_arr);
    }
    else if ($o == 'clear_ram') {
        echo shell_exec($service.' clear_ram');
        echo '\n Server B =>RAM Cleared';
    }
    else if ($o == 'add_log_point') {
        $file_name=$_GET['file_name'];
        $file_path=$_GET['file_path'];
        echo shell_exec($service.' addLogFile '.$file_name.' '.$file_path);
        echo '\n Server B =>File Added';
    }
    else if ($o == 'remove_log_point') {
        $file_name=$_GET['file_name'];
        echo shell_exec($service.' removeLogFile '.$file_name);
        echo '\n Server B =>File Added';
    }
    else if ($o == 'publish_cron_file') {
        echo shell_exec($service.' publish_cron_file');
        echo '\n Server B =>Cron Added Successully';
    }
    else if ($o == 'update_ufw_status') {
        if($_GET['status'] == true) $status = 'enable';
        else $status = 'disable';
        echo shell_exec('sudo ufw --force '.$status);
        echo '\n Server B =>ufw firewall Successully';
    }else if ($o == 'remove_ufw_rule') {
        $ufw_id= $_GET['id'];
        echo shell_exec('sudo ufw --force delete '.$ufw_id);
        echo '\n Server B =>ufw firewall updated Successully';
    }
    else{
        echo 'Server - B No Operation found';
    }
} else {
    echo 'Server - B No Operation found';
}
