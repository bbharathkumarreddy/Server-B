#!/bin/bash
echo -------------------------------------------------
echo +++++++  Update and Upgrade Started      ++++++++
echo -------------------------------------------------
sudo apt update -y
sudo apt upgrade -y
echo -------------------------------------------------
echo xxxxxx   Update and Upgrade Completed    xxxxxxxx
echo -------------------------------------------------

sudo apt install nano -y