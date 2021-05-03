<?php


/**
 * @var $this PicassoWidget
 */

use Ling\Kit_PicassoWidget\Widget\PicassoWidget;

$columnClass = $z['column_class'] ?? "col-md-4";
$boxes = $z['boxes'] ?? [];


?>


<section class="kit-bwl-icon_teaser <?php echo htmlspecialchars($this->getCssClass()); ?>"
    <?php echo $this->getAttributesHtml(); ?>
>
    <div class="container">
        <div class="row">
            <?php foreach ($boxes as $box):
                $class = $box['class'] ?? "";
                $icon = $box['icon'] ?? "";
                $title = $box['title'] ?? "";
                $text = $box['text'] ?? "";
                ?>
                <div class="<?php echo htmlspecialchars($columnClass); ?> <?php echo $class; ?>">
                    <?php if ($icon): ?>
                        <i class="<?php echo htmlspecialchars($icon); ?>"></i>
                    <?php endif; ?>
                    <?php if ($title): ?>
                        <h3><?php echo $title; ?></h3>
                    <?php endif; ?>
                    <?php if ($text): ?>
                        <p><?php echo $text; ?></p>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
