<?php
// Hämtar blogg värden som läggs in till DB samt läses ut
// Finns även en enkel sortering via sql frågor 
header('Content-type: text/html');
include '../settings/db_connection.php';
$conn = OpenCon();
$addToDB = false;
$sortOrder = "ASC";
$sortValue = "ID";
$time = date("Y-m-d H:i:s");
if ($_POST and $_POST['push_button']){
  $name = strip_tags($_POST['name']);
  $email = strip_tags($_POST['email']);
  $homepage = strip_tags($_POST['homepage']);
  $comment = strip_tags($_POST['comment']);
  $sortOrder = strip_tags($_POST['sort_optopn']);
  $sortValue = strip_tags($_POST['sort_name']);
  $addToDB = true;
}
if ($addToDB) {
  if ($stmt = $conn->prepare("INSERT INTO dagges_blogg (time, name, email, homepage, comment) VALUES (?, ?, ?, ?, ?)")) {
    // Bind the variables to the parameter as strings.
    $stmt->bind_param("sssss", $time, $name, $email, $homepage, $comment);
    try {
      $stmt->execute();
      echo "New blogg post created successfully";
    }
    //catch exception
    catch(Exception $e) {
      echo 'COULD NOT EXECUTE STATEMENT: ' .$e->getMessage() . "<br>";
      echo "<h1>Software error:</h1>";
      echo 'Line: ' .$e->getLine() .' in '.$e->getFile() . "<br>";
      echo "For help, please send mail to the webmaster (Dag Fredriksson), 
      giving this error message and the time and date of the error. <br><br>";
    }
    // Close the prepared statement.
    $stmt->close();
  }
}
$sql = "SELECT ID, time, name, email, homepage, comment FROM dagges_blogg ORDER BY $sortValue $sortOrder";
$stmt = $conn->prepare($sql);
$stmt->execute() or die("<b>Error:</b> Problem on Retrieving blogg data<br/>" . mysqli_connect_error());
$result = $stmt->get_result();
$bloggDataRow = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);
$html = file_get_contents("6-2.html");
$html_pieces = explode("<!--===entries===-->", $html);
echo $html_pieces[0];

foreach ($bloggDataRow as $printBloggData) {
  $homepage = $printBloggData['homepage'];
  if (!str_starts_with($printBloggData['homepage'], 'http://')) {
    $homepage = "http://" . $printBloggData['homepage'];
  } 
  $html_pieces1 = str_replace('---no---', $printBloggData['ID'], $html_pieces[1]);
  $html_pieces2 = str_replace('---time---', $printBloggData['time'], $html_pieces1);
  $html_pieces3 = str_replace('---homepage---', $homepage , $html_pieces2);
  $html_pieces4 = str_replace('---name---', $printBloggData['name'], $html_pieces3);
  $html_pieces5 = str_replace('---email---', $printBloggData['email'], $html_pieces4);
  echo str_replace('---comment---', $printBloggData['comment'], $html_pieces5);
}
echo $html_pieces[2];
 
CloseCon($conn);

?>