<?php
    // Application start file, includes everything needed
    ini_set('display_startup_errors', 1);
    ini_set('display_errors', 1);
    error_reporting(-1);
    header('Content-type: text/html; charset=utf-8');
    session_start();
    include "includes/settings/settings.php";
    require_once('includes/db_connection.php');
    $QRtext = $defaul_qr_txt;
    $ImageLocation = $defaul_qr_image;
    $html = file_get_contents("exam-app.html");
    
    include "includes/deleteFromDataBase.php";
    include "includes/createQrImage.php";
    include "includes/senEmail.php";
    include "includes/showQrImageFromList.php";
    $html = str_replace('---QR_txt---', $QRtext, $html);
    $html = str_replace('---image_src---', $ImageLocation, $html);
    include "includes/getFromDataBase.php";
?>