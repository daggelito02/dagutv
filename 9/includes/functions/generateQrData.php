<?php
    // Create a random imagename and return png file with a folder path
    function create_randomImg_putInFolder($folder) {
        $randonDataFromDate = date("Y-m-d H:i:s");
        $pattern = array("-", " ", ":");
        $imgName = str_replace($pattern, "", $randonDataFromDate);

        return $ImageLocation = $folder . "/" . $imgName . ".png";
    }
    
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
            echo "Error message: " .$error_msg;
        }

        curl_setopt($ch, CURLOPT_URL, $urlData);
        
        $data = curl_exec($ch);

        curl_close($ch);
      
        return $data;
    }
?>