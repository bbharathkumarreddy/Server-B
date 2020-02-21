<h1>SERVER B</h1>
<p><a href="https://github.com/bbharathkumarreddy/Server-B/blob/master/LICENSE"><img alt="GitHub" src="https://img.shields.io/github/license/bbharathkumarreddy/server-b?label=open%20source%20license&color=success"></a>&nbsp;&nbsp;&nbsp;
<a href="#contributors---hall-of-fame"><img alt="GitHub" src="https://img.shields.io/badge/contributors-Hall%20of%20Fame-brightgreen"></a>&nbsp;&nbsp;&nbsp;
<a href="#"><img alt="GitHub release (latest by date)" src="https://img.shields.io/github/v/release/bbharathkumarreddy/server-b"></a></p>
Simple Server Management - <small>Web Console</small>
<br>
Open Source Initiative
<br>
<small><b>Supported OS: Ubuntu 14.04 & above</b></small>
<br>
<p align="center">
  <img src="https://github.com/bbharathkumarreddy/server-b/blob/master/images/server-b-images.gif?raw=true">
</p>
<hr>
<h4>Copy and Run Below Commands</h4>
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
<hr>
<h3>Server B - General Shell Commands</h3>
<p>Show Legends<br><code>bash /var/www/server-b/system/scripts/service.sh show_legends</code></p>
<p>Get MAC Address<br><code>bash /var/www/server-b/system/scripts/service.sh get_mac_address</code></p>
<p>Get IP Addresses<br><code>bash /var/www/server-b/system/scripts/service.sh load_ip</code></p>
<p>Update - Upgrade Ubuntu<br><code>bash /var/www/server-b/system/scripts/service.sh update_upgrade</code></p>
<p>Get Total Disk Space<br><code>bash /var/www/server-b/system/scripts/service.sh get_disk</code></p>
<p>Get Total RAM Size<br><code>bash /var/www/server-b/system/scripts/service.sh get_mem</code></p>
<p>Update Server B Console Domain<br><code>bash /var/www/server-b/system/scripts/service.sh setKey public_server_b_domain monitor.example.com</code></p>
<hr>
<h3>Server B - Troubleshoot</h3>
<p>Nginx / PHP Service error | 502 bad gateway<br>
<code>bash /var/www/server-b/system/scripts/service.sh php_nginx_root_restart</code></p>
<p>Restart Nginx<br>
<code>service nginx restart</code></p>
<p>Restart PHP <b><sup><small>php&lt;major-version&gt;&lt;minor-version&gt;-fpm</small></sup></b><br>
<code>service php7.0-fpm restart</code></p>
<hr>
<h3>Contributors - Hall of Fame</h3>

<span>🥇 Bharath Kumar Reddy<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://github.com/bbharathkumarreddy" target="_blank"><sup><small>https://github.com/bbharathkumarreddy</small></sup></a></span>

<span>🥇 Prasanthmani<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://github.com/prasathmani" target="_blank"><sup><small>https://github.com/prasathmani</small></sup></a></span>

<span>🥈 KLuka<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://github.com/KLuka" target="_blank"><sup><small>https://github.com/KLuka</small></sup></a></span>
<br>
<br>
<b>Contributors - Welcome </b>🥇	🥈  🥉
<p>Features, Bug Fixes will be showcased in Server-B Hall of Fame and will be awarded a digital certificate of contribution.</p>
<br>
<p><sup><small><b>disclaimer:</b> Server B developers or cubepost is not responsible for any server manipulation, protection, actions and usage; usage of this software or console is solely responsible by the user for any actions or damages</small></sup></p>