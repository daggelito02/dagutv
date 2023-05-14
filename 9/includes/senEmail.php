<?php
    // Sends the selected data via email
    if (!empty($_POST['send_email']) == "true"){
        $to = "";
        include "PHPMailer/mailQR.php";
        //prevent sending if page is reloads
        header("Location: exam-app.php?emailSent=true&recipient=$to"); 
    }  
    //write succes message or validate/error message
    if (isset($_GET['emailSent'])){
        if ($_SESSION["mailFeedBack"] == "" and $_SESSION["sendMessageError"] == ""){
            $html = str_replace('--Recipient--', $_GET['recipient'], $html);
            $html = str_replace('---show_email_msg---', $show_content, $html);
        } else {
            $html = str_replace('---show_email_fail_msg---', $show_content, $html);
            if ($_SESSION["mailFeedBack"]){
                $html = str_replace('---show_error_mail_msg---', $_SESSION["mailFeedBack"], $html);
            }
            if ($_SESSION["sendMessageError"]){
                $html = str_replace('---show_error_mail_msg---', $_SESSION["sendMessageError"], $html);
            }
            
        }
    }
?>