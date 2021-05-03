<?php


/**
 * @var $this ZeroAdminNotificationAlertWidget
 */


use Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\ZeroAdminNotificationAlertWidget;


$alert_class = $z['alert_class'] ?? "";
$title = $z['title'] ?? "";
$body = $z['body'] ?? "";
$is_dismissible = $z['is_dismissible'] ?? true;


$sDismiss = (true === $is_dismissible) ? "alert-dismissible fade show" : "";

?>

<div class="kit-bwl-zeroadmin_notification_alert <?php echo htmlspecialchars($this->getCssClass()); ?>"
    <?php echo $this->getAttributesHtml(); ?>
>
    <div class="alert <?php echo htmlspecialchars($alert_class); ?> <?php echo $sDismiss; ?> mb-0" role="alert">
        <?php if ($title): ?>
            <h4 class="alert-heading"><?php echo $title; ?></h4>
        <?php endif; ?>

        <?php echo $body; ?>
        <?php if ($is_dismissible): ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        <?php endif; ?>
    </div>
</div>