<?php
    // Skriver ut namn och email adress från get-metoden
    header('Content-type: text/plain');

    echo "Namn = " . $_GET['name']. "\n";
    echo "Email = " . $_GET['email'];

?>