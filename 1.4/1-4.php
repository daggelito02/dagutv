<?php
//klientstyrd omladdning var 3:je sekund
header("Refresh:3; url=1-4.php");
header("Content-Type: image/png");
$time = date("Y-m-d H:i:s");
$im = @imagecreate(320, 210)
    or die("Cannot Initialize new GD image stream");
$background_color = imagecolorallocate($im, 28, 98, 36);
$text_color = imagecolorallocate($im, 240, 240, 240);
imagestring($im, 5, 16, 90,  "The time is: " . $time, $text_color);
imagepng($im);
imagedestroy($im);
?>