<?php


/**
 * @var $this ZeroAdminSidebarWidget
 */


use Ling\Light_BMenu\Tool\LightBMenuTool;
use Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\ZeroAdminSidebarWidget;


$links = $z['links'] ?? [];


$container = $this->getContainer();
$reverseRouter = $container->get('reverse_router');


$currentUri = $container->getLight()->getHttpRequest()->getUri();


$uniqueIdCpt = 1;

function display_sidebar_link(array $item, string $currentUri)
{
    global $uniqueIdCpt;


    list($is_active, $is_opened) = LightBMenuTool::getActiveOpenInfo($item, $currentUri);
    $icon = $item['icon'] ?? "";
    $text = $item['text'];
    $url = $item['url'] ?? "";
    $badge_text = $item['badge_text'] ?? "";
    $badge_class = $item['badge_class'] ?? "";

    $sActive = ($is_active) ? "active" : "";

    $children = $item['children'] ?? [];



    ?>
    <li class="<?php echo $sActive; ?>">


        <?php if (empty($children)): ?>
            <a href="<?php echo htmlspecialchars($url); ?>">
                <?php if ($icon): ?>
                    <i class="<?php echo htmlspecialchars($icon); ?>"></i>
                <?php endif; ?>
                <span> <?php echo $text; ?> </span>
                <?php if ($badge_text): ?>
                    <span class="badge <?php echo htmlspecialchars($badge_class); ?>"><?php echo $badge_text; ?></span>
                <?php endif; ?>
            </a>
        <?php else:

            $sExpanded = (true === $is_opened) ? "true" : "false";
            $sShow = (true === $is_opened) ? "show" : "";
            $sLinkId = "sidebar-link-components-" . $uniqueIdCpt++;
            ?>
            <a href="#<?php echo $sLinkId; ?>" data-toggle="collapse"
               aria-expanded="<?php echo $sExpanded; ?>"
               class="dropdown-toggle">
                <?php if ($icon): ?>
                    <i class="<?php echo htmlspecialchars($icon); ?>"></i>
                <?php endif; ?>
                <span> <?php echo $text; ?> </span>
                <?php if ($badge_text): ?>
                    <span class="badge <?php echo htmlspecialchars($badge_class); ?>"><?php echo $badge_text; ?></span>
                <?php endif; ?>
            </a>
            <ul class="collapse list-unstyled <?php echo $sShow; ?>"
                id="<?php echo $sLinkId; ?>">
                <?php foreach ($children as $child):
                    display_sidebar_link($child, $currentUri);
                    ?>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </li>
    <?php
}

?>

<nav class="kit-bwl-zeroadmin_sidebar sidebar <?php echo htmlspecialchars($this->getCssClass()); ?>"
    <?php echo $this->getAttributesHtml(); ?>
>
    <ul class="list-unstyled mt-2">
        <?php foreach ($links as $item):
            display_sidebar_link($item, $currentUri); ?>
        <?php endforeach; ?>
    </ul>
</nav>