<?php


/**
 * @var $this ZeroAdminHeaderWidget
 */


use Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\ZeroAdminHeaderWidget;


$brand_link = $z['brand_link'] ?? "/";
$brand_img_src = $z['brand_img_src'] ?? "";
$brand_img_alt = $z['brand_img_alt'] ?? "Logo";
$use_sidebar_toggler = $z['use_sidebar_toggler'] ?? true;
$sidebar_toggler_id = $z['sidebar_toggler_id'] ?? "header-navbar-toggler";
$plain_links = $z['plain_links'] ?? [];
$icon_links = $z['icon_links'] ?? [];


$container = $this->getContainer();

$reverseRouter = $container->get('reverse_router');


?>


<header class="kit-bwl-zeroadmin_header app-header navbar justify-content-start <?php echo htmlspecialchars($this->getCssClass()); ?>"
    <?php echo $this->getAttributesHtml(); ?>
>

    <a class="navbar-brand" href="<?php echo htmlspecialchars($brand_link); ?>">
        <img class="navbar-brand-full" src="<?php echo htmlspecialchars($brand_img_src); ?>"
             height="37 alt="<?php echo htmlspecialchars($brand_img_alt); ?>">
    </a>


    <?php if (true === $use_sidebar_toggler): ?>
        <button class="navbar-toggler" id="<?php echo htmlspecialchars($sidebar_toggler_id); ?>">
            <i class="fas fa-bars"></i>
        </button>
    <?php endif; ?>


    <?php if ($plain_links): ?>
        <ul class="nav navbar-nav flex-row d-none d-md-inline-flex">
            <?php foreach ($plain_links as $item):
                $icon = $item['icon'] ?? "";
                ?>
                <li class="nav-item px-3">
                    <a class="nav-link" href="<?php echo htmlspecialchars($item['url']); ?>">
                        <?php if ($icon !== ""): ?>
                            <i class="<?php echo htmlspecialchars($icon); ?>"></i>
                        <?php endif; ?>
                        <?php echo $item['text']; ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>


    <ul class="nav navbar-nav flex-row align-items-end ml-auto">
        <?php $this->getKitPageRenderer()->printZone("SUB_zeroadmin_header"); ?>
    </ul>
</header>