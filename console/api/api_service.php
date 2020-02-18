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
        if(strval($_GET['status']) == 'true') $status = 'enable';
        else $status = 'disable';
        echo shell_exec('sudo ufw --force '.$status);
        echo '\n Server B =>ufw firewall Successully';
    }
    else if ($o == 'remove_ufw_rule') {
        $ufw_id= $_GET['id'];
        echo shell_exec('sudo ufw --force delete '.$ufw_id);
        echo '\n Server B =>ufw firewall updated Successully';
    }
    else if ($o == 'add_ufw_rule') {
        $ufw_string= $_GET['rule'];
        $bash_string = 'sudo ufw '.$ufw_string;
        echo $bash_string;
        echo shell_exec($bash_string);
        echo '\n Server B =>ufw firewall updated Successully';
    }
    else if ($o == 'cmd_exe') {
        $cmd_exe= base64_decode($_GET['cmd']);
        print_r(shell_exec($cmd_exe));
    }
    else if ($o == 'git_process') {
        if(!isset($_GET['mode'])){
            echo 'Invalid Git Button'; exit;
        }
        $git_folder_path = trim(shell_exec($service.' getKey git_folder_path'));
        $git_repo = trim(shell_exec($service.' getKey git_repo'));
        if($git_folder_path == '' || $git_repo == '') echo 'GIT folder path and GIT Repository is not configured';
        if($_GET['mode'] == 'status') { 
            $a = (shell_exec('cd '.$git_folder_path.' && git status')); 
            if($a == '') echo 'No such file or directory or git repository pulled';
            else print_r($a);
            exit; 
        }
        else if($_GET['mode'] == 'stash') { 
            $a = (shell_exec('cd '.$git_folder_path.' && git stash')); exit;
            if($a == '') echo 'No such file or directory or git repository pulled';
            else print_r($a);
            exit;     
        }
        else if($_GET['mode'] == 'reset') { 
            $a = (shell_exec('cd '.$git_folder_path.' && git reset')); exit; 
            if($a == '') echo 'No such file or directory or git repository pulled';
            else print_r($a);
            exit; 
        }
        else if($_GET['mode'] == 'git_trigger_enable') { 
            $a = shell_exec($service.' setKey git_trigger_enable enable');
            print_r($a);
            exit; 
        }
        else if($_GET['mode'] == 'git_trigger_disable') { 
            $a = shell_exec($service.' setKey git_trigger_enable disable');
            print_r($a);
            exit; 
        }
        else {
            print_r('Invalid Git Function');
            exit;    
        }
    }
    else if($o == 'script_play') {
        if(!isset($_GET['type'])) {
            echo 'script type not defined'; exit; 
        }
        if($_GET['type'] == 'general') $type = 'general.sh';
        else if($_GET['type'] == 'reboot') $type = 'reboot.sh';
        else {  echo 'Invalid script type'; exit;  }
        $a = shell_exec('sudo bash /var/www/server-b-data/'.$type);
        print_r($a);
        exit; 
    }
    else if ($o == 'git_save') {
        if(!isset($_GET['folder_path']) || trim($_GET['folder_path']) == '' || !isset($_GET['git_repo']) || trim($_GET['git_repo']) == '')
        {
            echo 'GIT Folder Path and GIT Repository is mandatory'; exit;
        }
        $folder_path = trim($_GET['folder_path']);
        $git_repo = trim(base64_decode($_GET['git_repo']));
        $git_username = trim(base64_decode($_GET['git_username']));
        $git_password = trim(base64_decode($_GET['git_password']));
        $git_branch = trim($_GET['git_branch']);
        if($git_branch == '') $git_branch = 'master';
        $ip_list = trim($_GET['ip_list']);
        echo shell_exec($service.' setKey git_folder_path '.$folder_path);
        echo shell_exec($service.' setKey git_repo '.$git_repo);
        echo shell_exec($service.' setKey git_username '.$git_username);
        echo shell_exec($service.' setKey git_password '.$git_password);
        echo shell_exec($service.' setKey git_ip_list '.$ip_list);
        echo shell_exec($service.' setKey git_branch '.$git_branch);
        echo 'Git Saved Successfully';
    }
    else if ($o == 'change_port') {
        $port_mode= $_GET['port_mode'];
        $port_value= $_GET['port_value'];
        if($port_value < 1 && $port_value > 65535) { echo 'Port is not numberic or out of range'; exit; }
        if($port_mode == 'ssh') $cmd=$service.' ssh_port_set '.$port_value;
        else if($port_mode == 'mysql') $cmd=$service.' config_mysql '.$port_value.' 0.0.0.0';
        else { echo 'Updation of '.$port_mode.' Port is not supported'; exit; }
        print_r(shell_exec($cmd));
    }
    else if ($o == 'app_install') {
        $app_name = $_GET['name'];
        include('./app_list.php');
        if(!isset($app_list[$app_name])) {  echo 'App not found'; exit(); }
        for($i=1;$i<6;$i++){
            $scr = $app_list[$app_name]['script_'.$i];
            if($i==1 && $scr == '') { echo 'No install scripts to execute; Exiting'; exit(); }
            if($scr != '') print_r(shell_exec($scr));            
        }
        echo 'Installation complete:'.$_GET['name'];
        
    }
    else if ($o == 'app_delete') {
        $app_name = $_GET['name'];
        include('./app_list.php');
        if(!isset($app_list[$app_name])) {  echo 'App not found'; exit(); }
        if($app_list[$app_name]['protect'] == true) {  echo 'Cannot delete protected apps'; exit(); }
        for($i=1;$i<4;$i++){
            $scr = $app_list[$app_name]['uninstall_script_'.$i];
            if($i==1 && $scr == '') { echo 'No deletion scripts to execute; Exiting'; exit(); }
            if($scr != '') print_r(shell_exec($scr));            
        }
        echo 'Deletion complete:'.$_GET['name'];
    }
    else{
        echo 'Server - B No Operation found';
    }
} else {
    echo 'Server - B No Operation found';
}
