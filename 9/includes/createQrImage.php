<?php
    if (!empty($_POST['qrcode']) and $_POST['generate_QR_button']){
        $QRtext = $_SESSION["QRtext"] = strip_tags($_POST['qrcode']);
    }  else {
        $generateQRimage = false;
    }
    // Create QR image from google chart api
    if ($generateQRimage) {
        $googleApiChartUrl = 'https://chart.googleapis.com/chart';
        $QRParams = '?cht=qr&choe=UTF-8';
        $QRsizeParam = '&chs=' . $QRImageSize;
        $textParam = '&chl=' . urlencode($QRtext);
        $urlData = $googleApiChartUrl . $QRParams . $QRsizeParam . $textParam ;

        include "functions/generateQrData.php";
        $ImageLocation = $_SESSION["ImageLocation"] = create_randomImg_putInFolder($qr_folder);
        $data = file_get_contents_curl($urlData);
        file_put_contents($ImageLocation, $data);
        
        $_SESSION["QRData"] = $data;
        include "functions/unlinkCurrentFile.php";
        unlinkCurrentFilesInFolder($qr_folder);
        $html = str_replace('---enable_DB-link---', $enable_db_link, $html);
    }
    // // Add image to the Data base
    $addToDB = false;
   
    if (isset($_GET['addToDB'])){
        $addToDB = true;
        include "addToDataBase.php";
        echo header ("location:  exam-app.php?addedToDB=true&textMessage=" . $QRtext) ;
        $html = str_replace('---show_added-text---', $show_content, $html);
    } 
    if (isset($_GET['addedToDB'])){
        $html = str_replace('---show_added-text---', $show_content, $html);
        $html = str_replace('---QR_txt_message---', $_GET['textMessage'], $html);
    }
?>