<?php
    // Skriver ut omgivningsvariabler 
    header('Content-type: text/plain');
    echo "Env variabler\n\n"; 
    $env_arr=$_ENV; 
    // Skapar namn/värde variabler av $_ENV-arrayen för att sedan lopa igenom och skriva ut på egen rad
    foreach ($env_arr as $key=>$val) 
    echo "$key: $val" . "\n";
    echo "\nServer variabler\n\n";
    // Skapar namn/värde variabler av $_SERVER-arrayen för att sedan lopa igenom och skriva ut på egen rad
    $server_arr=$_SERVER;
    foreach ($server_arr as $key=>$val)
    echo "$key: $val" . "\n";
?>
