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

  function flattenParts($messageParts, $flattenedParts = array(), $prefix = '', $index = 1, $fullPrefix = true) {

    foreach($messageParts as $part) {
      $flattenedParts[$prefix.$index] = $part;
      if(isset($part->parts)) {
        if($part->type == 2) {
          $flattenedParts = flattenParts($part->parts, $flattenedParts, $prefix.$index.'.', 0, false);
        }
        elseif($fullPrefix) {
          $flattenedParts = flattenParts($part->parts, $flattenedParts, $prefix.$index.'.');
        }
        else {
          $flattenedParts = flattenParts($part->parts, $flattenedParts, $prefix);
        }
        unset($flattenedParts[$prefix.$index]->parts);
      }
      $index++;
    }
  
    return $flattenedParts;
        
  }

  function getPart($connection, $messageNumber, $partNumber, $encoding) {
	
    $data = imap_fetchbody($connection, $messageNumber, $partNumber);
    switch($encoding) {
      case 0: return $data; // 7BIT
      case 1: return $data; // 8BIT
      case 2: return $data; // BINARY
      case 3: return base64_decode($data); // BASE64
      case 4: return quoted_printable_decode($data); // QUOTED_PRINTABLE
      case 5: return $data; // OTHER
    }
    
    
  }
  
  function getFilenameFromPart($part) {
  
    $filename = '';
    
    if($part->ifdparameters) {
      foreach($part->dparameters as $object) {
        if(strtolower($object->attribute) == 'filename') {
          $filename = $object->value;
        }
      }
    }
  
    if(!$filename && $part->ifparameters) {
      foreach($part->parameters as $object) {
        if(strtolower($object->attribute) == 'name') {
          $filename = $object->value;
        }
      }
    }
    
    return $filename;
    
  }




if ($getMail) {
    $html = file_get_contents("5-4-mail-content.html");
    $html_pieces = explode("<!--===entries===-->", $html);
    echo $html_pieces[0];
    $hostname = '{' . $mailserverHost .  ':' . $mailserverPort . '/imap/ssl}INBOX';
    /* try to connect */
    $connection = imap_open($hostname,$username,$password) or die('Cannot connect to Gmail: ' . imap_last_error());
    $messageNumber = 2;
    $structure = imap_fetchstructure($connection, $messageNumber);
    $flattenedParts = flattenParts($structure->parts);

    //$emails = imap_search($mbox,'ALL');
    $flattenedParts = imap_search($connection,'ALL');
    if($flattenedParts)
    {
        $output = '';
        rsort($flattenedParts);

        foreach($flattenedParts as $partNumber => $part) {
          switch($part->type) {
            
            case 0:
              // the HTML or plain text part of the email
               //$message = getPart($connection, $messageNumber, $partNumber, $part->encoding);
               echo $message = quoted_printable_decode(imap_fetchbody($connection, $messageNumber, $partNumber, $part->encoding));
              // now do something with the message, e.g. render it
            break;
          
            case 1:
              // multi-part headers, can ignore
          
            break;
            case 2:
              // attached message headers, can ignore
            break;
          
            case 3: // application
            case 4: // audio
            case 5: // image
            case 6: // video
            case 7: // other
              $filename = getFilenameFromPart($part);
              if($filename) {
                // it's an attachment
                //echo $attachment = getPart($connection, $messageNumber, $partNumber, $part->encoding);
                // now do something with the attachment, e.g. save it somewhere
              }
              else {
                // don't know what it is
              }
            break;
          
          }
          
        }

        // foreach($emails as $email_number) 
        // {
        //     // echo "<pre>";
        //     // print_r($attachment = imap_fetchstructure($mbox, $email_number));
        //     // echo "</pre>";
        //     $attachment = imap_fetchstructure($mbox, $email_number);
        //     $header = imap_headerinfo($mbox,$email_number);
        //     $from = $header->from[0]->mailbox . "@" . $header->from[0]->host;
        //     $toaddress = $header->toaddress;
        //     $replyto = $header->reply_to[0]->mailbox."@".$header->reply_to[0]->host;
        //     $datetime = date("Y-m-d H:i:s",$header->udate);
        //     $subject = quoted_printable_encode($header->subject);

        //     //get message body
        //     $message = "";
        //     if($attachment->parts[1]->ifdisposition == "1"){
        //       $message = quoted_printable_decode(imap_fetchbody($mbox,$email_number,2));
        //     } elseif($attachment->parts[1]->ifdisposition == "1") {
        //       base64_decode($message = quoted_printable_decode(imap_fetchbody($mbox,$email_number,2)));
        //     }
        //     //$message = quoted_printable_decode(imap_fetchbody($mbox,$email_number,2));
        //     //echo $attachment->parts[1]->ifdisposition;
        //     //$attachmentData= $service->users_messages_attachments->get($mbox, $email_number, $attachment);

        //     // Replace all '-' with '+' and '_' with '/' to make the url-safe
        //     // base64 encoded data to regular base64.
        //     //echo $decodedData = strtr($attachmentData, array('-' => '+', '_' => '/'));


        //         $html_pieces1 = str_replace('---to_address---', $toaddress, $html_pieces[1]);
        //         $html_pieces2 = str_replace('---from_address---', $from, $html_pieces1);
        //         $html_pieces3 = str_replace('---subject---', quoted_printable_decode($subject) , $html_pieces2);
        //         echo str_replace('---mail_content---', $message, $html_pieces3);
        //     //}
        // }
    }
    imap_close($mbox);
    echo $html_pieces[2];
}
?>