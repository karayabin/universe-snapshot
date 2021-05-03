<?php


/**
 * @var $this PicassoWidget
 */


use Ling\Kit_PicassoWidget\Widget\PicassoWidget;

$column_class = $z['column_class'] ?? "col-md-3";
$buttons = $z['buttons'] ?? [];


?>

<section class="kit-bwl-blogen_header_with_action_buttons <?php echo htmlspecialchars($this->getCssClass()); ?>"
    <?php echo $this->getAttributesHtml(); ?>
>
    <div class="container">
        <div class="row">
            <?php foreach ($buttons as $button):
                $class = $button['class'] ?? '';
                $icon = $button['icon'] ?? '';
                $url = $button['url'] ?? '';
                $text = $button['text'] ?? '';
                ?>
                <div class="<?php echo htmlspecialchars($column_class); ?>">
                    <a href="<?php echo htmlspecialchars($url); ?>" class="<?php echo htmlspecialchars($class); ?>">
                        <?php if ($icon): ?>
                            <i class="<?php echo htmlspecialchars($icon); ?>"></i>
                        <?php endif; ?>
                        <?php if ($text): ?>
                            <?php echo $text; ?>
                        <?php endif; ?>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>