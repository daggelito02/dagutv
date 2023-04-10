<?php
    header('Content-type: text/html; charset=utf-8');
    if(session_status() === PHP_SESSION_NONE) session_start();
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    include '../settings/setting.php'; //to hide username and temp gmail generated password
    // $user_name = "your email address";
    // $password = "xxxxxxx"; to use Gmail SMTP, generate App Passwords - https://support.google.com/mail/answer/185833?hl=en
    require 'Exception.php';
    require 'PHPMailer.php';
    require 'SMTP.php';

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                     //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->SetLanguage("se", "phpmailer/language");                                          
        $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = $user_name;                             // my username
        $mail->Password   = $password ;                              //SMTP temp gmail generated password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`


        if ($_POST['from'] and $_POST['to']) {
            $from = $_POST['from'];
            $to = $_POST['to'];
            $cc = $_POST['cc'];
            $bcc = $_POST['bcc'];
            $subject = $_POST['subject'];
            $message = $_POST['message'] . " ";
        
            //Recipients
            $mail->setFrom($from, $from);
            $mail->addAddress($to);
            $mail->addReplyTo($from);
            if($cc) {
                $mail->addCC($cc); 
            }
            if($bcc) {
                $mail->addBCC($bcc); 
            }
            $ImageLocation = $_SESSION["ImageLocation"];
            $mail->Subject = $subject;
            $mail->Body = $message;
            $mail->addAttachment($ImageLocation);
            $mail->send();
            $ImageLocation = $_SESSION["ImageLocation"] = $defaul_qr_image;
            $_SESSION["mailFeedBack"] = "";
            $_SESSION["sendMessageError"] = "";
        } else {
            $_SESSION["sendMessageError"] = "";
            $_SESSION["mailFeedBack"] = "Both sender (from) and recipient (to) are needed to be able to send an email.";
        }
    } catch (Exception $e) {
        $_SESSION["mailFeedBack"] = "";
        $_SESSION["sendMessageError"] = "Message could not be sent. Error message: {$mail->ErrorInfo}";
    }
?>