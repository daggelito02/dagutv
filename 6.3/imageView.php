<?php
include '../settings/db_connection.php';
$conn = OpenCon();

if (isset($_GET['image_id'])) {
    $sql = "SELECT mime,img FROM dagges_blogg_tbl2 WHERE img_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_GET['image_id']);
    $stmt->execute() or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysqli_connect_error());
    $result = $stmt->get_result();

    $row = $result->fetch_assoc();
    header("Content-type: " . $row["mime"]);
    echo $row["img"];
}
CloseCon($conn);
?>

