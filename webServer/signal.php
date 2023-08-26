<?php
    // Read the JSON file 
    $json = file_get_contents('config.json');
    
    // Decode the JSON file
    $json_data = json_decode($json,true);
    if(!isset($_GET["UUID"])){
        return;
    }
    if($_GET["UUID"] !== $json_data["UUID"]){
        return;
    }

    $pin = intval($json_data["pin"]);
    system("raspi-gpio set $pin op dh");
    sleep(1); //To be tested!
    system("raspi-gpio set $pin op dl");

    if (isset($_GET["APP"])) {
        return response()->json([
            'message' => 'Signal sent!'
        ], 200);
    }

    echo "<meta http-equiv='refresh' content='0;url=index.php'>";
    return;

    
