<?php
// Hämtar e-post epost via en HTML-sida.
// Om formuläret är korekt ifylt listat e-posten ut med TO, From, Subject och mailets innehåll.
header('Content-type: text/html; charset=utf-8');

$getMail = false;

if ($_POST and $_POST['push_button'] and $_POST['password']){
    $username = strip_tags($_POST['username']);
    $password = strip_tags($_POST['password']);
    $mailserverHost = strip_tags($_POST['mailserver_host']);
    $mailserverPort = strip_tags($_POST['mailserver_port']);
    $getMail = true;
  } else {
    echo "Something went wrong, try again. Navigate back with browser's back button";
  }

if ($getMail) {
    $html = file_get_contents("5-4-mail-content.html");
    $html_pieces = explode("<!--===entries===-->", $html);
    echo $html_pieces[0];
    $hostname = '{' . $mailserverHost .  ':' . $mailserverPort . '/imap/ssl}INBOX';
    /* try to connect */
    $mbox = imap_open($hostname,$username,$password) or die('Cannot connect to Gmail: ' . imap_last_error());
    $emails = imap_search($mbox,'ALL');
    if($emails)
    {
        $output = '';
        rsort($emails);

        foreach($emails as $email_number) 
        {
            $attachment = imap_fetchstructure($mbox, $email_number);
            $header = imap_headerinfo($mbox,$email_number);
            $from = $header->from[0]->mailbox . "@" . $header->from[0]->host;
            $toaddress = $header->toaddress;
            $replyto = $header->reply_to[0]->mailbox."@".$header->reply_to[0]->host;
            $datetime = date("Y-m-d H:i:s",$header->udate);
            $subject = quoted_printable_encode($header->subject);

            //get message body
            $message = "";
            // if($attachment->parts[1]->ifdisposition == "0"){
            //   $message = quoted_printable_decode(imap_fetchbody($mbox,$email_number,2));
            // } 
            $message = quoted_printable_decode(imap_fetchbody($mbox,$email_number,2));

            //$attachmentData= $service->users_messages_attachments->get($mbox, $email_number, $attachment);

            // Replace all '-' with '+' and '_' with '/' to make the url-safe
            // base64 encoded data to regular base64.
            //echo $decodedData = strtr($attachmentData, array('-' => '+', '_' => '/'));


                $html_pieces1 = str_replace('---to_address---', $toaddress, $html_pieces[1]);
                $html_pieces2 = str_replace('---from_address---', $from, $html_pieces1);
                $html_pieces3 = str_replace('---subject---', quoted_printable_decode($subject) , $html_pieces2);
                echo str_replace('---mail_content---', $message, $html_pieces3);
            //}
        }
    }
    imap_close($mbox);
    echo $html_pieces[2];
}
?>