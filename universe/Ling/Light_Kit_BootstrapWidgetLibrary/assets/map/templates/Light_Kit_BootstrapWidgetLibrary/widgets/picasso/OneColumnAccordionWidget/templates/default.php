<?php


/**
 * @var $this PicassoWidget
 */

use Ling\Bat\StringTool;
use Ling\Kit_PicassoWidget\Widget\PicassoWidget;

$titleVisible = $z['title_visible'] ?? true;
$title = $z['title'] ?? "No title";
$titleClass = $z['title_class'] ?? "text-primary pb-3";
$textVisible = $z['text_visible'] ?? true;
$text = $z['text'] ?? "";
$textClass = $z['text_class'] ?? "lead pb-3";
$accordionVisible = $z['accordion_visible'] ?? true;
$accordionItems = $z['accordion_items'] ?? [];


$cssId = StringTool::getUniqueCssId("one_column_accordion-");
$cpt = 1;

?>


<section class="kit-bwl-one_column_accordion <?php echo htmlspecialchars($this->getCssClass()); ?>"
    <?php echo $this->getAttributesHtml(); ?>
>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="info-header mb-5">
                    <?php if (true === $titleVisible): ?>
                        <h1 class="<?php echo htmlspecialchars($titleClass); ?>">
                            <?php echo $title; ?>
                        </h1>
                    <?php endif; ?>
                    <?php if (true === $textVisible): ?>
                        <p class="<?php echo htmlspecialchars($textVisible); ?>">
                            <?php echo $text; ?>
                        </p>
                    <?php endif; ?>
                </div>


                <?php if (true === $accordionVisible): ?>
                    <div id="accordion">
                        <?php foreach ($accordionItems as $item):

                            $id = $cssId . $cpt++;
                            ?>
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">
                                        <div href="#<?php echo $id; ?>" data-toggle="collapse" data-parent="#accordion">
                                            <?php if ($item['icon']): ?>
                                                <i class="<?php echo htmlspecialchars($item['icon']); ?>"></i>
                                            <?php endif; ?>
                                            <?php echo $item['title']; ?>
                                        </div>
                                    </h5>
                                </div>
                                <div id="<?php echo $id; ?>"
                                     class="collapse <?php echo (true === $item['is_open']) ? 'show' : ''; ?>">
                                    <div class="card-body"><?php echo $item['text']; ?></div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>