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
        echo 'Server B =>'.$service_name.' Service Starting';
    }
    else if ($o == 'service_restart') {
        $service_name = $_GET['service_name'];
        echo shell_exec('sudo service '.$service_name.' restart');
        echo 'Server B =>'.$service_name.' Service Restarting';
    }
    else if ($o == 'service_stop') {
        $service_name = $_GET['service_name'];
        echo shell_exec('sudo service '.$service_name.' stop');
        echo 'Server B =>'.$service_name.' Service Stopping';
    }
    else if ($o == 'service_status') {
        $service_name = $_GET['service_name'];
        echo shell_exec('sudo service '.$service_name.' status');
        echo 'Server B =>'.$service_name.' Service Status';
    }
    else{
        echo 'Server - B No Operation found';
    }
} else {
    echo 'Server - B No Operation found';
}