<?php
$urlData = "http://dagutv.daggelito.se/9/imageView.php?image_id=123";
echo "Curl out: " . $data = file_get_contents_curl($urlData);
function file_get_contents_curl($urlData) {
        $ch = curl_init();
      
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_FAILONERROR, true); // Required for HTTP error 
        curl_error($ch);
        if (isset($error_msg)) {
            // TODO - Handle cURL error accordingly
            echo "error_msg: " .$error_msg;
        }

        curl_setopt($ch, CURLOPT_URL, $urlData);
        
        echo $data = curl_exec($ch);

        curl_close($ch);
      
        return $data;
    }
    
?>