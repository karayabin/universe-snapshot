<?php


/**
 * @var $this PicassoWidget
 */

use Ling\Kit_PicassoWidget\Widget\PicassoWidget;

$fieldNameActive = $z['field_name_active'] ?? true;
$fieldNameName = $z['field_name_name'] ?? "name";
$fieldNameLabel = $z['field_name_label'] ?? "Enter Name";
$fieldEmailName = $z['field_email_name'] ?? "email";
$fieldEmailLabel = $z['field_email_label'] ?? "Enter Email";
$btnClass = $z['btn_class'] ?? "btn btn-primary btn-lg btn-block";
$btnIcon = $z['btn_icon'] ?? "fas fa-envelope-open";
$btnText = $z['btn_text'] ?? "Subscribe";


?>


<section class="kit-bwl-mizuxe_newsletter_signup_header <?php echo htmlspecialchars($this->getCssClass()); ?>"
    <?php echo $this->getAttributesHtml(); ?>
>
    <div class="container">
        <div class="row">
            <?php if (true === $fieldNameActive): ?>
                <div class="col-md-4">
                    <input name="<?php echo htmlspecialchars($fieldNameName); ?>" type="text"
                           class="form-control form-control-lg mb-resp"
                           placeholder="<?php echo htmlspecialchars($fieldNameLabel); ?>">
                </div>
            <?php endif; ?>

            <div class="col-md-4 <?php echo (false === $fieldNameActive) ? "offset-2" : ""; ?>">
                <input
                        name="<?php echo htmlspecialchars($fieldEmailName); ?>"
                        type="email" class="form-control form-control-lg mb-resp"
                        placeholder="<?php echo htmlspecialchars($fieldEmailLabel); ?>">
            </div>
            <div class="col-md-4">
                <button class="<?php echo htmlspecialchars($btnClass); ?>">
                    <i class="<?php echo htmlspecialchars($btnIcon); ?>"></i>
                    <?php echo $btnText; ?>
                </button>
            </div>
        </div>
    </div>
</section>