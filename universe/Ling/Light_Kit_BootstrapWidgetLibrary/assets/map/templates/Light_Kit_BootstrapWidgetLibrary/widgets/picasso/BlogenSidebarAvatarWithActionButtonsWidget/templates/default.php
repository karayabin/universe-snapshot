<?php


/**
 * @var $this PicassoWidget
 */


use Ling\Kit_PicassoWidget\Widget\PicassoWidget;

$title = $z['title'] ?? "";
$img_src = $z['img_src'] ?? "";
$img_alt = $z['img_alt'] ?? "";
$buttons = $z['buttons'] ?? [];


?>

<div class="kit-bwl-blogen_sidebar_avatar_with_action_buttons <?php echo htmlspecialchars($this->getCssClass()); ?>"
    <?php echo $this->getAttributesHtml(); ?>
>
    <?php if ($title): ?>
        <h3><?php echo $title; ?></h3>
    <?php endif; ?>

    <?php if ($img_src): ?>
        <img src="<?php echo htmlspecialchars($img_src); ?>"
             alt="<?php echo htmlspecialchars($img_alt); ?>"
             class="d-block img-fluid mb-3">
    <?php endif; ?>

    <?php foreach ($buttons as $button): ?>
        <a class="<?php echo htmlspecialchars($button['class']); ?>"
           href="<?php echo htmlspecialchars($button['url']); ?>"
        ><?php echo $button['text']; ?></a>
    <?php endforeach; ?>
</div>