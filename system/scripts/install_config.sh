# Change the below configuration variables before installation
# This file is used only once for installation
# main configuration file will be generated in /var/www/server-b-data/config.sh for future use

# Note: change server_name , server_b_username, server_b_password for security reasons (Must connect to new port after restart)
server_name='Server B'
server_b_username='username'
server_b_password='password'
# Note: change install_node_js to true to install node js npm
install_node_js='false'
# Note: change install_mysql to true to install mysql
install_mysql='false'
mysql_password='6v48wmzqa'
# Note: change mysql_port for security reasons (Must connect to new port after restart)
mysql_port='3306'
mysql_alt_user='ubu'
mysql_alt_pwd='ppp'
site_path='/var/www/site/'
time_zone='Etc/UTC'
# Note: change ssh_port for security reasons (Must connect to new port after restart)
ssh_port='22'
shell_in_a_box_username='new_username'
shell_in_a_box_password='new_password'
# public_server_b_domain (Leave Blank or eg. monitor.example.com)
public_server_b_domain=''
server_b_port='2053'
shell_in_box_access_port='2083'
shell_in_box_port='8888'
hosting_link=''
ping_1_link=''
ping_2_link=''
domain=''
#Note: Don't Change below variables unless required
server_b_main_path='/var/www/server-b/'
server_b_data_path='/var/www/server-b-data/'
server_b_config_path=${server_b_data_path}'config.sh'
logpoint_path=${server_b_data_path}'logpoint.sh'

server_b_path=${server_b_main_path}
server_b_data_path=${server_b_data_path}
server_b_config_path=${server_b_config_path}
system_path=${server_b_main_path}'system/'
scripts_path=${server_b_main_path}'system/scripts/'
files_path=${server_b_main_path}'system/files/'
backup_path=${server_b_main_path}'system/bck/'
console_path=${server_b_main_path}'console/'
app_path=${server_b_main_path}'console/app/'
api_path=${server_b_main_path}'console/api/'
os='Ubuntu'
dashboard_refresh='10000'
public_ip=''
private_ip=''
php_ini=''
php_service=''
server_b_v='2.01'
server_b_auth_key=''
cron_file=${server_b_data_path}'cron'
temp_cron=${server_b_data_path}'cron_temp'
update_date=''
git_folder_path=''
git_url=''
git_ip_list=''
git_branch='master'
git_trigger_enable='disable'
server_twp_hash_path=$server_b_data_path'.htpasswd'