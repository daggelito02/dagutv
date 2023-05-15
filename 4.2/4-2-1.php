<?php
    // Skriver ut data från get-metoden
    header('Content-type: text/plain');

    $cookie_name = "sessions-id";

    if (isset($_GET["name"])){
        $name = $_GET['name'];
        echo "name = " . $name;
    }
    if (isset($_COOKIE[$cookie_name])){
        $sessionId = $_COOKIE[$cookie_name];
        echo "\nsessions-id = " . $sessionId;
    } else {
        echo "\nCookie '" . $cookie_name . "' is blocked or not set!";
    }
    if (isset($_GET["name"])){
        $button = $_GET['button'];
        echo "\nbutton = " . $button;
    }
?>