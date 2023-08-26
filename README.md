# CarPort-Server
Raspberry Pi Web server for CarPort controller.

## Web server (PI)
Apaatch  with php 7.4

Run installer file:
``` sh webServerInstaller.sh ```

Follow instructions and thats it.

## Browser support
Easy Web page to controll the PI.
default username/Password: ```user / user```

Mainly used to configur the WebServer and for access controll.


## Custom App support
CarPort is un app for your phone, where you can connect to the WebServer and controll the PI from. 


## Config file
The config file is located in ```/var/www/html/config.json```
``` json
{
    "UUID": "UNIQUE_ID",
    "username": "username",
    "password": "password",
    "pin": "what_pin_to_use",
}
```

## TODO
- [x] Web server
- [x] Browser support (with login support)
- [x] Custom App support ([CarPort-App](https://github.com/GreenChiip/CarPort-App))
- [x] Config file
- [x] Installer

