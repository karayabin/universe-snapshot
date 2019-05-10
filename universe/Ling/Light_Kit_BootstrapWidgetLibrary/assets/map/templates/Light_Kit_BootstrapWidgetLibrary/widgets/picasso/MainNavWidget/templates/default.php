<?php


/**
 * @var $this PicassoWidget
 */

use Ling\Kit_PicassoWidget\Widget\PicassoWidget;


$title = $z['title'] ?? "No title";
$titleLogo = $z['title_logo'] ?? null;
$fixedTop = $z['fixed_top'] ?? true;
$titleUrl = $z['title_url'] ?? "/";





$links = $z['links'] ?? [];
$linksItemClass = $z['links_item_class'] ?? "";
$linksAlignRight = $z['links_align_right'] ?? false;

$links2 = $z['links2'] ?? [];
$links2ItemClass = $z['links2_item_class'] ?? "";
$links2AlignRight = $z['links2_align_right'] ?? true;


//--------------------------------------------
//
//--------------------------------------------
$linksCallback = function (array $links, array $options) {

    $linksAlignRight = $options['links_align_right'] ?? false;
    $links_item_class = $options['links_item_class'] ?? "";

    ?>
    <ul class="navbar-nav
                <?php if (true === $linksAlignRight): ?>
                ml-auto
                <?php endif; ?>
">

        <?php foreach ($links as $item):
            $children = $item['children'] ?? null;
            ?>
            <?php if (is_array($children)): ?>
            <li class="nav-item dropdown <?php echo $links_item_class; ?>">
                <a href="<?php echo htmlspecialchars($item['url']); ?>"
                   class="nav-link dropdown-toggle" data-toggle="dropdown">
                    <?php if (array_key_exists("icon", $item) && $item['icon']): ?>
                        <i class="<?php echo htmlspecialchars($item['icon']); ?>"></i>&nbsp;
                    <?php endif; ?>
                    <?php echo $item['text']; ?></a>
                <div class="dropdown-menu">
                    <?php foreach ($children as $child): ?>
                        <a href="<?php echo htmlspecialchars($child['url']); ?>" class="dropdown-item">
                            <?php if (array_key_exists("icon", $child) && $child['icon']): ?>
                                <i class="<?php echo htmlspecialchars($child['icon']); ?>"></i>&nbsp;
                            <?php endif; ?>
                            <?php echo $child['text']; ?></a>
                        </a>
                    <?php endforeach; ?>
                </div>
            </li>
        <?php else: ?>

            <li class="nav-item <?php echo $links_item_class; ?>">
                <a href="<?php echo htmlspecialchars($item['url']); ?>"
                   class="nav-link">
                    <?php if (array_key_exists("icon", $item) && $item['icon']): ?>
                        <i class="<?php echo htmlspecialchars($item['icon']); ?>"></i>&nbsp;
                    <?php endif; ?>
                    <?php echo $item['text']; ?></a>
            </li>
        <?php endif; ?>
        <?php endforeach; ?>
    </ul>
    <?php
};


?>



<nav
        class="kit-bwl-mainnav
        navbar navbar-expand-<?php echo $z['expand_size'] ?? 'md'; ?>
<?php if (true === $fixedTop): ?>

fixed-top
<?php endif; ?>

<?php echo htmlspecialchars($this->getCssClass()); ?>

"
    <?php echo $this->getAttributesHtml(); ?>
>
    <div class="container">
        <?php if (null === $titleLogo): ?>
            <a href="<?php echo htmlspecialchars($titleUrl); ?>" class="navbar-brand"><?php echo $title; ?></a>
        <?php else: ?>
            <a href="<?php echo htmlspecialchars($titleUrl); ?>" class="navbar-brand">
                <img src="<?php echo htmlspecialchars($titleLogo['url']); ?>"
                     width="<?php echo htmlspecialchars($titleLogo['width']); ?>"
                     height="<?php echo htmlspecialchars($titleLogo['height']); ?>"
                     alt="<?php echo htmlspecialchars($titleLogo['alt']); ?>">
                <h3 class="d-inline align-middle"><?php echo $title; ?></h3>
            </a>
        <?php endif; ?>


        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>


        <?php if ($links || $links2): ?>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <?php if ($links): ?>
                    <?php $linksCallback($links, [
                        "links_align_right" => $linksAlignRight,
                        "links_item_class" => $linksItemClass,
                    ]) ?>
                <?php endif; ?>


                <?php if ($links2): ?>
                    <?php $linksCallback($links2, [
                        "links_align_right" => $links2AlignRight,
                        "links_item_class" => $links2ItemClass,
                    ]) ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>


    </div>
</nav>
