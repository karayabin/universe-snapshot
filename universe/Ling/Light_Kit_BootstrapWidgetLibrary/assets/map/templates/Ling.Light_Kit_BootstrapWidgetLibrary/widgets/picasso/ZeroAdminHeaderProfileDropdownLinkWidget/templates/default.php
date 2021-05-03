<?php


/**
 * @var $this ZeroAdminHeaderProfileDropdownLinkWidget
 */


use Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\ZeroAdminHeaderProfileDropdownLinkWidget;


$container = $this->getContainer();
$reverseRouter = $container->get('reverse_router');


$img_src = $z['img_src'];
$img_alt = $z['img_alt'] ?? "image";
$pseudo = $z['pseudo'];
$links = $z['links'] ?? [];


?>


<li class="nav-item dropdown kit-bwl-zeroadmin_profile_dropdown <?php echo htmlspecialchars($this->getCssClass()); ?>" <?php echo $this->getAttributesHtml(); ?>>
    <a class="nav-link nav-link" data-toggle="dropdown" href="#nowhere" role="button"
       aria-haspopup="true"
       aria-expanded="false">
        <img class="img-avatar rounded-circle" src="<?php echo htmlspecialchars($img_src); ?>"
             alt="<?php echo htmlspecialchars($img_alt); ?>">
    </a>
    <div class="dropdown-menu dropdown-menu-right">
        <div class="dropdown-header text-center">
            <strong><?php echo $pseudo; ?></strong>
        </div>
        <?php foreach ($links as $item):
            $url = $item['url'];
            $icon = $item['icon'] ?? "";
            $text = $item['text'];
            $badge_text = $item['badge_text'] ?? '';
            $badge_class = $item['badge_class'] ?? '';
            ?>
            <a class="dropdown-item" href="<?php echo htmlspecialchars($url); ?>">
                <?php if ($icon): ?>
                    <i class="<?php echo htmlspecialchars($icon); ?>"></i>
                <?php endif; ?>
                <?php echo $text; ?>
                <?php if ($badge_text): ?>
                    <span class="badge <?php echo htmlspecialchars($badge_class); ?>"><?php echo $badge_text; ?></span>
                <?php endif; ?>
            </a>
        <?php endforeach; ?>
    </div>
</li>