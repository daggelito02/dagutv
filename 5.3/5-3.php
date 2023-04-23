<?php
ini_set('display_errors', 1);
header('Content-type: text/html; charset=utf-8');

$hostname = '{imap.gmail.com:993/imap/ssl}INBOX';
$username = 'dagutveckling@gmail.com';
$password = 'iyhhwbhyzhluvghh';

/* try to connect */
//$mbox = imap_open("{imap.gmail.com:993/imap/ssl}INBOX", $_POST['username'], $_POST['password']);
$mbox = imap_open($hostname,$username,$password) or die('Cannot connect to Gmail: ' . imap_last_error());

//$mbox = imap_open("{imap.gmail.com:993/imap/ssl}}", "dagutveckling@gmail.com", "iyhhwbhyzhluvghh");

echo "<h1>Mailboxes</h1>\n";
$folders = imap_listmailbox($mbox, "{imap.gmail.com:993}", "*");

if ($folders == false) {
    echo "Call failed<br />\n";
} else {
    foreach ($folders as $val) {
        echo $val . "<br />\n";
    }
}
echo "<br />\n";
echo "<br />\n";
// $MC = imap_check($mbox);

// // Fetch an overview for all messages in INBOX
// $result = imap_fetch_overview($mbox,"1:{$MC->Nmsgs}",0);
// foreach ($result as $overview) {
//     echo "<br />#{$overview->msgno} ({$overview->date}) 
//     <br />- From: {$overview->from}
//     <br />{$overview->subject}<br />\n";
//     echo "<br />\n";
//     echo "<br />\n";
//     echo "<br />\n";
//     echo "<br />\n";
// }

     //Check no.of.msgs

    //  $num = imap_num_msg($mbox);



    //  if there is a message in your inbox

    //  if( $num >0 ) {

    //       read that mail recently arrived

    //       echo imap_qprint(imap_body($mbox, $num));

    //  }


// echo "<h1>Headers in INBOX</h1>\n";
// $headers = imap_headerinfo($mbox, 5);

// if ($headers == false) {
//     echo "Call failed<br />\n";
// } else {
//     foreach ($headers as $val) {
//         echo $val . "<br />\n";
//     }
// }

$emails = imap_search($mbox,'ALL');
if($emails)
{
    $output = '';

    

    rsort($emails);

    foreach($emails as $email_number) 
    {
        
        $attachment = imap_fetchstructure($mbox, $email_number);

        // echo "<pre> epost-nummer: " . $email_number . "<br>";
        // print_r($attachment->parts[1]->ifdisposition);
        // echo "</pre>";

        $header=imap_headerinfo($mbox,$email_number);

        $from = $header->from[0]->mailbox . "@" . $header->from[0]->host;
        $toaddress=$header->toaddress;
        $replyto=$header->reply_to[0]->mailbox."@".$header->reply_to[0]->host;
        $datetime=date("Y-m-d H:i:s",$header->udate);
        $subject=$header->subject;

        //remove the " from the $toaddress
        $toaddress = str_replace('"','',$toaddress);
        echo "<br />\n";
        echo '<strong>To:</strong> '.$toaddress.'<br>';
        echo '<strong>From:</strong> '.$from.'<br>';
        echo '<strong>Subject:</strong> '. quoted_printable_decode($subject);

        //get message body
        if($attachment->parts[1]->ifdisposition == "0"){
            echo $message = quoted_printable_decode(imap_fetchbody($mbox,$email_number,2));
        }
        //echo base64_decode($message);
        //echo $message = quoted_printable_decode(imap_fetchbody($mbox,$email_number,2));
        echo "<br />\n";
        //echo $message = quoted_printable_decode(imap_fetchbody($mbox,$email_number,2));
    }
}

// $message_count = imap_num_msg($mbox);

// for ($i = 1; $i <= $message_count; ++$i) {
//     $header = imap_headerinfo($mbox, $i);
//     echo "<br />1\n";
//     $body = trim(substr(imap_body($mbox, $i), 0, 100));
//     echo "<br />2\n";
//     $prettydate = date("jS F Y", $header->udate);
//     echo "<br />3\n";

//     if (isset($header->from[0]->personal)) {
//         $personal = $header->from[0]->personal;
//     } else {
//         $personal = $header->from[0]->mailbox;
//     }
//     echo "<br />4\n";

//     $email = "$personal <{$header->from[0]->mailbox}@{$header->from[0]->host}>";
//     echo "On $prettydate, $email said \"$body\".\n";
// }

imap_close($mbox);
?>