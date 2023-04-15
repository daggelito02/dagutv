<?php
    // Skapar ett slumpmässigt sessions-id med funktionen rand()
    header('Content-type: text/html');
    $sessions_id = rand();
    $html = file_get_contents("4-1.html");
    $html = str_replace('---session-id---', substr($sessions_id, 3), $html);
    echo $html;
?>