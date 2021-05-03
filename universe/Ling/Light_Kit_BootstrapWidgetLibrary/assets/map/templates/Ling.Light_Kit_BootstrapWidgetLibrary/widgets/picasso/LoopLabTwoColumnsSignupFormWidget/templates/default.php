<?php

/**
 * @var $this PicassoWidget
 */

use Ling\Kit_PicassoWidget\Widget\PicassoWidget;


$showTeaser = $z['showTeaser'] ?? true;
$formAlignRight = $z['form_align_right'] ?? true;
$teaserVisibleSize = $z['teaser_visible_size'] ?? "lg";
$teaserTitle = $z['teaser_title'] ?? "No title";
$teaserItems = $z['teaser_items'] ?? [];

$formTitle = $z['form_title'] ?? "";
$formSubTitle = $z['form_subtitle'] ?? "";
$formFields = $z['form_fields'] ?? [];
$formSubmitValue = $z['form_submit_value'] ?? "Submit";
$formSubmitClass = $z['form_submit_class'] ?? "btn btn-outline-light btn-block";


?>



<?php
$teaser = function () use (
    $teaserVisibleSize,
    $teaserTitle,
    $teaserItems
) {
    ?>
    <div class="col-lg-8 d-none d-<?php echo $teaserVisibleSize; ?>-block">
        <h1 class="display-4"><?php echo $teaserTitle; ?></h1>
        <?php foreach ($teaserItems as $item):

            $icon = $item['icon'] ?? "fas fa-check fa-2x";
            $text = $item['text'] ?? "";

            ?>
            <div class="d-flex">
                <div class="p-4 align-self-start">
                    <i class="<?php echo $icon; ?>"></i>
                </div>
                <div class="p-4 align-self-end"><?php echo $text; ?></div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php
};


$form = function () use (
    $formTitle,
    $formSubTitle,
    $formFields,
    $formSubmitValue,
    $formSubmitClass
) {
    ?>
    <div class="col-lg-4">
        <div class="card bg-primary text-center card-form">
            <div class="card-body">
                <?php if ($formTitle): ?>
                    <h3><?php echo $formTitle; ?></h3>
                <?php endif; ?>
                <?php if ($formSubTitle): ?>
                    <p><?php echo $formSubTitle; ?></p>
                <?php endif; ?>
                <form>
                    <?php foreach ($formFields as $item): ?>
                        <div class="form-group">
                            <input
                                    name="<?php echo htmlspecialchars($item['name']); ?>"
                                    type="<?php echo htmlspecialchars($item['type']); ?>"
                                    class="form-control form-control-lg"
                                    placeholder="<?php echo htmlspecialchars($item['placeholder']); ?>">
                        </div>
                    <?php endforeach; ?>
                    <input type="submit" value="<?php echo htmlspecialchars($formSubmitValue); ?>"
                           class="<?php echo htmlspecialchars($formSubmitClass); ?>">
                </form>
            </div>
        </div>
    </div>
    <?php
};

?>


<section <?php echo $this->getAttributesHtml(); ?>
        class="kit-bwl-2c_signup_form <?php echo htmlspecialchars($this->getCssClass()); ?>">
    <div class="dark-overlay">
        <div class="home-inner container">
            <div class="row">

                <?php if (true === $formAlignRight): ?>
                    <?php if (true === $showTeaser): ?>
                        <?php echo $teaser(); ?>
                    <?php else: ?>
                        <div class="col-lg-8 d-none d-<?php echo $teaserVisibleSize; ?>-block"></div>
                    <?php endif; ?>
                    <?php echo $form(); ?>
                <?php else: ?>
                    <?php echo $form(); ?>
                    <?php if (true === $showTeaser): ?>
                        <?php echo $teaser(); ?>
                    <?php endif; ?>
                <?php endif; ?>


            </div>
        </div>
    </div>
</section>