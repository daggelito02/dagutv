<?php
    if (!empty($_POST['qr-image']) and $_POST['qr-image'] !="select" and $_POST['requestDB_button'] == "show_qr_image"){   
        $option_value = $_POST['qr-image'];
        $option_values = explode('!!!', $option_value);
        $optionValues = $option_values[0];
        $QRtext = $_SESSION["QRtext"] = strip_tags($option_values[1]);
        echo $ImageLocation = $_SESSION["ImageLocation"] = $image_view . $option_values[0];
        echo "<br>";
        echo $urlData = $folderBaseUrl . $ImageLocation;
        // echo "<br>";
        // echo $urlData = "9/" . $ImageLocation;
        // echo "<br>";
        // echo "Appel: " . $folderBaseUrl;
        echo "<br>";
        //$urlData = "http://192.168.1.2/dagtest/south-mini.png";
        //echo "<br>";
        include "functions/generateQrData.php";
        $ImageLocation = $_SESSION["ImageLocation"] = create_randomImg_putInFolder($qr_folder);
        echo "Curl out: " . $data = file_get_contents_curl($urlData);
        file_put_contents($ImageLocation, $data);
        $_SESSION["QRData"] = $data;

        include "functions/unlinkCurrentFile.php";
        unlinkCurrentFilesInFolder($qr_folder);
    }
?>