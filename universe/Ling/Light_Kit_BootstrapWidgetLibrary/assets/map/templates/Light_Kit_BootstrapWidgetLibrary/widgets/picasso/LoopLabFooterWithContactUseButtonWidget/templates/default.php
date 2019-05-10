<?php


/**
 * @var $this PicassoWidget
 */

use Ling\Bat\CaseTool;
use Ling\Bat\StringTool;
use Ling\Kit_PicassoWidget\Widget\PicassoWidget;


$title = $z['footer_title'] ?? "No title";
$text = $z['footer_text'] ?? "";
$text = str_replace('$year', date("Y"), $text);

$btnClass = $z['footer_button_class'] ?? "btn btn-primary";
$btnText = $z['footer_button_text'] ?? "Contact Us";


$modalTitle = $z['modal_title'] ?? "Contact Us";
$modalFormAction = $z['modal_form_action'] ?? "";
$modalFormMethod = $z['modal_form_method'] ?? "post";
$modalFields = $z['modal_fields'] ?? [];
$modalBtnText = $z['modal_btn_text'] ?? "Submit";
$modalBtnClass = $z['modal_btn_class'] ?? "btn btn-primary btn-block";


$modalId = StringTool::getUniqueCssId("contact-modal-");

?>

<footer id="main-footer" class="kit-bwl-looplab_footer <?php echo htmlspecialchars($this->getCssClass()); ?>"
    <?php echo $this->getAttributesHtml(); ?>>
    <div class="container">
        <div class="row">
            <div class="col text-center py-4">
                <h3><?php echo $title; ?></h3>
                <p><?php echo $text; ?></p>
                <button class="<?php echo htmlspecialchars($btnClass); ?>" data-toggle="modal"
                        data-target="#<?php echo $modalId; ?>"><?php echo $btnText; ?></button>
            </div>
        </div>
    </div>
</footer>


<!-- Modal form for LoopLabFooterWithContactUseButtonWidget -->
<div class="modal fade text-dark" id="<?php echo $modalId; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo $modalTitle; ?></h5>
                <button class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo htmlspecialchars($modalFormAction); ?>"
                      method="<?php echo htmlspecialchars($modalFormMethod); ?>">

                    <?php foreach ($modalFields as $item):
                        $id = CaseTool::toDash($item['name']) . "-$modalId";
                        ?>
                        <div class="form-group">
                            <label for="<?php echo $id; ?>"><?php echo $item['label']; ?></label>
                            <?php if ("text" === $item['type']): ?>
                                <input name="<?php echo htmlspecialchars($item['name']); ?>" type="text"
                                       class="form-control" id="<?php echo $id; ?>">
                            <?php elseif ("email" === $item['type']): ?>
                                <input name="<?php echo htmlspecialchars($item['name']); ?>" type="email"
                                       class="form-control" id="<?php echo $id; ?>">
                            <?php else: ?>
                                <textarea name="<?php echo htmlspecialchars($item['name']); ?>"
                                          class="form-control" id="<?php echo $id; ?>"></textarea>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </form>
            </div>
            <div class="modal-footer">
                <button class="<?php echo htmlspecialchars($modalBtnClass); ?>"><?php echo $modalBtnText; ?></button>
            </div>
        </div>
    </div>
</div>