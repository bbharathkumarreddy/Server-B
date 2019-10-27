#!/bin/bash
CPU=$(top -bn1 | grep load | awk '{printf "%.2f\n", $(NF-2)}')
DISK_USAGE=$(df -h | awk '$NF=="/"{printf "%.1f\n", $3}')
DISK_TOTAL=$(df -h | awk '$NF=="/"{printf "%.1f\n", $2}')
MEM_USAGE=$(free -m | awk 'NR==2{printf "%s\n", $3}')
MEM_TOTAL=$(free -m | awk 'NR==2{printf "%s\n", $2}')
TIMESTAMP=$(date +%s)

LINE=`grep ens4 /proc/net/dev | sed s/.*://`;
NET_RECEIVED=`echo $LINE | awk '{print $1}'`
NET_TRANSMITTED=`echo $LINE | awk '{print $9}'`
NET_TOTAL=$(($NET_RECEIVED+$NET_TRANSMITTED))

DATA_STRING="["${TIMESTAMP}","${CPU}","${DISK_USAGE}","${DISK_TOTAL}","${MEM_USAGE}","${MEM_TOTAL}","${NET_RECEIVED}","${NET_TRANSMITTED}","${NET_TOTAL}"],"
echo ${DATA_STRING} >> /var/www/server-b-data/sys_stat_log