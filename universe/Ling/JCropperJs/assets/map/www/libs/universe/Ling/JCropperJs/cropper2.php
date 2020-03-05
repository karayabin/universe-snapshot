<?php


require_once "../../init.inc.php";

a($_FILES);

$file = $_FILES['croppedImage'];
$tmp = $file['tmp_name'];

if(true === is_uploaded_file($tmp)){
    move_uploaded_file($tmp, "/komin/jin_site_demo/www/libs/cropperjs/picture-cropped.jpg");
}