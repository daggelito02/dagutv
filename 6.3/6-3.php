<?php
ini_set('display_errors', 0);
header('Content-type: text/html');
include '../settings/db_connection.php';
$conn = OpenCon();
$addToDB = false;
$time = date("Y-m-d H:i:s");
if ($_POST and $_POST['push_button']){
  $name = strip_tags($_POST['name']);
  $email = strip_tags($_POST['email']);
  $homepage = strip_tags($_POST['homepage']);
  $comment = strip_tags($_POST['comment']);
  $imgType = ""; 
  $imgData = "";
  if (count($_FILES) > 0) {
    if (is_uploaded_file($_FILES['file']['tmp_name'])) {
        $imgData = file_get_contents($_FILES['file']['tmp_name']);
        $imgType = $_FILES['file']['type'];
    }
    
  }
  $addToDB = true;
}

if ($addToDB) {

  $conn -> autocommit(FALSE);
  try {
    /* Insert some values */
    $stmt = $conn->prepare("INSERT INTO dagges_blogg_tbl1 (time, name, email, homepage, comment) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $time, $name, $email, $homepage, $comment);
    $stmt->execute();
    $img_id = $stmt->insert_id;
    $stmt = $conn->prepare("INSERT INTO dagges_blogg_tbl2(img_id, mime, img) VALUES(?, ?, ?)");
    $stmt->bind_param('sss', $img_id, $imgType, $imgData);
    $stmt->execute();
    /* If code reaches this point without errors then commit the data in the database */
    $conn->commit();
  } catch(Exception $e) {
    echo 'COULD NOT EXECUTE STATEMENT: ' .$e->getMessage() . "<br>";
    echo "<h1>Software error:</h1>";
    echo 'Line: ' .$e->getLine() .' in '.$e->getFile() . "<br>";
    echo "For help, please send mail to the webmaster (Dag Fredriksson), 
    giving this error message and the time and date of the error. <br><br>";
    $conn->rollback();
  }
}

$sql = 'SELECT * FROM dagges_blogg_tbl1 INNER JOIN dagges_blogg_tbl2 ON dagges_blogg_tbl1.ID = dagges_blogg_tbl2.img_id';
$stmt = $conn->prepare($sql);
$stmt->execute() or die("<b>Error:</b> Problem on Retrieving blogg data<br/>" . mysqli_connect_error());
$result = $stmt->get_result();
$bloggDataRow = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);
$html = file_get_contents("6-3.html");
$html_pieces = explode("<!--===entries===-->", $html);
echo $html_pieces[0];

$image_src_file = "imageView.php?image_id=";

foreach ($bloggDataRow as $printBloggData) {
  $homepage = $printBloggData['homepage'];
  if (!str_starts_with($printBloggData['homepage'], 'http://')) {
    $homepage = "http://" . $printBloggData['homepage'];
  } 
  $html_pieces1 = str_replace('---no---', $printBloggData['ID'], $html_pieces[1]);
  $html_pieces2 = str_replace('---image_src---', $image_src_file  . $printBloggData['img_id'], $html_pieces1);
  $html_pieces3 = str_replace('---time---', $printBloggData['time'], $html_pieces2);
  $html_pieces4 = str_replace('---homepage---', $homepage , $html_pieces3);
  $html_pieces5 = str_replace('---name---', $printBloggData['name'], $html_pieces4);
  $html_pieces6 = str_replace('---email---', $printBloggData['email'], $html_pieces5);
  echo str_replace('---comment---', $printBloggData['comment'], $html_pieces6);
}
echo $html_pieces[2];
CloseCon($conn);
?>