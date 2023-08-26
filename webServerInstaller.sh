# WebServer installer file
# Install Apatche
# Install php

# Move content form "WebServer" forlder to /var/www/
# config httpd file for Apatche ?

echo "---- Script for install WebServer ---"
echo "---- Updateing & Upgrading OS ---"
sudo apt update -y && sudo apt upgrade -y

echo "---- Installing Apatche ---"
sudo apt install apache2 -y

echo "---- Installing php ---"
sudo apt install php php-common -y

echo "---- Installing php modules ---"
sudo apt install php-cli php-fpm php-pdo php-zip php-curl php-mysql php-gd php-json php-mbstring php-intl php-xml php-pear php-bcmath -y

# Make config.json
echo "---- Config.json ---"
echo "Enter a UUID:"
read UUID
echo "Enter your username (default: admin):"
read username
echo "Enter your password (default: admin):"
read password
echo "Enter pin on controller (default: 24):"
read pin

echo "---- creating config.json ---"

if "$UUID" -eq ""; then
    UUID="You_Dum_Dum_You_Forgot_The_UUID"
fi

if "$username" -eq ""; then
    username="admin"
fi

if "$password" -eq ""; then
    password="admin"
fi

if "$pin" -eq ""; then
    pin="24"
fi

echo "{
    \"UUID\": \"$UUID\",
    \"username\": \"$username\",
    \"password\": \"$password\",
    \"pin\": \"$pin\"
}" >WebServer/config.json

# Move content form "WebServer" forlder to /var/www/
echo "---- Moving content to /var/www/ ---"
sudo cp -r WebServer/* /var/www/
