<?php
$date = new DateTime();
$timeZone = $date->getTimezone();
echo $timeZone->getName().PHP_EOL;
echo date("Y-m-d h:i:sa").PHP_EOL;
phpinfo();
?>