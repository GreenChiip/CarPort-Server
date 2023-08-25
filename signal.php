<?php
    // Read the JSON file 
    $json = file_get_contents('config.json');
    
    // Decode the JSON file
    $json_data = json_decode($json,true);

    if($_GET["UUID"] == $json_data["UUID"]){
        system("gpio -g mode 24 out");
        system("gpio -g write 24 1");
        // sleep(1); To be tested!
        system("gpio -g write 24 0");
    }

