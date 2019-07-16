<?php


/**
 * @var $this PicassoWidget
 */


use Ling\Kit_PicassoWidget\Widget\PicassoWidget;

$icon = $z['icon'] ?? "";
$title = $z['title'] ?? "";


?>

<header class="kit-bwl-blogen_icon_header <?php echo htmlspecialchars($this->getCssClass()); ?>"
    <?php echo $this->getAttributesHtml(); ?>
>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>
                    <?php if ($icon): ?>
                        <i class="<?php echo htmlspecialchars($icon); ?>"></i>
                    <?php endif; ?>
                    <?php if ($title): ?>
                        <?php echo $title; ?>
                    <?php endif; ?>
                </h1>
            </div>
        </div>
    </div>
</header>
