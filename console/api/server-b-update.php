<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
echo '<b>---------------------------------------------------------------------------------------------<br>';
echo '..............................Server B Update Started....................................................<br>';
echo '---------------------------------------------------------------------------------------------</b><br>';
echo shell_exec("cd /var/www/server-b/ && git stash").'<br>';
echo shell_exec("cd /var/www/server-b/ && git reset").'<br>';
echo '<br><b>Info:</b>';
slack_triggers('Server B Application Started \n master'.date("Y-m-d").'.'.date("h:i:sa").' Start');
echo shell_exec("cd /var/www/server-b/ && git pull origin master");
echo '<br>';
echo shell_exec("bash /var/www/server-b/bash/scripts/update-formation.sh").'<br>';
echo shell_exec("chmod -R 777 /var/www/server-b");
echo shell_exec("chmod -R 777 /var/www/server-b-data").'<br>';
echo shell_exec("bash /var/www/server-b/system/scripts/service.sh setKey update_date ".date("Y-m-d").'.'.date("h:i:sa"));
echo '<br>complete<br>';
slack_triggers('Server B Application Completed \n master'.date("Y-m-d").'.'.date("h:i:sa").' Pass');
echo '<b>---------------------------------------------------------------------------------------------<br>';
echo '..............................Server B Update Completed..............................................<br>';
echo '---------------------------------------------------------------------------------------------</b><br>';
function slack_triggers($message){
  try {
      $service='bash /var/www/server-b/system/scripts/service.sh';
      $slack_webhook_url=trim(shell_exec($service.' getKey slack_webhook_url'));
      $slack_name=trim(shell_exec($service.' getKey slack_name'));
      $slack_icon_url=trim(shell_exec($service.' getKey slack_icon_url'));
      if($slack_webhook_url != ''){
          $public_server_b_domain = trim(shell_exec($service.' getKey public_server_b_domain'));
          $public_ip = trim(shell_exec($getKey . ' public_ip'));
            if ($public_server_b_domain != '') {
              $public_server_b_access = $public_server_b_domain;
          } else {
              $public_server_b_access = $public_ip;
          }
          if($slack_name == '') { $slack_name = 'Server B'; }
          $data = array('text' => $message.'\n Server B @'.$public_ip, 'username' => $slack_name); 
          if($slack_icon_url != '') { $data['slack_icon_url'] = $slack_icon_url; }
          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL, $slack_webhook_url);
          curl_setopt($ch, CURLOPT_POST, 1);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
          curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30); 
          curl_setopt($ch, CURLOPT_TIMEOUT, 30);
          curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
          curl_exec($ch);
          curl_close($curl);
      }
  }
  catch (exception $e) { }
}
?>