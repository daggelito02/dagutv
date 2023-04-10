<?php
    // Skriv något vettigt här
    header('Content-type: text/html');
    session_start();
    $sessions_id = session_create_id();
    $_SESSION['PHPSESSIONID'] = $sessions_id;
    $html = file_get_contents("4-3.html");
    $html = str_replace('---session-id---', $sessions_id, $html);
    echo $html;
?>