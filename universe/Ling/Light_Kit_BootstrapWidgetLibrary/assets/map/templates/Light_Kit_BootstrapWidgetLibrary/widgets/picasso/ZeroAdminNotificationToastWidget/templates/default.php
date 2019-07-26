<?php


/**
 * @var $this ZeroAdminNotificationToastWidget
 */


use Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\ZeroAdminNotificationToastWidget;


$title = $z['title'] ?? "";
$body = $z['body'] ?? "";
$icon = $z['icon'] ?? "";
$icon_color = $z['icon_color'] ?? "";
$time_string = $z['time_string'] ?? "";
$is_dismissible = $z['is_dismissible'] ?? true;
$delay = $z['delay'] ?? 30000;
$delay = (int)$delay;

$sDismiss = (true === $is_dismissible) ? "alert-dismissible fade show" : "";
switch ($icon_color) {
    case "success":
        $icon_color = "#28a745";
        break;
    case "info":
        $icon_color = "#007bff";
        break;
    case "warning":
        $icon_color = "#ffc107";
        break;
    case "error":
        $icon_color = "#dc3545";
        break;
    default:
        break;
}


$hasHeader = (
    $title !== "" ||
    $icon !== "" ||
    $time_string !== "" ||
    true === $is_dismissible
);

?>

<div class="kit-bwl-zeroadmin_notification_toast <?php echo htmlspecialchars($this->getCssClass()); ?> mt-2"
    <?php echo $this->getAttributesHtml(); ?>
>
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="<?php echo $delay; ?>">
        <?php if (true === $hasHeader): ?>
            <div class="toast-header">
                <?php if ($icon): ?>
                    <i class="<?php echo htmlspecialchars($icon); ?>"
                        <?php if ($icon_color): ?>
                            style="color: <?php echo htmlspecialchars($icon_color); ?>"
                        <?php endif; ?>
                    ></i>&nbsp;
                <?php endif; ?>
                <?php if ($title): ?>
                    <strong class="mr-auto"><?php echo $title; ?></strong>
                <?php endif; ?>
                <?php if ($time_string): ?>
                    <small><?php echo $time_string; ?></small>
                <?php endif; ?>
                <?php if ($is_dismissible): ?>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <div class="toast-body">
            <?php echo $body; ?>
        </div>
    </div>
</div>