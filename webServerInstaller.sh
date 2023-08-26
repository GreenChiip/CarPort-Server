# WebServer installer file
# Install Apatche
# Install php

# Move content form "WebServer" forlder to /var/www/
# config httpd file for Apatche ?

echo "\n\n---- Script for install WebServer ---"
echo "Do you want to run update&upgrade? (y/n)"
read update

echo "\n\n---- Updateing & Upgrading OS ---"
sudo apt update -y && sudo apt upgrade -y

echo "\n\n---- Installing Apatche ---"
sudo apt install apache2 -y

echo "\n\n---- Installing php ---"
sudo apt install php php-common -y

echo "\n\n---- Installing php modules ---"
sudo apt install php-cli php-fpm php-pdo php-zip php-curl php-mysql php-gd php-json php-mbstring php-intl php-xml php-pear php-bcmath -y

# Make config.json
echo "\n\n---- Config.json ---"
echo "Enter a UUID:"
read UUID
echo "Enter your username (default: admin):"
read username
echo "Enter your password (default: admin):"
read password
echo "Enter pin on controller (default: 24):"
read pin

echo "\n\n---- creating config.json ---"

if [ "$UUID" = "" ]; then
    UUID="You_Dum_Dum_You_Forgot_The_UUID"
fi

if [ "$username" = "" ]; then
    username="admin"
fi

if [ "$password" = "" ]; then
    password="admin"
fi

if [ "$pin" = "" ]; then
    pin="16"
fi

echo "{
    \"UUID\": \"$UUID\",
    \"username\": \"$username\",
    \"password\": \"$password\",
    \"pin\": \"$pin\"
}" >webServer/config.json

# Move content form "WebServer" forlder to /var/www/
echo "\n\n---- Moving content to /var/www/ ---"
sudo rm -r /var/www/*

sudo mkdir /var/www/html
sudo cp -r webServer/* /var/www/html/
sudo usermod -G gpio www-data
sudo useradd -G gpio www-data

echo "---- Rebooting (5) ---"
sleep 1
echo "---- Rebooting (4) ---"
sleep 1
echo "---- Rebooting (3) ---"
sleep 1
echo "---- Rebooting (2) ---"
sleep 1
echo "---- Rebooting (1) ---"

sudo reboot
