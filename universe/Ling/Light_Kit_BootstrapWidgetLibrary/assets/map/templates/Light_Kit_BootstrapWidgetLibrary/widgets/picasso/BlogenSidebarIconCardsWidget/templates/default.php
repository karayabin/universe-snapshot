<?php


/**
 * @var $this PicassoWidget
 */


use Ling\Kit_PicassoWidget\Widget\PicassoWidget;

$cards = $z['cards'] ?? [];

?>

<div class="kit-bwl-blogen_sidebar_icon_cards <?php echo htmlspecialchars($this->getCssClass()); ?>"
    <?php echo $this->getAttributesHtml(); ?>
>
    <?php foreach ($cards as $card):

        $title = $card['title'] ?? '';
        $icon = $card['icon'] ?? '';
        $number = $card['number'] ?? '';
        $btn_class = $card['btn_class'] ?? '';
        $btn_text = $card['btn_text'] ?? '';
        $btn_url = $card['btn_url'] ?? '';

        ?>
        <div class="card <?php echo $card['class']; ?>">
            <div class="card-body">
                <?php if ($title): ?>
                    <h3><?php echo $title; ?></h3>
                <?php endif; ?>
                <?php if ($icon || '' !== $number): ?>
                <?php endif; ?>
                <h4 class="display-4">
                    <?php if ($icon): ?>
                        <i class="<?php echo htmlspecialchars($icon); ?>"></i>
                    <?php endif; ?>
                    <?php if ('' !== $number): ?>
                        <?php echo $number; ?>
                    <?php endif; ?>
                </h4>
                <?php if ($btn_text): ?>
                    <a href="<?php echo htmlspecialchars($btn_url); ?>"
                       class="<?php echo htmlspecialchars($btn_class); ?>"><?php echo $btn_text; ?></a>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>