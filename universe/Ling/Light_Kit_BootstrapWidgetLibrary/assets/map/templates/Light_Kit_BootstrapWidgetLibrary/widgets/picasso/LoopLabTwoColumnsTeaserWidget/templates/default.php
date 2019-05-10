<?php


/**
 * @var $this PicassoWidget
 */

use Ling\Kit_PicassoWidget\Widget\PicassoWidget;


$imgOnLeft = $z['img_on_left'] ?? true;
$imgRounded = $z['img_rounded'] ?? true;
$imgAlt = $z['img_alt'] ?? "";
$imgSrc = $z['img_src'] ?? "";
$teaserTitle = $z['teaser_title'] ?? "No title";
$teaserText = $z['teaser_text'] ?? "";
$teaserItems = $z['teaser_items'] ?? [];


$image = function () use (
    $imgRounded,
    $imgAlt,
    $imgSrc
) {
    ?>
    <div class="col-md-6">
        <img src="<?php echo htmlspecialchars($imgSrc); ?>" alt="<?php echo htmlspecialchars($imgAlt); ?>"
             class="img-fluid mb-3 <?php echo ($imgRounded) ? "rounded-circle" : ''; ?>">
    </div>
    <?php
};


$teaser = function () use (
    $teaserTitle,
    $teaserText,
    $teaserItems
) {
    ?>
    <div class="col-md-6">
        <h3><?php echo $teaserTitle; ?></h3>
        <p><?php echo $teaserText; ?></p>
        <?php foreach ($teaserItems as $item): ?>
            <div class="d-flex">
                <div class="p-4 align-self-start">
                    <i class="<?php echo $item['icon'] ?? ""; ?>"></i>
                </div>
                <div class="p-4 align-self-end"><?php echo $item['text']; ?></div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php
};


?>



<section class="kit-bwl-2c_teaser <?php echo htmlspecialchars($this->getCssClass()); ?>"
    <?php echo $this->getAttributesHtml(); ?>>
    <div class="container">
        <div class="row">

            <?php if (true === $imgOnLeft): ?>
                <?php echo $image(); ?>
                <?php echo $teaser(); ?>
            <?php else: ?>
                <?php echo $teaser(); ?>
                <?php echo $image(); ?>
            <?php endif; ?>


        </div>
    </div>
</section>