<?php


/**
 * @var $this PicassoWidget
 */

use Ling\Kit_PicassoWidget\Widget\PicassoWidget;

$text = $z['text'] ?? "hello world";
?>


<section class="kit-bwl-hello_world <?php echo htmlspecialchars($this->getCssClass()); ?>"
    <?php echo $this->getAttributesHtml(); ?>
>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h5><?php echo $text; ?></h5>
                    </div>
                    <div class="card-body">
                        This is the body of the card.
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
