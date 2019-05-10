<?php


/**
 * @var $this PicassoWidget
 */

use Ling\Kit_PicassoWidget\Widget\PicassoWidget;



$title = $z['title'] ?? "No title";
$text = $z['text'] ?? "";
$buttonUrl = $z['button_url'] ?? "#";
$buttonClass = $z['button_class'] ?? "btn btn-outline-secondary";
$buttonText = $z['button_text'] ?? "Find Out More";

?>


<section class="kit-bwl-monochrome_header <?php echo htmlspecialchars($this->getCssClass()); ?>" <?php echo $this->getAttributesHtml(); ?>>
    <div class="container">
        <div class="row">
            <div class="col text-center py-5">
                <h1 class="display-4"><?php echo $title; ?></h1>
                <p class="lead"><?php echo $text; ?></p>
                <a href="<?php echo htmlspecialchars($buttonUrl); ?>"
                   class="<?php echo htmlspecialchars($buttonClass); ?>"><?php echo $buttonText; ?></a>
            </div>
        </div>
    </div>
</section>