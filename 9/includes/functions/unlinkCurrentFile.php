<?php
    function unlinkCurrentFilesInFolder($folder) {
        $files = glob($folder . "/*.*");
        $currentImage = substr(end($files), 8);
        $leave_files = array($currentImage);
        foreach($files as $file) {
            if(!in_array(basename($file), $leave_files) ){
                unlink($file);
            }
        }
    }
?>