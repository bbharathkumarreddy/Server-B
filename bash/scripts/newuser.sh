#!/bin/bash
'Creating New User'
sudo useradd -p $(openssl passwd -1 $1) $2