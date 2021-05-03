<?php


/**
 * @var $this PicassoWidget
 */

use Ling\Kit_PicassoWidget\Widget\PicassoWidget;

$content = $z['content'] ?? "This is the free content widget";
?>


<section class="kit-bwl-free_content_widget <?php echo htmlspecialchars($this->getCssClass()); ?>"
    <?php echo $this->getAttributesHtml(); ?>
>
    <?php echo $content; ?>
</section>
