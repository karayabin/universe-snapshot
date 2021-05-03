<?php


/**
 * @var $this PicassoWidget
 */


use Ling\Kit_PicassoWidget\Widget\PicassoWidget;
use Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\Util\PhotoGalleryWidgetUtil;



?>

<section class="kit-bwl-photo_gallery <?php echo htmlspecialchars($this->getCssClass()); ?>"
    <?php echo $this->getAttributesHtml(); ?>
>
    <div class="container">
        <?php PhotoGalleryWidgetUtil::printPhotoGallery($z) ?>
    </div>
</section>