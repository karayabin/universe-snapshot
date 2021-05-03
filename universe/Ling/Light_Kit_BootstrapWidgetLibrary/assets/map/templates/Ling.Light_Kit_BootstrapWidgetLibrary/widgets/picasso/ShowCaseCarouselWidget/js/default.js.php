<?php

$js = $z['js'] ?? [];
$automaticCycle = $js['automatic_cycle'] ?? true;
$interval = $js['interval'] ?? 6000;
$pauseOnHover = $js['pause_on_hover'] ?? true;


if (false === $automaticCycle) {
    $interval = false;
}
$pause = (true === $pauseOnHover) ? 'hover' : false;



$jsOptions = [
    "interval" => $interval,
    "pause" => $pause,
];
$carouselId = $z['_carousel_id'];

?>


$(document).ready(function () {
    $("#<?php echo $carouselId; ?>").carousel(<?php echo json_encode($jsOptions); ?>);
});
