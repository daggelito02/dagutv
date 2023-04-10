<?php
    header('Content-type: text/plain');

    if (isset($_GET["name"])){
        $name = $_GET['name'];
        echo "name = " . $name;
    }
    if (isset($_GET["session-id"])){
        $sessionId = $_GET['session-id'];
        echo "\nsessions-id = " . $sessionId;
    }
    if (isset($_GET["name"])){
        $button = $_GET['button'];
        echo "\nbutton = " . $button;
    }
?>