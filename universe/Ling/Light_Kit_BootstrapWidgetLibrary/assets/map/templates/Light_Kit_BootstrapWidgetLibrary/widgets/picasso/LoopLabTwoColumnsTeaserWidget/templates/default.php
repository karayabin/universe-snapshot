<?php


/**
 * @var $this PicassoWidget
 */

use Ling\Kit_PicassoWidget\Widget\PicassoWidget;


$imgOnLeft = $z['img_on_left'] ?? true;
$imgRounded = $z['img_rounded'] ?? true;
$imgAlt = $z['img_alt'] ?? "";
$imgSrc = $z['img_src'] ?? "";
$imgTopMargin = $z['img_top_margin'] ?? "0px";
$teaserTitle = $z['teaser_title'] ?? "No title";
$teaserTitleLevel = $z['teaser_title_level'] ?? "3";
$teaserText = $z['teaser_text'] ?? "";
$teaserItems = $z['teaser_items'] ?? [];


// formatting
if (false === is_array($teaserText)) {
    $teaserText = [$teaserText];
}
$teaserTitleLevel = (int)$teaserTitleLevel;


// functions
$image = function () use (
    $imgRounded,
    $imgAlt,
    $imgTopMargin,
    $imgSrc
) {
    ?>
    <div class="col-md-6">
        <img src="<?php echo htmlspecialchars($imgSrc); ?>" alt="<?php echo htmlspecialchars($imgAlt); ?>"
             class="img-fluid mb-3 <?php echo ($imgRounded) ? "rounded-circle" : ''; ?>"
             style="margin-top: <?php echo htmlspecialchars($imgTopMargin); ?>"
        >
    </div>
    <?php
};


$teaser = function () use (
    $teaserTitle,
    $teaserTitleLevel,
    $teaserText,
    $teaserItems
) {
    ?>
    <div class="col-md-6">
        <h<?php echo $teaserTitleLevel; ?>><?php echo $teaserTitle; ?></h<?php echo $teaserTitleLevel; ?>>
        <?php foreach ($teaserText as $text): ?>
            <p><?php echo $text; ?></p>
        <?php endforeach; ?>
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