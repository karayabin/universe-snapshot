<?php


/**
 * @var $this ZeroAdminBigNotificationWidget
 */


use Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\ZeroAdminBigNotificationWidget;


$icon = $z['icon'] ?? "far fa-grimace";
$title = $z['title'] ?? "Oops!";
$text = $z['text'] ?? "Something went wrong.";
$container_class = $z['container_class'] ?? "big-notif-warning";


?>

<div class="kit-bwl-zeroadmin_bignotification container-fluid <?php echo htmlspecialchars($this->getCssClass()); ?>"
    <?php echo $this->getAttributesHtml(); ?>
>

    <div class="jumbotron <?php echo htmlspecialchars($container_class); ?>">

        <div class="row p-3">

            <?php if ($icon): ?>
                <i style="font-size: 100px;" class="<?php echo htmlspecialchars($icon); ?> mr-5"></i>
            <?php endif; ?>

            <div>
                <?php if ($title): ?>
                    <h1 class="display-4"><?php echo $title; ?></h1>
                <?php endif; ?>

                <?php if ($text): ?>
                    <p class="lead"><?php echo $text; ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>