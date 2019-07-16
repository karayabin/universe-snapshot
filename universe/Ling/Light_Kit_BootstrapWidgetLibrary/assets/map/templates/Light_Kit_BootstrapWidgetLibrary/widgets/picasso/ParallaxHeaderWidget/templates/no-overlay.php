<?php


/**
 * @var $this PicassoWidget
 */

use Ling\Kit_PicassoWidget\Widget\PicassoWidget;

$backgroundUrl = $z['background_url'] ?? "";
$backgroundHeight = $z['background_height'] ?? "200px";
$backgroundPosition = $z['background_position'] ?? "0px 0px";
$title = $z['title'] ?? "";
$text = $z['text'] ?? "";
$text_class = $z['text_class'] ?? "";


$sStyle = '';
$sStyle .= 'background-image: url(' . $backgroundUrl . '); min-height: ' . $backgroundHeight . ';';
$sStyle .= 'background-position: ' . $backgroundPosition . ';';

?>


<header class="kit-bwl-parallax_header <?php echo htmlspecialchars($this->getCssClass()); ?>"
        style="<?php echo htmlspecialchars($sStyle); ?>"
    <?php echo $this->getAttributesHtml(); ?>
>
    <div class="container">
        <div class="row">
            <div class="col-md-6 m-auto text-center">
                <?php if ('' !== $title): ?>
                    <h1><?php echo $title; ?></h1>
                <?php endif; ?>
                <?php if ('' !== $text): ?>
                    <p class="<?php echo htmlspecialchars($text_class); ?>"><?php echo $text; ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>