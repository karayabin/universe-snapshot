<?php


/**
 * @var $this ZeroAdminHeaderNewNotificationsIconLinkWidget
 */


use Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\ZeroAdminHeaderNewNotificationsIconLinkWidget;


$container = $this->getContainer();
$reverseRouter = $container->get('reverse_router');


$icon = $z['icon'];
$badge = $z['badge'] ?? "badge badge-pill";
$header_text_format = $z['header_text_format'];
$model = $z['model'];
$viewAllLink = $z['view_all_link'] ?? "";
$viewAllText = $z['view_all_text'] ?? "View all notifications";
$viewAllIcon = $z['view_all_icon'] ?? "";


$nbItems = $model['nbMessages'];
$messages = $model['list'];
$header_text = sprintf($header_text_format, $nbItems);


?>


<li class="kit-bwl-zeroadmin_new_notifications nav-item dropdown d-none d-md-inline-block pb-1 <?php echo htmlspecialchars($this->getCssClass()); ?>" <?php echo $this->getAttributesHtml(); ?>>
    <a class="nav-link" data-toggle="dropdown" href="#navlink" role="button" aria-haspopup="true"
       aria-expanded="true">
        <i class="<?php echo htmlspecialchars($icon); ?>"></i>
        <span class="<?php echo htmlspecialchars($badge); ?>"><?php echo $nbItems; ?></span>
    </a>
    <div class="dropdown-menu dropdown-menu-right">
        <div class="dropdown-header text-center mb-1">
            <strong><?php echo $header_text; ?></strong>
        </div>

        <?php foreach ($messages as $message):
            $url = $reverseRouter->getUrl($message['route']);
            $icon = $message['icon'] ?? "";
            $text = $message['text'];

            ?>
            <a href="<?php echo htmlspecialchars($url); ?>" class="dropdown-item">
                <div class="d-flex align-items-center">
                    <?php if ($icon): ?>
                        <i class="<?php echo htmlspecialchars($icon); ?>"></i>
                    <?php endif; ?>
                    <span class="mr-5"><?php echo $text; ?></span>
                </div>
            </a>

        <?php endforeach; ?>



        <?php if ($viewAllLink): ?>
            <a class="dropdown-item text-center" href="<?php echo htmlspecialchars($viewAllLink); ?>">
                <?php if ($viewAllIcon): ?>
                    <i class="<?php echo htmlspecialchars($viewAllIcon); ?>"></i>
                <?php endif; ?>
                <strong><?php echo $viewAllText; ?></strong>
            </a>
        <?php endif; ?>

    </div>
</li>




