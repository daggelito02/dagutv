<?php
    // Skapar en räknare som visar totala antalet besök av sidan
    header('Content-type: text/html');
    $path = 'includes/counter.php';
    $file  = fopen( $path, 'r' );
    $count = fgets( $file, 1000 );
    fclose( $file );
    $count = abs( intval( $count ) ) + 1;
    $file_pointer = fopen($path,"w+");
    if (flock($file_pointer,LOCK_SH)) {
        fwrite($file_pointer,$count);
        flock($file_pointer,LOCK_UN);
    } else {
        echo "This file is locked!";
    }
    fclose($file_pointer);
    $hits = file_get_contents("includes/counter.php");
    $contentType = mime_content_type('3-1.html');
    
    $html = file_get_contents("3-1.html");
    $html = str_replace('---$contentType---', $contentType, $html);
    $html = str_replace('---$hits---', $hits, $html);
    echo $html;
?>