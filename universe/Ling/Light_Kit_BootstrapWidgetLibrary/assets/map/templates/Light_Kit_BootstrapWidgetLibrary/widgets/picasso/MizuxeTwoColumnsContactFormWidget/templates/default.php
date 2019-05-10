<?php


/**
 * @var $this PicassoWidget
 */


use Ling\Kit_PicassoWidget\Widget\PicassoWidget;

$showImage = $z['show_image'] ?? true;
$imageUrl = $z['image_url'] ?? "";
$imageAlt = $z['image_alt'] ?? "";
$formAction = $z['form_action'] ?? "";
$formMethod = $z['form_method'] ?? "post";
$formTitle = $z['form_title'] ?? "No title";
$formText = $z['form_text'] ?? "";
$fields = $z['form_fields'] ?? [];
$btnText = $z['submit_btn_text'] ?? "Submit";
$btnClass = $z['submit_btn_class'] ?? "btn btn-primary btn-block btn-lg";


?>


<section class="kit-bwl-mizuxe_2c_contact_form <?php echo htmlspecialchars($this->getCssClass()); ?>"
    <?php echo $this->getAttributesHtml(); ?>
>
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <?php if ($formTitle): ?>
                    <h3><?php echo $formTitle; ?></h3>
                <?php endif; ?>

                <?php if ($formText): ?>
                    <p class="lead"><?php echo $formText; ?></p>
                <?php endif; ?>
                <form>
                    <?php foreach ($fields as $field):
                        $icon = $field['icon'] ?? "";
                        $type = $field['type'];
                        ?>
                        <div class="input-group input-group-lg mb-3">
                            <?php if ($icon): ?>
                                <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="<?php echo htmlspecialchars($icon); ?>"></i>
                            </span>
                                </div>
                            <?php endif; ?>

                            <?php switch ($type):
                                case 'text':
                                case 'email':
                                    ?>
                                    <input
                                            type="<?php echo $type; ?>" class="form-control"
                                            name="<?php echo htmlspecialchars($field['name']); ?>"
                                            placeholder="<?php echo htmlspecialchars($field['label']); ?>"
                                    >
                                    <?php break;
                                case 'textarea':
                                    ?>
                                    <textarea class="form-control"
                                              placeholder="<?php echo htmlspecialchars($field['label']); ?>"
                                              rows="5"
                                              name="<?php echo htmlspecialchars($field['name']); ?>"
                                    ></textarea>
                                    <?php break; ?>
                                <?php default: ?>
                                    <?php break; ?>
                                <?php endswitch; ?>


                        </div>
                    <?php endforeach; ?>


                    <input type="submit" value="<?php echo htmlspecialchars($btnText); ?>"
                           class="<?php echo htmlspecialchars($btnClass); ?>">
                </form>
            </div>

            <?php if (true === $showImage): ?>
                <div class="col-lg-3 align-self-center">
                    <img src="<?php echo htmlspecialchars($imageUrl); ?>"
                         alt="<?php echo htmlspecialchars($imageAlt); ?>" class="img-fluid">
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>