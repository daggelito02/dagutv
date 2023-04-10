<?php

function OpenCon()
 {
    $dbhost = "localhost";
    $dbuser = "dagutv";
    $dbpass = "ww.TxmQ/h0QA5J(Y";
    $db = "dagutv";

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
    
    return $conn;
 }
 
function CloseCon($conn)
{
   $conn -> close();
}
   
?>