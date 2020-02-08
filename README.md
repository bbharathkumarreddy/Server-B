<h1>SERVER B <small></small></h1>
<br>
Simple Server Management - <small>Web Console</small>
<br>
Open Source Initiative
<br>
<small><b>Supported OS: Ubuntu 14.04 & above</b></small>
<br>
<h5>Copy and Run Below Commands</h5>
<h5>Step 1</h5>
<code>sudo apt update -y && sudo apt-get install git vim -y</code>
<br>
<h5>Step 2</h5>
<code>sudo git clone https://github.com/bbharathkumarreddy/Server-B.git /var/www/server-b/</code>
<br>
<h5>Step 3</h5>
<p><small>Note: Change install_config.sh file before installing</small></p>
<code>sudo vi /var/www/server-b/system/scripts/install_config.sh</code>
<br>
<small>To save file in vi mode use Esc key and type :x and hit Enter key</small>
<h5>Step 4</h5>
<code>sudo bash /var/www/server-b/system/scripts/install.sh</code>
<br>
<br>
<p><b>disclaimer:</b> Server B developers or cubepost is not responsible for any server manipulation, protection, actions and usage; usage of this software or console is solely responsible by the user for any actions or damages</p>
<hr>
<p align="center">
  <img src="https://github.com/bbharathkumarreddy/server-b/blob/master/images/server-b-images.gif?raw=true">
</p>
<hr>
<h5>Server B - commands</h5>
<br>
<p>Show Legends</p>
<code>bash /var/www/server-b/system/scripts/service.sh show_legends</code>
<br>
<p>Get MAC Address</p>
<code>bash /var/www/server-b/system/scripts/service.sh get_mac_address</code>
<br>