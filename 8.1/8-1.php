<?php
    header('Content-type: text/plain');
    echo "Välkommen " . $_SERVER['PHP_AUTH_USER'] . "!";

    function authenticate() {
        header('WWW-Authenticate: Basic realm="Test Authentication System"');
        header('HTTP/1.0 401 Unauthorized');
        echo "You must enter a valid login ID and password to access this resource\n";
        exit;
    }
    // Avkommentera authenticate-funktionen nedan "authenticate();" och ladda om sidan för att få upp loginpromten igen.
    // När loginpromten visas bortkomenterar du authenticate-funktionen för att sedan landa på sidan och se 
    // välkomstmedelandet med användarnamnet igen.
    // Användarnam är: sol
    // Lösen ordet är: pirre
    //authenticate();
?>