<?php


/**
 * @var $this PicassoWidget
 */


use Ling\Bat\StringTool;
use Ling\Kit_PicassoWidget\Widget\PicassoWidget;

$title = $z['title'] ?? "";
$one_items = $z['one_items'] ?? [];
$two_items = $z['two_items'] ?? [];

$cssIdOne = StringTool::getUniqueCssId('two_columns_accordion_one-');
$cssIdTwo = StringTool::getUniqueCssId('two_columns_accordion_two-');
$itemCpt = 1;


$accordion = function ($id, $items) use (&$itemCpt) {
    $itemCpt++;
    $itemId = 'two_columns_accordion_collapse-' . $itemCpt;
    ?>
    <div class="col-md-6">
        <div id="<?php echo $id; ?>">
            <?php foreach ($items as $item):

                $isOpen = $item['is_open'] ?? false;
                $sShow = '';
                if (true === $isOpen) {
                    $sShow = 'show';
                }
                ?>
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">
                            <a href="#<?php echo $itemId; ?>" data-toggle="collapse" data-parent="<?php echo $id; ?>">
                                <?php echo $item['title']; ?>
                            </a>
                        </h5>
                    </div>
                    <div id="<?php echo $itemId; ?>" class="collapse <?php echo $sShow; ?>">
                        <div class="card-body">
                            <?php echo $item['text']; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php
};

?>

<section class="kit-bwl-two_columns_accordion <?php echo htmlspecialchars($this->getCssClass()); ?>"
    <?php echo $this->getAttributesHtml(); ?>
>
    <div class="container">
        <?php if ('' !== $title): ?>
            <h1 class="text-center"><?php echo $title; ?></h1>
        <?php endif; ?>
        <hr>
        <div class="row">
            <?php $accordion($cssIdOne, $one_items); ?>
            <?php $accordion($cssIdTwo, $two_items); ?>
        </div>
    </div>
</section>
