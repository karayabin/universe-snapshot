<?php


/**
 * @var $this PicassoWidget
 */

use Ling\Kit_PicassoWidget\Widget\PicassoWidget;


$teaserTitle = $z['teaser_title'] ?? "No title";
$teaserText = $z['teaser_text'] ?? "";
$teaserTextAlign = $z['teaser_text_align'] ?? "center";
$btnUrl = $z['teaser_button_url'] ?? "#";
$btnText = $z['teaser_button_text'] ?? "Read More";
$btnIcon = $z['teaser_button_icon'] ?? "fas fa-arrow-right";
$btnClass = $z['teaser_button_class'] ?? "btn btn-outline-secondary btn-lg text-white";


$imgOnRight = $z['img_on_right'] ?? true;
$imgSizeVisible = $z['img_size_visible'] ?? "lg";
$imgSrc = $z['img_src'] ?? '';
$imgAlt = $z['img_alt'] ?? '';


$bgStyle = $z['bg_style'] ?? 'transparent';
$bgOverlayStyle = $z['bg_overlay_style'] ?? 'transparent';
$bgOverlayClass = $z['bg_overlay_class'] ?? '';


$teaser = function () use (
    $teaserTitle,
    $teaserText,
    $teaserTextAlign,
    $btnUrl,
    $btnText,
    $btnIcon,
    $btnClass
) {
    ?>
    <div class="col-lg-6 text-<?php echo $teaserTextAlign; ?>">
        <h1 class="display-2 mt-5 pt-5"><?php echo $teaserTitle; ?></h1>
        <p class="lead"><?php echo $teaserText; ?></p>
        <a href="<?php echo htmlspecialchars($btnUrl); ?>" class="<?php echo htmlspecialchars($btnClass); ?>">
            <?php if ($btnIcon): ?>
                <i class="<?php echo htmlspecialchars($btnIcon); ?>"></i>
            <?php endif; ?>
            <?php echo $btnText; ?>
        </a>
    </div>
    <?php
};
$image = function () use (
    $imgSrc,
    $imgAlt,
    $imgSizeVisible
) {
    ?>
    <div class="col-lg-6">
        <img src="<?php echo htmlspecialchars($imgSrc); ?>"
             alt="<?php echo htmlspecialchars($imgAlt); ?>"
             class="img-fluid d-none d-<?php echo htmlspecialchars($imgSizeVisible); ?>-block">
    </div>
    <?php
};


?>



<section class="kit-bwl-mizuxe_2c_teaser <?php echo htmlspecialchars($this->getCssClass()); ?>"
    <?php echo $this->getAttributesHtml(); ?>
         style="background: <?php echo htmlspecialchars($bgStyle); ?>"
>

    <div class="primary-overlay <?php echo htmlspecialchars($bgOverlayClass); ?>"
         style="background: <?php echo htmlspecialchars($bgOverlayStyle); ?>">
        <div class="container">
            <div class="row">
                <?php if (true === $imgOnRight): ?>
                    <?php echo $teaser(); ?>
                    <?php echo $image(); ?>
                <?php else: ?>
                    <?php echo $image(); ?>
                    <?php echo $teaser(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>