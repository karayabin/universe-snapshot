<?php


/**
 * @var $this PicassoWidget
 */

use Ling\Kit_PicassoWidget\Widget\PicassoWidget;

$backgroundUrl = $z['background_url'] ?? "";
$backgroundHeight = $z['background_height'] ?? "200px";
$backgroundPosition = $z['background_position'] ?? "0px 0px";
$overlayColor = $z['overlay_color'] ?? "rgba(0,0,0,0.7)";
$title = $z['title'] ?? "";
$text = $z['text'] ?? "";
$text_class = $z['text_class'] ?? "";


$sStyle = '';
$sStyle .= 'background-image: url(' . $backgroundUrl . '); min-height: ' . $backgroundHeight . ';';
$sStyle .= 'background-position: ' . $backgroundPosition . ';';


?>


<section class="kit-bwl-parallax_header <?php echo htmlspecialchars($this->getCssClass()); ?>"
         style="<?php echo htmlspecialchars($sStyle); ?>"
    <?php echo $this->getAttributesHtml(); ?>
>

    <div class="dark-overlay" style="background: <?php echo htmlspecialchars($overlayColor); ?>">
        <div class="row">
            <div class="col">
                <div class="container pt-5">
                    <?php if ('' !== $title): ?>
                        <h1><?php echo $title; ?></h1>
                    <?php endif; ?>
                    <?php if ('' !== $text): ?>
                        <p class="<?php echo htmlspecialchars($text_class); ?>"><?php echo $text; ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>