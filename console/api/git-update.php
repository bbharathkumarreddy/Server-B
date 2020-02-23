<?php
$service='bash /var/www/server-b/system/scripts/service.sh';
$git_trigger_enable = trim(shell_exec($service.' getKey git_trigger_enable'));
if($git_trigger_enable != 'enable') {
    header("HTTP/1.0 400 Bad Request");
    die(json_encode(array('message'=>'Bad Request')));
}
if(!isset($_GET['key']) || (isset($_GET['key']) && $_GET['key'] == '')){
    history_write(array('failed'=>'Key missing from get parameter;'));
    header("HTTP/1.0 403 Access Denied");
    die(json_encode(array('message'=>'Access Denied')));
}
$git_ip_list = trim(shell_exec($service.' getKey git_ip_list'));
if($git_ip_list != '')
{   
    $ip = ip_get();
    if(!cidr_match($ip, $git_ip_list)){
        header("HTTP/1.0 403 Access Denied");
        die(json_encode(array('message'=>'Access Denied'))); 
    }
}
$server_b_auth_key = trim(shell_exec($service.' getKey server_b_auth_key'));
if($server_b_auth_key == ''){
    history_write(array('failed'=>'server_b_auth_key parameter is missing from config.sh file; /var/www/server-b-data/config.sh;'));
    header("HTTP/1.0 403 Key Configuration Missing");
    die(json_encode(array('message'=>'Key Configuration Missing')));
} else if(trim($server_b_auth_key) != trim($_GET['key'])) {
    history_write(array('failed'=>'server_b_auth_key and key from paylaod is not matched, Hence Unauthorized;'));
    header("HTTP/1.0 403 Unauthorized");
    die(json_encode(array('message'=>'Unauthorized')));
}

function ip_get()
{    
    if(isset($_SERVER['HTTP_CF_CONNECTING_IP'])){
        $ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
    }elseif(!empty($_SERVER['HTTP_CLIENT_IP'])){
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
} 

function cidr_match($ip_check, $git_ip_list)
{   $git_ip_list_ar = explode(',',$git_ip_list);
    $allow = false;
    foreach($git_ip_list_ar as $ip_allow) {
        // If IP has / means CIDR notation
        if(strpos($ip_allow, '/') === false) {
            // Check Single IP
            if(inet_pton($ip_check) == inet_pton($ip_allow)) {
                $allow = true;
                break;
            }
        }
        else {
            // Check IP range
            list($subnet, $bits) = explode('/', $ip_allow);
    
            // Convert subnet to binary string of $bits length
            $subnet = unpack('H*', inet_pton($subnet)); // Subnet in Hex
            foreach($subnet as $i => $h) $subnet[$i] = base_convert($h, 16, 2); // Array of Binary
            $subnet = substr(implode('', $subnet), 0, $bits); // Subnet in Binary, only network bits
    
            // Convert remote IP to binary string of $bits length
            $ip = unpack('H*', inet_pton($ip_check)); // IP in Hex
            foreach($ip as $i => $h) $ip[$i] = base_convert($h, 16, 2); // Array of Binary
            $ip = substr(implode('', $ip), 0, $bits); // IP in Binary, only network bits
    
            // Check network bits match
            if($subnet == $ip) {
                $allow = true;
                break;
            }
        }
    }
    if(!$allow) history_write(array('failed'=>'IP Access Denied by rule for => '.$ip_check.' ;'));
    return $allow;
}
history_write(array('allowed'=>'true'));
function history_write($message){
    $message['time']=date("Y-m-d h:i:sa", time());
    $message['trigger-ip']=ip_get();
    $fp = fopen('/var/www/server-b-data/git_trigger_history.txt', 'w');
    fwrite($fp,json_encode(array($message,$_GET,$_POST,json_decode(file_get_contents('php://input')))));
    fclose($fp);
}

$git_folder_path=trim(shell_exec($service.' getKey git_folder_path'));
$git_repo=trim(shell_exec($service.' getKey git_repo'));
$git_username=urlencode(trim(shell_exec($service.' getKey git_username')));
$git_password=urlencode(trim(shell_exec($service.' getKey git_password')));
$git_repo_parse=parse_url($git_repo);
$git_url=$git_repo_parse['scheme'].'://'.$git_username.':'.$git_password.'@'.$git_repo_parse['host'].$git_repo_parse['path'];
$git_branch=trim(shell_exec($service.' getKey git_branch'));
$resp_0 = exec('mkdir -p '.$git_folder_path.' 2>&1');
$resp = exec('cd '.$git_folder_path.' && git status 2>&1');
echo '<b>---------------------------------------------------------------------------------------------<br>';
echo '...........................  Server Update Started GIT Trigger  ..................................<br>';
echo '---------------------------------------------------------------------------------------------</b><br>';
echo 'Trigger Started<br><br>';
echo '<b>Repository</b> => '.$git_repo.'<br><br>';
if(strpos($resp, 'ot a git repository') !== false){
    $cmd  = 'git clone -b '.$git_branch.' '.$git_url.' '.$git_folder_path.' 2>&1';
    echo exec($cmd);
    echo '<br><b>Info: Created git clone in '.$git_folder_path.'</b>';
    if (file_exists($git_folder_path.'/deployment.sh')) {
        echo "====== Auto Deployment Script Found & Started ======<br>";
        echo exec('bash '.$git_folder_path.'/deployment.sh');
        echo "====== Auto Deployment Completed ======<br>";
    }
    
} else {
    if (file_exists($git_folder_path.'/before_update.sh')) {
        echo "====== Auto Before Update Script Found & Started ======<br>";
        echo exec('bash '.$git_folder_path.'/before_update.sh 2>&1').'<br>';
        echo "====== Auto Before Update Completed ======<br>";
    } 
    echo exec("cd ".$git_folder_path." && git stash 2>&1").'<br>';
    echo exec("cd ".$git_folder_path." && git reset 2>&1").'<br>';
    echo '<br><b>Info:</b>';
    echo exec("cd ".$git_folder_path." && git pull origin ".$git_branch."  2>&1");
    if (file_exists($git_folder_path.'/after_update.sh')) {
        echo "====== Auto After Update Script Found & Started ======";
        echo exec('bash '.$git_folder_path.'/after_update.sh 2>&1').'<br>';
        echo "====== Auto After Update Completed ======";
    }
}
echo '<br>';

echo '<br>Completed<br>';
echo '<b>---------------------------------------------------------------------------------------------<br>';
echo '...........................  Server Update Completed  GIT Trigger  ............................<br>';
echo '---------------------------------------------------------------------------------------------</b><br>';
?>