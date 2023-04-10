<?php
    // Skriver ut omgivningsvariabler i html
    header('Content-type: text/html');
    $server_arr=$_SERVER;
    $html = file_get_contents("3-2.html");
    $html_pieces = explode("<!--===xxx===-->", $html);
    echo $html_pieces[0];
    foreach ($server_arr as $key=>$val) {
        $html_pieces1 = str_replace('---name---', $key, $html_pieces[1]);
        echo str_replace('---value---', $val, $html_pieces1);
    }
    echo  $html_pieces[2];
?>