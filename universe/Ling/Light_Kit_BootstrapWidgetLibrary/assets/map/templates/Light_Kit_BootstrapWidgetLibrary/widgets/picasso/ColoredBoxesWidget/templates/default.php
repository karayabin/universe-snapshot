<?php


/**
 * @var $this PicassoWidget
 */

use Ling\Kit_PicassoWidget\Widget\PicassoWidget;

$columnClass = $z['column_class'] ?? "col-md-3";
$boxes = $z['boxes'] ?? [];


?>


<section class="kit-bwl-colored_boxes <?php echo htmlspecialchars($this->getCssClass()); ?>"
    <?php echo $this->getAttributesHtml(); ?>
>
    <div class="container">
        <div class="row">
            <?php foreach ($boxes as $box): ?>
                <div class="<?php echo htmlspecialchars($columnClass); ?>">
                    <div class="card text-<?php echo htmlspecialchars($box['text_align'] ?? "center"); ?> <?php echo htmlspecialchars($box['class']); ?>">
                        <div class="card-body">
                            <?php if (false === empty($box['icon'])): ?>
                                <i class="<?php echo htmlspecialchars($box['icon']); ?>"></i>
                            <?php endif; ?>
                            <h3 class="<?php echo htmlspecialchars($box['title_class']); ?>"><?php echo $box['title'] ?? "No title"; ?></h3>
                            <p class="<?php echo htmlspecialchars($box['text_class']); ?>"><?php echo $box['text']; ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

