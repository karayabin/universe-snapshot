<?php


namespace Ling\Light_Kit_BootstrapWidgetLibrary\Widget\Picasso\Util;


use Ling\Bat\CaseTool;
use Ling\HtmlPageTools\Copilot\HtmlPageCopilot;

/**
 * The BlogenFormWidgetUtil class.
 */
class BlogenFormWidgetUtil
{


    /**
     * Prints the fields of a form, as described in the BlogenFormWidget documentation.
     *
     *
     * @param HtmlPageCopilot $copilot
     * @param array $fields
     * @param string $prefix
     */
    public static function printFields(HtmlPageCopilot $copilot, array $fields, string $prefix)
    {


        foreach ($fields as $field):
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
                            $copilot->addJsCodeBlock($jsCode);
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
        <?php
        endforeach;
    }


    /**
     * Prints the fields of a form, as described in the BlogenFormWidget documentation, using a fieldset based markup.
     *
     *
     * @param HtmlPageCopilot $copilot
     * @param array $fields
     * @param string $prefix
     */
    public static function printFieldsAsFieldsets(HtmlPageCopilot $copilot, array $fields, string $prefix)
    {
        foreach ($fields as $field):
            $type = $field['type'];
            $name = $field['name'];
            $label = $field['label'];
            $value = $field['value'] ?? '';
            $hint = $field['hint'] ?? '';

            $id = $prefix . "-" . CaseTool::toDash($name);

            ?>
            <fieldset class="form-group">
                <legend><?php echo $label; ?></legend>
                <?php switch ($type):
                    case 'text':
                    case 'password':
                    case 'email':
                        ?>
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
                            $copilot->addJsCodeBlock($jsCode);
                        }

                        ?>
                        <textarea
                                class="form-control"
                                name="<?php echo htmlspecialchars($name); ?>"
                                id="<?php echo htmlspecialchars($id); ?>"
                        ><?php echo htmlspecialchars($value); ?></textarea>
                        <?php break; ?>
                    <?php case 'radio':
                        $choices = $field['choices'] ?? [];
                        ?>
                        <?php foreach ($choices as $val => $label):
                        $sChecked = ((string)$value === (string)$val) ? 'checked="checked"' : '';
                        ?>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input
                                        name="<?php echo htmlspecialchars($name); ?>"
                                        type="radio" class="form-check-input"
                                        value="<?php echo htmlspecialchars($val); ?>" <?php echo $sChecked; ?>>
                                <?php echo $label; ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                        <?php break; ?>
                    <?php default: ?>
                        <?php break; ?>
                    <?php endswitch; ?>


                <?php if ($hint): ?>
                    <small class="form-text text-muted"><?php echo $hint; ?></small>
                <?php endif; ?>

            </fieldset>
        <?php endforeach;

    }
}