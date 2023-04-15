<?php
    // Skapar ett slumpmässigt sessions-id med funktionen rand() och sätter en kaka i en timma
    header('Content-type: text/html');
    $sessions_id = substr(rand(), 3);
    $html = file_get_contents("4-2.html");
    $html = str_replace('---session-id---', $sessions_id, $html);
    echo $html;
    $cookie_name = "sessions-id";
    $cookie_value = $sessions_id;
    setcookie($cookie_name, $cookie_value, time() + 10800, "/"); // 3600 = 1 timma
?>