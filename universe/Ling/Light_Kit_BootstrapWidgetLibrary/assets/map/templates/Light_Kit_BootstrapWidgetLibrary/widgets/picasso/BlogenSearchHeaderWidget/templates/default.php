<?php


/**
 * @var $this PicassoWidget
 */


use Ling\Kit_PicassoWidget\Widget\PicassoWidget;

$form_action = $z['form_action'] ?? "";
$form_method = $z['form_method'] ?? "post";
$name = $z['name'] ?? "";
$label = $z['label'] ?? "";
$btn_text = $z['btn_text'] ?? "";
$btn_class = $z['btn_class'] ?? "";


?>

<section class="kit-bwl-simple_footer <?php echo htmlspecialchars($this->getCssClass()); ?>"
    <?php echo $this->getAttributesHtml(); ?>
>
    <form
            action="<?php echo htmlspecialchars($form_action); ?>"
            method="<?php echo htmlspecialchars($form_method); ?>"
    >
        <div class="container">
            <div class="row">
                <div class="col-md-6 ml-auto">
                    <div class="input-group">
                        <input
                                name="<?php echo htmlspecialchars($name); ?>"
                                type="text" class="form-control" placeholder="<?php echo htmlspecialchars($label); ?>">
                        <div class="input-group-append">
                            <button class="<?php echo htmlspecialchars($btn_class); ?>"><?php echo $btn_text; ?></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>