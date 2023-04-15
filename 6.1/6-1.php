<?php
//loggningsfunktion så att följande information sparas för alla som besöker sidan:
//Tid
//REMOTE_ADDR
//HTTP_USER_AGENT

header('Content-type: text/plain');
include '../settings/db_connection.php';

$conn = OpenCon();

$time = "Tid: " . date("Y-m-d H:i:s");
$remote_address =  $_SERVER['REMOTE_ADDR'];
if ($remote_address == "::1"){
  $remote_address = "REMOTE_ADDR: ipv6 loopback address (" . $remote_address . ")";
} else {
  $remote_address =  "REMOTE_ADDR: " . $remote_address;
}
$remote_user_agent = "REMOTE_USER_AGENT: " . $_SERVER['HTTP_USER_AGENT']; 

$sql = "INSERT INTO Loggning_6_1 (time, RemoteAddress, RemoteUserAgent)
VALUES ('$time', '$remote_address', '$remote_user_agent')";

if ($conn->query($sql) === TRUE) {
  $sql = 'SELECT time, RemoteAddress, RemoteUserAgent FROM Loggning_6_1';
  $result = mysqli_query($conn, $sql);
  $loggingDataRow = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_free_result($result);

  foreach ($loggingDataRow as $printTheData) {
    echo $printTheData['time'] . "\n";
    echo $printTheData['RemoteAddress'] . "\n";
    echo $printTheData['RemoteUserAgent'] . "\n\n";
  }
} else {
  die("Connection failed: " . $conn->connect_error);
}

CloseCon($conn);

?>