<?php

$use_accordion = $z['use_accordion'] ?? true;


// provided by the widget instance
$_js_container_id = $z['_js_container_id'];

?>

<?php if(true === $use_accordion): ?>
$(document).ready(function () {
    $('#<?php echo $_js_container_id; ?> .port-item').click(function () {
        $('.collapse').collapse("hide")
    });
});
<?php endif; ?>
