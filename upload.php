<?php

    $uploadfile = $_FILES["croppedImage"]["tmp_name"];
    $folderPath = "uploads/";
    
    if (! is_writable($folderPath) || ! is_dir($folderPath)) {
        echo "error";
        exit();
    }
    if (move_uploaded_file($_FILES["croppedImage"]["tmp_name"], $folderPath . $_FILES["croppedImage"]["name"])) {
        echo '<img src="' . $folderPath . "" . $_FILES["croppedImage"]["name"] . '">';
        exit();
    }

?>