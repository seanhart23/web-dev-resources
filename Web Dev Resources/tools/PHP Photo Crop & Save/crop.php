<?php
    $file = basename($_GET["image"]);
    $cropped = "final_" . $file;
    $image = new Imagick($file);
    $image->cropImage($_GET["width"], $_GET["height"], $_GET["x"], $_GET["y"]);
    $image->writeImage($cropped);
    echo $cropped;
?>

