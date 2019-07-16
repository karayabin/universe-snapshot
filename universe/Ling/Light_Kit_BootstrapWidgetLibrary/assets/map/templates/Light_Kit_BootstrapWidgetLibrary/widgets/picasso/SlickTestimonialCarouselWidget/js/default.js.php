<?php

$sliderId = $z['_slider_id'];
$autoplay = $z['autoplay'] ?? false;
$autoplaySpeed = $z['autoplay_speed'] ?? 3000;


$jsOptions = [
    "infinite" => true,
    "slideToShow" => "1",
    "slideToScroll" => "1",
    "autoplay" => $autoplay,
    "autoplaySpeed" => $autoplaySpeed,
];
?>
$(document).ready(function () {
    $('#<?php echo $sliderId; ?>').slick(<?php echo json_encode($jsOptions); ?>)
});