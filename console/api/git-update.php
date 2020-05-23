<?php
if(!isset($_GET['tid']) || (isset($_GET['tid']) && $_GET['tid'] == '')){
    header("HTTP/1.0 400 Bad Request");
    die(json_encode(array('message'=>'TID Missing Bad Request')));
}
if(!isset($_GET['key']) || (isset($_GET['key']) && $_GET['key'] == '')){
    header("HTTP/1.0 403 Access Denied");
    die(json_encode(array('message'=>'Access Denied Key Missing')));
}
$service='bash /var/www/server-b/system/scripts/service.sh';
$server_b_auth_key = trim(shell_exec($service.' getKey server_b_auth_key'));
if($server_b_auth_key == ''){
    history_write(array('failed'=>'server_b_auth_key parameter is missing from config.sh file; /var/www/server-b-data/config.sh;'),$tid);
    header("HTTP/1.0 403 Key Configuration Missing");
    die(json_encode(array('message'=>'Key Configuration Missing')));
} else if(trim($server_b_auth_key) != trim($_GET['key'])) {
    history_write(array('failed'=>'server_b_auth_key and key from paylaod is not matched, Hence Unauthorized;'),$tid);
    header("HTTP/1.0 403 Unauthorized");
    die(json_encode(array('message'=>'Unauthorized')));
}
$tid_encr = base64_decode($_GET['tid']);
$tid=str_replace($server_b_auth_key,'',$tid_encr);

$git_trigger_enable = trim(shell_exec($service.' getKey git_trigger_enable_'.$tid));
if($git_trigger_enable != 'enable') {
    header("HTTP/1.0 400 Bad Request");
    die(json_encode(array('message'=>'Bad Request')));
}

$git_ip_list = trim(shell_exec($service.' getKey git_ip_list_'.$tid));
if($git_ip_list != '')
{   
    $ip = ip_get();
    if(!cidr_match($ip, $git_ip_list)){
        header("HTTP/1.0 403 Access Denied");
        die(json_encode(array('message'=>'Access Denied'))); 
    }
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
    if(!$allow) history_write(array('failed'=>'IP Access Denied by rule for => '.$ip_check.' ;'),$tid);
    return $allow;
}
history_write(array('allowed'=>'true'),$tid);
function history_write($message,$tid){
    $message['time']=date("Y-m-d h:i:sa", time());
    $message['trigger-ip']=ip_get();
    $fp = fopen('/var/www/server-b-data/git_trigger_history_'.$tid.'.txt', 'w');
    fwrite($fp,json_encode(array($message,$_GET,$_POST,json_decode(file_get_contents('php://input')))));
    fclose($fp);
}

function slack_triggers($message){
    try {
        $service='bash /var/www/server-b/system/scripts/service.sh';
        $slack_webhook_url=trim(shell_exec($service.' getKey slack_webhook_url'));
        $slack_name=trim(shell_exec($service.' getKey slack_name'));
        $slack_icon_url=trim(shell_exec($service.' getKey slack_icon_url'));
        if($slack_webhook_url != ''){
            if($slack_name == '') { $slack_name = 'Server B'; }
            $data = array('text' => $message, 'username' => $slack_name);     
            if($slack_icon_url != '') { $data['slack_icon_url'] = $slack_icon_url; }
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $slack_webhook_url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30); 
            curl_setopt($ch, CURLOPT_TIMEOUT, 30);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_exec($ch);
            curl_close($ch);
        }
    }
    catch (exception $e) { }
}

