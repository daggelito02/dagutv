<?php
    include "functionSettings.php";
    $qr_folder = "qrimage";
    $start_page_url = "exam-app.php?";
    $defaul_qr_image = "img/default.png";
    $image_view = "imageView.php?image_id=";
    $defaul_qr_txt = "Create your own QR-Image";
    $generateQRimage = true;
    $QRImageSize = "300x300";
    $show_content = "show-content";
    $hide_content = "hide-content";
    $enable_db_link = "enable_db_link";
    $optionValues = "";
    $user_name = "daggelito02@gmail.com";
    $webmaster = "daggelito02@gmail.com";
    $protocol = "https://";
    //$baseurl = getBaseUrl($protocol); //Gets the environments domain
    $baseurl = "http://192.168.1.2"; //Only localy
    $appfolder = "/dagutv/9/"; //Specify folder for app, leve empty if app in root folder
    $folderBaseUrl = $baseurl . $appfolder;

?>