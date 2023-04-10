<?php
    header('Content-type: text/plain');
    session_start();

    if (isset($_GET["name"])){
        $name = $_GET['name'];
        echo "name = " . $name;
    }
    if (isset($_SESSION['PHPSESSIONID'])) {
        echo "\nsessions-id = " . $_SESSION['PHPSESSIONID'];
     } else {
        $sessions_id = session_create_id();
        echo "\nsessions-id = " . $sessions_id = session_create_id();
    }
    if (isset($_GET["name"])){
        $button = $_GET['button'];
        echo "\nbutton = " . $button;
    }
?>