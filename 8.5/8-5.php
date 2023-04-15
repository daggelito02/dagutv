<?php
    // Skapar ett slumpmässigt sessions-id med funktionen rand() och sätter en kaka i en timma
    // som har värder "true" på näst sista parametern "secure" vilket innebär att kakan bara sätts om en säker anslutning finns
    // Testar även om servervariablen får HTTPS-värdet eller ej
    header('Content-type: text/html');
    $sessions_id = substr(rand(), 3);
    $html = file_get_contents("8-5.html");
    $html = str_replace('---session-id---', $sessions_id, $html);
    echo $html;
    $cookie_name = "sessions-id";
    $cookie_value = $sessions_id;
    if (isset($_SERVER['HTTPS'])) {
        setcookie($cookie_name, $cookie_value, time() + 10800, "/", null, true, false); // 3600 = 1 hour
    } else {
        echo "Not secure protocol";
    }
?>