  <?php
    //Inserts data to the DB
    
    $conn = OpenCon();
    if ($addToDB) {

    $conn -> autocommit(FALSE);
    try {
      $stmt = $conn->prepare("INSERT INTO dagges_exam_app(qr_text, mime, img) VALUES(?, ?, ?)");
      /* Insert some values */
      $QRtext = $_SESSION["QRtext"];
      $ImageLocation = $_SESSION["ImageLocation"];
      $imgType = "image/png";
      $imgData = $_SESSION["QRData"];
      $stmt->bind_param('sss', $QRtext, $imgType, $imgData);
      $stmt->execute();
      /* If code reaches this point without errors then commit the data in the database */
      $conn->commit();
        } catch(Exception $e) {
            $html = str_replace('---error_show---', $show_content, $html);
            $html = str_replace('---error_msg---', $e->getMessage(), $html);
            $html = str_replace('---error_line---', $e->getLine(), $html);
            $html = str_replace('---error_file---', $e->getFile(), $html);
            $html = str_replace('--mail_address--', $webmaster, $html);
            $html = str_replace('---start_page_url---', $start_page_url, $html);
            $html = str_replace('---hide_content---', $hide_content, $html);
            $conn->rollback();
        }
    }
    CloseCon($conn);
?>