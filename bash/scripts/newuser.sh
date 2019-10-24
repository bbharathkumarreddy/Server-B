#!/bin/bash
sudo useradd -p $(openssl passwd -1 $1) $2