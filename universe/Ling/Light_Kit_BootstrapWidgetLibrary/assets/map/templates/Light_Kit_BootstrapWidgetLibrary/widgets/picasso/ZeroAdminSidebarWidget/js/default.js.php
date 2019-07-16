<?php


use Ling\Bat\CaseTool;$attr = $z['attr'] ?? [];
$id = $attr['id'] ?? "body-sidebar";
$sidebar_toggler_id = $z['sidebar_toggler_id'];



$id = CaseTool::toFlea($id);
$sidebar_toggler_id = CaseTool::toFlea($sidebar_toggler_id);



?>

$(document).ready(function () {



    //----------------------------------------
    // sidebar toggling
    //----------------------------------------
    var jBody = $('body');
    var jSidebar = $('#<?php echo $id; ?>'); // the sidebar

    $('#<?php echo $sidebar_toggler_id; ?>').on('click', function () {

        if (jBody.hasClass("sidebar-show")) {
            jBody.removeClass('sidebar-show');
            jBody.addClass('sidebar-hide');
        } else if (jBody.hasClass("sidebar-hide")) {
            jBody.removeClass('sidebar-hide');
            jBody.addClass('sidebar-show');
        } else {
            // default behaviour, if small screen, we show the sidebar, if large screen, we hide the sidebar
            var isSmallScreen = true;
            var marginLeft = parseInt(jSidebar.css('margin-left'));
            if (0 === marginLeft) {
                isSmallScreen = false;
            }

            if (true === isSmallScreen) {
                jBody.addClass('sidebar-show');
            } else {
                jBody.addClass('sidebar-hide');
            }
        }
        return false;
    });
});