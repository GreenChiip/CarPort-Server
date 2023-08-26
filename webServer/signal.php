<?php
    // Read the JSON file 
    $json = file_get_contents('config.json');
    
    // Decode the JSON file
    $json_data = json_decode($json,true);

    if($_GET["UUID"] == $json_data["UUID"]){
        $pin = $json_data["pin"];
        system("gpio -g mode $pin out");
        system("gpio -g write $pin 1");
        // sleep(1); To be tested!
        system("gpio -g write $pin 0");
    }

