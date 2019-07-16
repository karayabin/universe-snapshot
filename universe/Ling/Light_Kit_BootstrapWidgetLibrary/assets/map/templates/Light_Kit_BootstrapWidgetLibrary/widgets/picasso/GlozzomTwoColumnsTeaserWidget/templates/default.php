<?php


/**
 * @var $this PicassoWidget
 */


use Ling\Kit_PicassoWidget\Widget\PicassoWidget;

$teaser_align_left = $z['teaser_align_left'] ?? true;
$title = $z['title'] ?? "";
$text = $z['text'] ?? "";
$btn_url = $z['btn_url'] ?? "#";
$btn_class = $z['btn_class'] ?? "";
$btn_text = $z['btn_text'] ?? "";
$img_url = $z['img_url'] ?? "";
$img_alt = $z['img_alt'] ?? "";


$image = function () use (
    $img_url,
    $img_alt
) {
    ?>
    <div class="col-md-6">
        <img src="<?php echo htmlspecialchars($img_url); ?>"
             alt="<?php echo htmlspecialchars($img_alt); ?>" class="img-fluid">
    </div>
    <?php
};

?>

<section class="kit-bwl-glozzom_2c_teaser <?php echo htmlspecialchars($this->getCssClass()); ?>"
    <?php echo $this->getAttributesHtml(); ?>
>
    <div class="container">
        <div class="row">

            <?php if (false === $teaser_align_left): ?>
                <?php $image(); ?>
            <?php endif; ?>

            <div class="col-md-6 align-self-center">
                <h3><?php echo $title; ?></h3>
                <p><?php echo $text; ?></p>
                <a href="<?php echo htmlspecialchars($btn_url); ?>"
                   class="btn <?php echo htmlspecialchars($btn_class); ?>"><?php echo $btn_text; ?></a>
            </div>

            <?php if (true === $teaser_align_left): ?>
                <?php $image(); ?>
            <?php endif; ?>
        </div>
    </div>
</section>
