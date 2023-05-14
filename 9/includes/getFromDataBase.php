<?php
  //Selects data from DB 

  $conn = OpenCon();

  $sql = "SELECT IID, qr_text FROM dagges_exam_app";
  $stmt = $conn->prepare($sql);
  $stmt->execute() or die("Connection error: " . mysqli_connect_error());
  $result = $stmt->get_result();
  $QRimageDataRow = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_free_result($result);
  $html_pieces = explode("<!--===entries===-->", $html);
  echo $html_pieces[0];

  foreach ($QRimageDataRow as $printQRimageData) {
    $selected = "";
    if ($printQRimageData['IID'] == $optionValues) {
      $selected = "selected";
    }
    if (strlen($printQRimageData['qr_text']) > 40) {
      $trunkedQRTextList = substr($printQRimageData['qr_text'], 0, 40) . "...";
    } else {
      $trunkedQRTextList = $printQRimageData['qr_text'];
    }
    $html_pieces1 = str_replace('---selected---', $selected, $html_pieces[1]);
    $html_pieces2 = str_replace('---QR_txt_list---', $printQRimageData['qr_text'], $html_pieces1);
    $html_pieces3 = str_replace('---QR_txt_list_truncated---', $trunkedQRTextList, $html_pieces2);
    echo str_replace('---image_id---', $printQRimageData['IID'], $html_pieces3);
  }
  echo $html_pieces[2];

  CloseCon($conn);
?>