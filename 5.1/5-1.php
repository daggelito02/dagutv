<?php
error_reporting(0);
header('Content-type: text/plain');
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include '../../settings/setting.php'; //to hide username and temp gmail generated password
require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
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
        $message = $_POST['message'];
        $footer_text = "\n\n" . 'Observera! Detta meddelande är sänt från ett formulär på Internet och avsändaren kan vara felaktig!';
    
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
        $mail->Subject = $subject;
        $mail->Body = $message . $footer_text;
        $mail->send();

        // Skriv ut lite respons-data:
        echo 'Meddelandet har skickats som epost' . "\n";
        echo "\n" . "Från: " . $from . "\n";
        echo "Till: " . $to . "\n";
        echo "Cc: " . $cc . "\n";
        echo "Bcc: " . $bcc . "\n";
        echo "Ärdende: " . $subject . "\n";
        echo "Medelande: " . $message . $footer_text;;
        
    } else {
        echo 'Både avsendare (från) och mottagare (till) behövs för att kunna skicka ett mail.';
    }
} catch (Exception $e) {
    echo "Meddelandet kunde inte skickas. Felmedelande: {$mail->ErrorInfo}";
}
?>