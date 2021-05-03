<?php


/**
 * @var $this PicassoWidget
 */


use Ling\Kit_PicassoWidget\Widget\PicassoWidget;

$title = $z['title'] ?? "";
$description = $z['description'] ?? "";
$cards = $z['cards'] ?? [];

?>
<div class="kit-bwl-portfoliogrid_three_columns_card_info card card-body <?php echo htmlspecialchars($this->getCssClass()); ?>"
    <?php echo $this->getAttributesHtml(); ?>
>
    <?php if ($title): ?>
        <h3><?php echo $title; ?></h3>
    <?php endif; ?>
    <?php if ($description): ?>
        <p><?php echo $description; ?></p>
    <?php endif; ?>

    <?php if ($cards): ?>

        <div class="card-deck">
            <?php foreach ($cards as $card):
                $title = $card['title'] ?? '';
                $description = $card['description'] ?? '';
                $features = $card['features'] ?? [];
                $footer_text = $card['footer_text'] ?? '';
                ?>
                <div class="card">
                    <div class="card-body">
                        <?php if ($title): ?>
                            <h4 class="card-title"><?php echo $title; ?></h4>
                        <?php endif; ?>
                        <?php if ($description): ?>
                            <p class="card-text"><?php echo $description; ?></p>
                        <?php endif; ?>
                        <?php foreach ($features as $feature): ?>
                            <p class="<?php echo htmlspecialchars($feature['class']); ?>">
                                <?php echo $feature['text']; ?>
                            </p>
                        <?php endforeach; ?>
                    </div>
                    <?php if ($footer_text): ?>
                        <div class="card-footer">
                            <h6 class="text-muted"><?php echo $footer_text; ?></h6>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>

        </div>
    <?php endif; ?>
</div>