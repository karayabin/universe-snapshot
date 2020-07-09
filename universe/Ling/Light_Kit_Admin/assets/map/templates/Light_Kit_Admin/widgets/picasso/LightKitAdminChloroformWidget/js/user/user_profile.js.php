<?php


use Ling\Light_AjaxFileUploadManager\Util\LightAjaxFileUploadManagerRenderingUtil;use Ling\Light_Kit_Admin\Widget\Picasso\LightKitAdminChloroformWidget;



/**
 * @var $this LightKitAdminChloroformWidget
 */


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
});