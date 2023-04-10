<?php
 ob_get_contents();
 ob_end_clean();

if (isset($_SERVER['CONTENT_LENGTH']) && (int) $_SERVER['CONTENT_LENGTH'] > 41943040){ //Max in my (php.ini post_max_size=40M)
    $theSize = SizeUnits($_SERVER['CONTENT_LENGTH']); 
    echo "Max size is 40 MB. This file is " . $theSize . " big. Try to make it smaller.";
} elseif($_FILES["file"]["size"] == 0){
    header('Content-type: text/plain');
    echo "Error trying to upload file";
} else {
    echo $mimetype = $_FILES["file"]["type"];
    switch ($mimetype) {
        case "text/plain":
            header('Content-type: text/plain');
            echo file_get_contents($_FILES['file']['tmp_name']);
            break;
        case "image/png":
            header('Content-Type: image/png');
            echo file_get_contents($_FILES['file']['tmp_name']);
            break;
        case "image/jpeg":
            header('Content-Type: image/jpeg');
            echo file_get_contents($_FILES['file']['tmp_name']);
            break;
        default:
            header('Content-type: text/plain');
            echo "Name: " . $_FILES['file']['name'] . "\n";
            echo "Type: " . $_FILES['file']['type'] . "\n";
            echo "Size: " . $theSize = SizeUnits($_FILES['file']['size']);
    }
}

function SizeUnits($bytes)
{
    $label = array( 'B', 'KB', 'MB', 'GB', 'TB', 'PB' );
    for( $i = 0; $bytes >= 1024 && $i < ( count( $label ) -1 ); $bytes /= 1024, $i++ );
    return( round( $bytes, 2 ) . " " . $label[$i] );
}
?>