$git_folder_path=trim(shell_exec($service.' getKey git_folder_path_'.$tid));
$git_repo=trim(shell_exec($service.' getKey git_repo_'.$tid));
$git_username=urlencode(trim(shell_exec($service.' getKey git_username_'.$tid)));
$git_password=urlencode(trim(shell_exec($service.' getKey git_password_'.$tid)));
$git_repo_parse=parse_url($git_repo);
$git_url=$git_repo_parse['scheme'].'://'.$git_username.':'.$git_password.'@'.$git_repo_parse['host'].$git_repo_parse['path'];
$git_branch=trim(shell_exec($service.' getKey git_branch_'.$tid));
$resp_0 = exec('mkdir -p '.$git_folder_path.' 2>&1');
$resp = exec('cd '.$git_folder_path.' && git status 2>&1');
$git_logs = fopen('/var/www/server-b-data/git_logs.txt', 'a');
if(filesize('/var/www/server-b-data/git_logs.txt') > 5000000){
    $string = shell_exec( 'tail -n 5000 /var/www/server-b-data/git_logs.txt');
    fwrite($git_logs, $string);
}
echo '<b>---------------------------------------------------------------------------------------------<br>';
echo '...........................  Server Update Started GIT Trigger  ..................................<br>';
echo '---------------------------------------------------------------------------------------------</b><br>';
echo 'Trigger Started<br><br>';
echo '<b>Repository</b> => '.$git_repo.'<br><br>';
$git_branch_n = $git_branch;
if($git_branch_n == '') { $git_branch_n = 'Default Master'; }
if(strpos($resp, 'ot a git repository') !== false){
    fwrite($git_logs, date('Y-m-d H:i:s').' Repo '.$tid.' -> New Deployment -> '.$git_repo_parse['path'].' Start'.PHP_EOL);
    slack_triggers("New Deployment -> Repo ".$tid." ".$git_repo_parse['path']."\nBranch -> ".$git_branch_n." - ".date("Y-m-d H:i:s")."\nStarted");
    $cmd  = 'git clone -b '.$git_branch.' '.$git_url.' '.$git_folder_path.' 2>&1';
    echo exec($cmd);
    fwrite($git_logs, date('Y-m-d H:i:s').' Repo '.$tid.' -> GIT Cloning -> '.$git_repo_parse['path'].' Pass'.PHP_EOL);
    slack_triggers("GIT Cloning -> Repo ".$tid." ".$git_repo_parse['path']."\nBranch -> ".$git_branch_n." - ".date("Y-m-d H:i:s")."\nPass");
    echo '<br><b>Info: Created git clone in '.$git_folder_path.'</b><br>';
    if (file_exists($git_folder_path.'/deployment.sh')) {
        fwrite($git_logs, date('Y-m-d H:i:s').' Repo '.$tid.' -> Auto Deploy Script Started -> '.$git_repo_parse['path'].' Start'.PHP_EOL);
        slack_triggers("Auto Deploy Script Started -> Repo ".$tid." ".$git_repo_parse['path']."\nBranch -> ".$git_branch_n." - ".date("Y-m-d H:i:s")."\nStarted");
        echo "<br>====== Auto Deployment Script Started ======<br>";
        echo exec('bash '.$git_folder_path.'/deployment.sh');
        echo "<br>====== Auto Deployment Completed ======<br>";
        fwrite($git_logs, date('Y-m-d H:i:s').' Repo '.$tid.' -> Auto Deploy Script Completed -> '.$git_repo_parse['path'].' Pass'.PHP_EOL);
        slack_triggers("Auto Deploy Script Completed -> Repo ".$tid." ".$git_repo_parse['path']."\nBranch -> ".$git_branch_n." - ".date("Y-m-d H:i:s")."\nPass");
    }
    
} else {
    if (file_exists($git_folder_path.'/before_update.sh')) {
        fwrite($git_logs, date('Y-m-d H:i:s').' Repo '.$tid.' -> Before Update Script Started -> '.$git_repo_parse['path'].' Start'.PHP_EOL);
        slack_triggers("Before Update Script Started -> Repo ".$tid." ".$git_repo_parse['path']."\nBranch -> ".$git_branch_n." - ".date("Y-m-d H:i:s")."\nStarted");
        echo "<br>====== Auto Before Update Script Started ======<br>";
        echo exec('bash '.$git_folder_path.'/before_update.sh 2>&1').'<br>';
        echo "<br>====== Auto Before Update Completed ======<br>";
        fwrite($git_logs, date('Y-m-d H:i:s').' Repo '.$tid.' -> Before Update Script Completed -> '.$git_repo_parse['path'].' Pass'.PHP_EOL);
        slack_triggers("Before Update Script Completed -> Repo ".$tid." ".$git_repo_parse['path']."\nBranch -> ".$git_branch_n." - ".date("Y-m-d H:i:s")."\nPass");
    } 
    echo exec("cd ".$git_folder_path." && git stash 2>&1").'<br>';
    echo exec("cd ".$git_folder_path." && git reset 2>&1").'<br>';
    echo '<br><b>Info:</b>';
    fwrite($git_logs, date('Y-m-d H:i:s').' Repo '.$tid.' -> GIT Update Triggered -> '.$git_repo_parse['path'].' Start'.PHP_EOL);
    slack_triggers("GIT Update Triggered -> Repo ".$tid." ".$git_repo_parse['path']."\nBranch -> ".$git_branch_n." - ".date("Y-m-d H:i:s")."\nStarted");
    echo exec("cd ".$git_folder_path." && git pull ".$git_url." ".$git_branch."  2>&1").'<br>';
    fwrite($git_logs, date('Y-m-d H:i:s').' Repo '.$tid.' -> GIT Update Completed -> '.$git_repo_parse['path'].' Pass'.PHP_EOL);
    slack_triggers("GIT Update Completed -> Repo ".$tid." ".$git_repo_parse['path']."\nBranch -> ".$git_branch_n." - ".date("Y-m-d H:i:s")."\nPass");
    if (file_exists($git_folder_path.'/after_update.sh')) {
        fwrite($git_logs, date('Y-m-d H:i:s').' Repo '.$tid.' -> After Update Script Found & Started -> '.$git_repo_parse['path'].' Pass'.PHP_EOL);
        slack_triggers("After Update Script Started -> Repo ".$tid." ".$git_repo_parse['path']."\nBranch -> ".$git_branch_n." - ".date("Y-m-d H:i:s")."\nStarted");
        echo "<br>====== Auto After Update Script Found & Started ======<br>";
        echo exec('bash '.$git_folder_path.'/after_update.sh 2>&1').'<br>';
        echo "<br>====== Auto After Update Completed ======<br>";
        fwrite($git_logs, date('Y-m-d H:i:s').' Repo '.$tid.' -> After Update Script Completed -> '.$git_repo_parse['path'].' Pass'.PHP_EOL);
        slack_triggers("After Update Script Completed -> Repo ".$tid." ".$git_repo_parse['path']."\nBranch -> ".$git_branch_n." - ".date("Y-m-d H:i:s")."\nPass");
    }
}
echo "<br>";

echo '<br>Completed<br>';
echo '<b>---------------------------------------------------------------------------------------------<br>';
echo '...........................  Server Update Completed  GIT Trigger  ............................<br>';
echo '---------------------------------------------------------------------------------------------</b><br>';
?>