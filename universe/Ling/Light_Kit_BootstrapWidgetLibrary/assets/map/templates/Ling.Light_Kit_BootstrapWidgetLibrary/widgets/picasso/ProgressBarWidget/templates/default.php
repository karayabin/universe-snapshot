<?php


/**
 * @var $this PicassoWidget
 */


use Ling\Kit_PicassoWidget\Widget\PicassoWidget;

$title = $z['title'] ?? "";
$description = $z['description'] ?? "";
$progress_bars = $z['progress_bars'] ?? [];


?>

<div class="kit-bwl-progress_bar card card-body <?php echo htmlspecialchars($this->getCssClass()); ?>"
    <?php echo $this->getAttributesHtml(); ?>
>
    <?php if ($title): ?>
        <h3><?php echo $title; ?></h3>
    <?php endif; ?>

    <?php if ($description): ?>
        <p><?php echo $description; ?></p>
    <?php endif; ?>

    <?php if ($title || $description): ?>
        <hr>
    <?php endif; ?>

    <?php foreach ($progress_bars as $bar): ?>
        <h4><?php echo $bar['text']; ?></h4>
        <div class="progress mb-3">
            <div class="progress-bar <?php echo htmlspecialchars($bar['class']); ?>"
                 style="width: <?php echo htmlspecialchars($bar['percent']); ?>%"></div>
        </div>
    <?php endforeach; ?>
</div>