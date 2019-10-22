#!/bin/bash
echo -------------------------------------------------
echo +++++++++  GENERATE AUTH STARTED  +++++++++++++++
echo -------------------------------------------------
auth_key=$(head /dev/urandom | tr -dc A-Za-z0-9 | head -c 50 ; echo '');
echo "Note: This is the auth key, cannot be viewed again but can generate a new key. Please copy and store securely. Used for GIT Integrations & APIs."
echo $auth_key
echo $auth_key > /var/www/server-b-data/server_panel_auth_key
echo -------------------------------------------------
echo xxxxxxxx   GENERATE AUTH COMPLETE     xxxxxxxxxxx               
echo -------------------------------------------------