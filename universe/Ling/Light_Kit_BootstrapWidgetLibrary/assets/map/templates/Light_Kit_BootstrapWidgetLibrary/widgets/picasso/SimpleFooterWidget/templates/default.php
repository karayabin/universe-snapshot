<?php


/**
 * @var $this PicassoWidget
 */


use Ling\Kit_PicassoWidget\Widget\PicassoWidget;

$textAlign = $z['text_align'] ?? "center";
$textClass = $z['text_class'] ?? "lead";
$text = $z['text'] ?? "Copyright &copy; " . date("Y");


?>

<footer class="kit-bwl-simple_footer <?php echo htmlspecialchars($this->getCssClass()); ?>"
    <?php echo $this->getAttributesHtml(); ?>
>
    <div class="container">
        <div class="row text-<?php echo htmlspecialchars($textAlign); ?>">
            <div class="col">
                <p class="<?php echo htmlspecialchars($textClass); ?>"><?php echo $text; ?></p>
            </div>
        </div>
    </div>
</footer>