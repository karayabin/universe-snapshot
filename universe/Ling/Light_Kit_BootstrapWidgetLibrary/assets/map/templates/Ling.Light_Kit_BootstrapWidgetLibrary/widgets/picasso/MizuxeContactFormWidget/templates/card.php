<?php


/**
 * @var $this PicassoWidget
 */


use Ling\Kit_PicassoWidget\Widget\PicassoWidget;
use Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\Util\MizuxeContactFormWidgetUtil;


$showImage = $z['show_image'] ?? true;
$imageUrl = $z['image_url'] ?? "";
$imageAlt = $z['image_alt'] ?? "";
$formAction = $z['form_action'] ?? "";
$formMethod = $z['form_method'] ?? "post";


?>


<div class="kit-bwl-mizuxe_contact_form card card-body <?php echo htmlspecialchars($this->getCssClass()); ?>"
    <?php echo $this->getAttributesHtml(); ?>
>

    <div class="row">
        <div class="col">
            <?php MizuxeContactFormWidgetUtil::printForm($z); ?>
        </div>

        <?php if (true === $showImage): ?>
            <div class="col-lg-3 align-self-center">
                <img src="<?php echo htmlspecialchars($imageUrl); ?>"
                     alt="<?php echo htmlspecialchars($imageAlt); ?>" class="img-fluid">
            </div>
        <?php endif; ?>
    </div>
</div>