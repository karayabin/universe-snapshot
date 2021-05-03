<?php


/**
 * @var $this PicassoWidget
 */


use Ling\Bat\StringTool;
use Ling\Kit_PicassoWidget\Widget\PicassoWidget;
use Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\Util\BlogenFormWidgetUtil;

$title = $z['title'] ?? "";
$title_class = $z['title_class'] ?? "";
$form_column_class = $z['form_column_class'] ?? "col";
$form_action = $z['form_action'] ?? "";
$form_method = $z['form_method'] ?? "";
$form_fields = $z['form_fields'] ?? [];
$show_submit_button = $z['show_submit_button'] ?? true;
$submit_button_wrapper_class = $z['submit_button_wrapper_class'] ?? '';
$submit_btn_text = $z['submit_btn_text'] ?? '';
$submit_btn_class = $z['submit_btn_class'] ?? '';


$prefix = StringTool::getUniqueCssId("blogen_form_id-")

?>

<section class="kit-bwl-blogen_form <?php echo htmlspecialchars($this->getCssClass()); ?>"
    <?php echo $this->getAttributesHtml(); ?>
>
    <div class="container">
        <div class="row">
            <div class="<?php echo htmlspecialchars($form_column_class); ?>">
                <div class="card">
                    <?php if ($title): ?>
                        <div class="card-header">
                            <h4><?php echo $title; ?></h4>
                        </div>
                    <?php endif; ?>
                    <div class="card-body">
                        <form action="<?php echo htmlspecialchars($form_action); ?>"
                              method="<?php echo htmlspecialchars($form_method); ?>">
                            <?php BlogenFormWidgetUtil::printFields($this->copilot, $form_fields, $prefix); ?>
                        </form>
                    </div>
                    <?php if (true === $show_submit_button): ?>
                        <div class="card-footer <?php echo htmlspecialchars($submit_button_wrapper_class); ?>">
                            <?php if ($submit_btn_text): ?>
                                <input type="submit" class="<?php echo htmlspecialchars($submit_btn_class); ?>"
                                       data-dismiss="modal"
                                       value="<?php echo htmlspecialchars($submit_btn_text); ?>"
                                >
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

