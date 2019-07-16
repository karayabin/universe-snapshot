<?php


/**
 * @var $this PortfolioGridMainNavHeaderWidget
 */


use Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\PortfolioGridMainNavHeaderWidget;

$use_accordion = $z['use_accordion'] ?? true;
$photo_url = $z['photo_url'] ?? "";
$photo_alt = $z['photo_alt'] ?? "";
$name = $z['name'] ?? "";
$social_icons = $z['social_icons'] ?? [];
$role = $z['role'] ?? "";
$links = $z['links'] ?? [];


// provided by the widget instance
$_js_container_id = $z['_js_container_id'];


?>

<header class="kit-bwl-portfoliogrid_main_nav_header <?php echo htmlspecialchars($this->getCssClass()); ?>"
    <?php echo $this->getAttributesHtml(); ?>
>
    <div class="row no-gutters">
        <div class="col-lg-4 col-md-5">
            <img src="<?php echo htmlspecialchars($photo_url); ?>" alt="<?php echo htmlspecialchars($photo_alt); ?>">
        </div>
        <div class="col-lg-8 col-md-7">
            <div class="d-flex flex-column">
                <div class="p-5 bg-dark text-white">
                    <div class="d-flex flex-row justify-content-between align-items-center">
                        <h1 class="display-4"><?php echo $name; ?></h1>
                        <?php foreach ($social_icons as $icon): ?>
                            <div class="d-none d-md-block">
                                <a href="<?php echo htmlspecialchars($icon['url']); ?>" class="text-white">
                                    <i class="<?php echo htmlspecialchars($icon['icon']); ?>"></i>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="p-4 bg-black">
                    <?php echo $role; ?>
                </div>

                <div id="<?php echo $_js_container_id; ?>">
                    <?php if ($links): ?>
                        <div class="d-flex flex-row text-white align-items-stretch text-center">
                            <?php foreach ($links as $link): ?>
                                <div class="port-item p-4 <?php echo htmlspecialchars($link['class']); ?>"
                                    <?php if ($use_accordion): ?>
                                        data-toggle="collapse"
                                    <?php endif; ?>
                                     data-target="<?php echo htmlspecialchars($link['url']); ?>"
                                >
                                    <?php if ($link['icon']): ?>
                                        <i class="<?php echo htmlspecialchars($link['icon']); ?>"></i>
                                    <?php endif; ?>
                                    <span class="d-none d-sm-block"><?php echo $link['label']; ?></span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>
</header>

