  <?php
  //Delete data from DB
  $deleteFromDB = false;
  $IID = 0;
  if (!empty($_POST['qr-image']) and $_POST['qr-image'] !="select" and $_POST['requestDB_button'] == "delete_qr_image") {
        $option_value = $_POST['qr-image'];
        $option_values = explode('!!!', $option_value);
        $IID = $option_values[0];
        
    $conn = OpenCon();
    // sql to delete a record
    $sql = "DELETE FROM dagges_exam_app WHERE IID=$IID";

    if ($conn->query($sql) === TRUE) {
      $successMessage = 'The QR image with message "' . $option_values[1] . '" was successfully deleted to the list!';
      $failureMessage = 'The QR image with message "' . $option_values[1] . '" was not deleted for some reason! Try again';
      $html = str_replace('---show_deleted-text---', $show_content, $html);
      $html = str_replace('---QR_txt_message---', $successMessage, $html);
    } else {
      $html = str_replace('---show_deleted-text---', $show_content, $html);
      $html = str_replace('---QR_txt_message---', $failureMessage, $html);
    }
    
    CloseCon($conn);
  }
?>