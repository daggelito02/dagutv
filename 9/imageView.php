<?php
include 'includes/db_connection.php';
$conn = OpenCon();

if (isset($_GET['image_id'])) {
    $sql = "SELECT mime,img FROM dagges_exam_app WHERE IID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_GET['image_id']);
    $stmt->execute() or die("Error: Problem retrieving Image BLOB" . mysqli_connect_error());
    $result = $stmt->get_result();

    $row = $result->fetch_assoc();
    header("Content-type: " . $row["mime"]);
    echo $row["img"];
}
CloseCon($conn);
?>

