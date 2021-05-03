<?php


/**
 * @var $this ZeroAdminBreadcrumbWidget
 */


use Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\ZeroAdminBreadcrumbWidget;


$first_element_text = $z['first_element_text'] ?? "";
$breadcrumb_links = $z['breadcrumb_links'] ?? [];
$last_element_text = $z['last_element_text'] ?? "";
$extra_links = $z['extra_links'] ?? [];


$container = $this->getContainer();
$reverseRouter = $container->get('reverse_router');


?>


<ol class="kit-bwl-zeroadmin_breadcrumb breadcrumb align-items-center <?php echo htmlspecialchars($this->getCssClass()); ?>"
    <?php echo $this->getAttributesHtml(); ?>
>
    <?php if ($first_element_text): ?>
        <li class="breadcrumb-item"><?php echo $first_element_text; ?></li>
    <?php endif; ?>
    <?php foreach ($breadcrumb_links as $item):
        $url = $item['url'];
        $text = $item['text'];
        ?>
        <li class="breadcrumb-item">
            <a href="<?php echo htmlspecialchars($url); ?>"><?php echo $text; ?></a>
        </li>
    <?php endforeach; ?>

    <?php if ($last_element_text): ?>
        <li class="breadcrumb-item active"><?php echo $last_element_text; ?></li>
    <?php endif; ?>




    <?php if ($extra_links): ?>
        <li class="breadcrumb-menu d-none d-md-block ml-auto">
            <div class="btn-group" role="group" aria-label="Button group">

                <?php foreach ($extra_links as $item):
                    $url = $item['url'];
                    $text = $item['text'];
                    $icon = $item['icon'] ?? "";
                    ?>
                    <a class="btn" href="<?php echo htmlspecialchars($url); ?>">
                        <i class="<?php echo htmlspecialchars($icon); ?>"></i> <?php echo $text; ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </li>
    <?php endif; ?>
</ol>
