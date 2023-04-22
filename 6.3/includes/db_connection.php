<?php

function OpenCon()
 {
    $dbhost = "localhost";
    $db = "dagutv";
    include '../settings/setting.php'; //to hide username and password

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n". $conn -> error);
    
    return $conn;
 }
 
function CloseCon($conn)
{
   $conn -> close();
}
   
?>