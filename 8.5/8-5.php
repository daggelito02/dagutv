<?php
    // Skriv något vettigt här
    header('Content-type: text/html');
    $sessions_id = substr(rand(), 3);
    $html = file_get_contents("8-5.html");
    $html = str_replace('---session-id---', $sessions_id, $html);
    echo $html;
    $cookie_name = "sessions-id";
    $cookie_value = $sessions_id;
    setcookie($cookie_name, $cookie_value, time() + 10800, "/", null, true, false); // 3600 = 1 hour
?>