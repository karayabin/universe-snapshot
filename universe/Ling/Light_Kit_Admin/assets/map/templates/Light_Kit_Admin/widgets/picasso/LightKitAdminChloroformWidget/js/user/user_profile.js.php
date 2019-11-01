<?php


use Ling\Light_AjaxFileUploadManager\Util\LightAjaxFileUploadManagerRenderingUtil;





$util = new LightAjaxFileUploadManagerRenderingUtil();
$util->setSuffix("avatar_url");

$formArray = $z['form']->toArray();

?>
$(document).ready(function () {

    var jPassword = $("#id-control-password");

    $('#id-control-password-switch').on('change', function () {
        if (true === $(this).prop('checked')) {
            jPassword.closest(".form-group").show();
        } else {
            jPassword.closest(".form-group").hide();
        }
    });


    <?php $util->printJavascript($formArray['fields']["avatar_url"]); ?>



});