<?php


/**
 * @var $this PicassoWidget
 */


use Ling\Kit_PicassoWidget\Widget\PicassoWidget;

$title = $z['title'] ?? "";
$description = $z['description'] ?? "";


?>

<div class="kit-bwl-portfoliogrid_header_with_description card card-body <?php echo htmlspecialchars($this->getCssClass()); ?>"
    <?php echo $this->getAttributesHtml(); ?>
>
    <?php if ($title): ?>
        <h2><?php echo $title; ?></h2>
    <?php endif; ?>
    <?php if ($description): ?>
        <p class="lead"><?php echo $description; ?></p>
    <?php endif; ?>
</div>