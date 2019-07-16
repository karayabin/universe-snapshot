<?php


/**
 * @var $this PicassoWidget
 */

use Ling\Kit_PicassoWidget\Widget\PicassoWidget;

$columnClass = $z['column_class'] ?? "col-md-3";
$nbBoxesPerRow = $z['nb_boxes_per_row'] ?? null;
$rowClass = $z['row_class'] ?? "";
$boxes = $z['boxes'] ?? [];

$cpt = 0;
?>


<section class="kit-bwl-colored_boxes <?php echo htmlspecialchars($this->getCssClass()); ?>"
    <?php echo $this->getAttributesHtml(); ?>
>
    <div class="container">

        <div class="row <?php echo htmlspecialchars($rowClass); ?>">
            <?php foreach ($boxes

            as $box):
            $cpt++;
            ?>


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


            <?php if (null !== $nbBoxesPerRow && $cpt === (int)$nbBoxesPerRow):
            $cpt = 0;
            ?>
        </div>
        <div class="row <?php echo htmlspecialchars($rowClass); ?>">
            <?php endif; ?>


            <?php endforeach; ?>
        </div>
    </div>
</section>

