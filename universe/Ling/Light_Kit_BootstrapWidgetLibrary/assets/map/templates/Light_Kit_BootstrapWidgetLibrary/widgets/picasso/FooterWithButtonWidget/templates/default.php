<?php


/**
 * @var $this PicassoWidget
 */


use Ling\Kit_PicassoWidget\Widget\PicassoWidget;

$column_class = $z['column_class'] ?? "col-md-6";
$icon = $z['icon'] ?? "";
$button_class = $z['button_class'] ?? "";
$button_url = $z['button_url'] ?? "";
$button_text = $z['button_text'] ?? "";


?>

<footer class="kit-bwl-footer_with_button <?php echo htmlspecialchars($this->getCssClass()); ?>"
    <?php echo $this->getAttributesHtml(); ?>
>
    <div class="row">
        <div class="<?php echo htmlspecialchars($column_class); ?>">
            <a
                    href="<?php echo htmlspecialchars($button_url); ?>"
                    class="<?php echo htmlspecialchars($button_class); ?>">
                <?php if ($icon): ?>
                    <i class="<?php echo htmlspecialchars($icon); ?>"></i>
                <?php endif; ?>
                <?php if ($button_text): ?>
                    <?php echo $button_text; ?>
                <?php endif; ?>
            </a>
        </div>
    </div>
</footer>