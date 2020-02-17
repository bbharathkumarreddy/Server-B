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

echo shell_exec($service.' getKey git_folder_path');
echo shell_exec($service.' getKey git_url');
echo shell_exec($service.' getKey git_branch');
echo 'Success';exit;
echo '<b>---------------------------------------------------------------------------------------------<br>';
echo '.............................Server Update Started....................................................<br>';
echo '---------------------------------------------------------------------------------------------</b><br>';
echo shell_exec("cd /var/www/html/ && git stash").'<br>';
echo shell_exec("cd /var/www/html/ && git reset").'<br>';
echo '<br><b>Info:</b>';

echo '<br>';
echo shell_exec("bash /var/www/html/bash/scripts/git_before_script.sh").'<br>';
echo shell_exec("cd /var/www/html/ && git pull origin master");
echo shell_exec("bash /var/www/html/bash/scripts/git_after_script.sh").'<br>';
echo shell_exec("chmod -R 777 /var/www/html");
echo shell_exec("chmod -R 777 /var/www/html-data").'<br>';
echo shell_exec("bash /var/www/html/system/scripts/service.sh setKey update_date ".date("Y-m-d").'.'.date("h:i:sa"));
echo '<br>complete<br>';
echo '<b>---------------------------------------------------------------------------------------------<br>';
echo '..............................Server Update Completed..............................................<br>';
echo '---------------------------------------------------------------------------------------------</b><br>';
?>