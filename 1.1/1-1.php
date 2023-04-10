<?php
    // Skapar en räknare som visar totala antalet besök av sidan
    header('Content-type: text/plain');
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
    include 'includes/counter.php';
?>