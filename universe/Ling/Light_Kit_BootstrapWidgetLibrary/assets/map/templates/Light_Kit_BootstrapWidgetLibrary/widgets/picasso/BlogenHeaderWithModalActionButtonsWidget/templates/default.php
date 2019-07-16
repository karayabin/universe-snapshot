<?php


/**
 * @var $this PicassoWidget
 */


use Ling\Bat\CaseTool;
use Ling\Bat\StringTool;
use Ling\Kit_PicassoWidget\Widget\PicassoWidget;

$items = $z['items'] ?? [];
$cpt = 1;
$prefix = StringTool::getUniqueCssId("blogen_header_with_modal_action_buttons_id-")

?>

    <section
            class="kit-bwl-blogen_header_with_modal_action_buttons <?php echo htmlspecialchars($this->getCssClass()); ?>"
        <?php echo $this->getAttributesHtml(); ?>
    >
        <div class="container">
            <div class="row">
                <?php foreach ($items as $item):

                    $cssId = $prefix . '-' . $cpt++;


                    $button_column_class = $item['button_column_class'] ?? 'col-md-3';
                    $button_icon = $item['button_icon'] ?? '';
                    $button_class = $item['button_class'] ?? '';
                    $button_text = $item['button_text'] ?? '';


                    ?>
                    <div class="<?php echo htmlspecialchars($button_column_class); ?>">
                        <a href="#" class="<?php echo htmlspecialchars($button_class); ?>" data-toggle="modal"
                           data-target="#<?php echo $cssId; ?>">
                            <?php if ($button_icon): ?>
                                <i class="<?php echo htmlspecialchars($button_icon); ?>"></i>
                            <?php endif; ?>
                            <?php if ($button_text): ?>
                                <?php echo $button_text; ?>
                            <?php endif; ?>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>


<?php

$cpt = 1;
foreach ($items as $item):

    $cssId = $prefix . '-' . $cpt++;


    $modal_title_class = $item['modal_title_class'] ?? '';
    $modal_title = $item['modal_title'] ?? '';
    $modal_form_action = $item['modal_form_action'] ?? '';
    $modal_form_method = $item['modal_form_method'] ?? 'post';
    $modal_form_fields = $item['modal_form_fields'] ?? '';
    $modal_form_submit_btn_text = $item['modal_form_submit_btn_text'] ?? 'Submit';
    $modal_form_submit_btn_class = $item['modal_form_submit_btn_class'] ?? '';

    ?>
    <!-- MODAL -->
    <div class="modal fade" id="<?php echo $cssId; ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header <?php echo htmlspecialchars($modal_title_class); ?>">
                    <h5 class="modal-title"><?php echo $modal_title; ?></h5>
                    <button class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo htmlspecialchars($modal_form_action); ?>"
                          method="<?php echo htmlspecialchars($modal_form_method); ?>">
                        <?php foreach ($modal_form_fields as $field):
                            $type = $field['type'];
                            $name = $field['name'];
                            $label = $field['label'];
                            $value = $field['value'] ?? '';
                            $hint = $field['hint'] ?? '';

                            $id = $prefix . "-" . CaseTool::toDash($name);

                            ?>
                            <div class="form-group">
                                <?php switch ($type):
                                    case 'text':
                                    case 'password':
                                    case 'email':
                                        ?>
                                        <label for="<?php echo htmlspecialchars($id); ?>"><?php echo $label; ?></label>
                                        <input
                                                name="<?php echo htmlspecialchars($name); ?>"
                                                type="<?php echo htmlspecialchars($type); ?>"
                                                class="form-control"
                                                value="<?php echo htmlspecialchars($value); ?>"
                                                id="<?php echo htmlspecialchars($id); ?>"
                                        >
                                        <?php break; ?>
                                    <?php case 'list':
                                        $options = $field['options'] ?? [];
                                        ?>
                                        <label for="<?php echo htmlspecialchars($id); ?>"><?php echo $label; ?></label>
                                        <select class="form-control"
                                                name="<?php echo htmlspecialchars($name); ?>"
                                                id="<?php echo htmlspecialchars($id); ?>"
                                        >
                                            <?php foreach ($options as $val => $lab):
                                                $sSel = ((string)$value === (string)$val) ? 'selected="selected"' : '';
                                                ?>
                                                <option <?php echo $sSel; ?>
                                                        value="<?php echo htmlspecialchars($val); ?>"><?php echo $lab; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?php break; ?>
                                    <?php case 'file':
                                        $file_label = $field['file_label'] ?? '';
                                        ?>
                                        <label for="<?php echo htmlspecialchars($id); ?>"><?php echo $label; ?></label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input"
                                                   name="<?php echo htmlspecialchars($name); ?>"
                                                   id="<?php echo htmlspecialchars($id); ?>"
                                            >
                                            <label for="<?php echo htmlspecialchars($id); ?>"
                                                   class="custom-file-label"><?php echo $file_label; ?></label>
                                        </div>

                                        <?php break; ?>
                                    <?php case 'textarea': ?>
                                    <?php case 'textarea_ck':

                                        if ('textarea_ck' === $type) {

                                            $securedName = CaseTool::toSnake($name); // ensure no javascript injection...
                                            $jsCode = <<<EEE
CKEDITOR.replace('$securedName');
EEE;
                                            $this->copilot->addJsCodeBlock($jsCode);
                                        }

                                        ?>
                                        <label for="<?php echo htmlspecialchars($id); ?>"><?php echo $label; ?></label>
                                        <textarea
                                                class="form-control"
                                                name="<?php echo htmlspecialchars($name); ?>"
                                                id="<?php echo htmlspecialchars($id); ?>"
                                        ><?php echo htmlspecialchars($value); ?></textarea>
                                        <?php break; ?>
                                    <?php default: ?>
                                        <?php break; ?>
                                    <?php endswitch; ?>


                                <?php if ($hint): ?>
                                    <small class="form-text text-muted"><?php echo $hint; ?></small>
                                <?php endif; ?>

                            </div>
                        <?php endforeach; ?>
                    </form>
                </div>

                <div class="modal-footer">
                    <button class="<?php echo htmlspecialchars($modal_form_submit_btn_class); ?>"
                            data-dismiss="modal"><?php echo $modal_form_submit_btn_text; ?></button>
                </div>

            </div>
        </div>
    </div>
<?php endforeach; ?>