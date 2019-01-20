<?php


namespace SokoForm\Renderer;

use Bat\CaseTool;
use Bat\StringTool;

/**
 * How to use:
 * - Wrap your html code with the table tag (otherwise it won't work)
 */
class SokoTableFormRenderer extends SokoFormRenderer
{

    //--------------------------------------------
    // PUBLIC METHOD
    //--------------------------------------------
    public function submitButton(array $preferences = [])
    {
        $label = $this->getPreference("label", $preferences, "Submit");
        $attributes = $this->getPreference("attributes", $preferences, []);
        $ninShadowId = $this->getPreference("ninShadowId", $preferences, false);
        $class = array_key_exists('class', $attributes) ? $attributes['class'] : "";
        unset($attributes['class']);
        ?>
        <table>
            <tr>
                <td colspan="2" class="tcenter">
                    <button type="submit" class="lee-red-button mauto <?php echo $class; ?>"
                            name="not_important_submit_button"
                        <?php echo StringTool::htmlAttributes($attributes); ?>
                    >
                        <?php echo $label; ?>
                    </button>
                    <?php if (false !== $ninShadowId): ?>
                        <div class="nin-shadow-loader bionic-target" data-id="<?php echo $ninShadowId; ?>"
                             style="margin-left:5px;"></div>
                    <?php endif; ?>
                </td>
            </tr>
        </table>
        <?php
    }


    public function renderControlError($controlName, array $preferences = [])
    {
        $model = $this->getControlModel($controlName);
        $this->doRenderError($model, $preferences);
    }

    //--------------------------------------------
    // MAIN METHODS
    //--------------------------------------------
    protected function renderInputText(array $model, array $preferences = [])
    {
        $this->doRenderInputControl($model, $preferences);
    }

    protected function renderInputHidden(array $model, array $preferences = [])
    {
        $this->doRenderInputControl($model, $preferences);
    }

    /**
     * With this method, a falsy value will be unchecked, and a non falsy value
     * will be checked.
     *
     * The checkbox value can only be 1 (with this approach),
     * and the checkbox is either posted or not.
     */
    protected function renderInputCheckbox(array $model, array $preferences = [])
    {
        $attr = $this->getHtmlAtributesAsString($preferences);
        $id = "id-cb-" . $model['name'];
        $value = $model['value'];
        $checked = (int)$value > 0;
        ?>
        <tr<?php echo $attr; ?>>
            <td>
                <input id="<?php echo $id; ?>" type="<?php echo $model['type']; ?>" name="<?php echo $model['name']; ?>"
                    <?php if (null !== $model['placeholder']): ?>
                        placeholder="<?php echo htmlspecialchars($model['placeholder']); ?>"
                    <?php endif; ?>
                    <?php if ($checked): ?>
                        checked="checked"
                    <?php endif; ?>
                       value="1">
            </td>
            <td>
                <?php if (null !== $model['label']): ?>
                    <label for="<?php echo $id; ?>">
                        <?php echo $model['label']; ?>
                    </label>
                <?php endif; ?>
            </td>
        </tr>
        <?php
        $this->doRenderError($model, $preferences);
    }

    protected function renderInputPassword(array $model, array $preferences = [])
    {
        $this->doRenderInputControl($model, $preferences);
    }

    protected function renderInputTextarea(array $model, array $preferences = [])
    {
        ?>
        <tr>
            <td><?php $this->doRenderLabel($model, $preferences); ?></td>
            <td>
                <?php $this->doRenderTextareaWidget($model, $preferences); ?>
            </td>
        </tr>
        <?php
        $this->doRenderError($model, $preferences);
    }


    protected function renderChoiceList(array $model, array $preferences = [])
    {
        $this->doRenderChoiceControl($model, $preferences);
    }

    protected function renderChoiceListGroup(array $model, array $preferences = [])
    {
        $this->doRenderChoiceControl($model, $preferences);
    }

    protected function renderChoiceListWithNames(array $model, array $preferences = [])
    {
        $this->doRenderChoiceControl($model, $preferences);
    }

    protected function renderFileStatic(array $model, array $preferences = [])
    {
        ?>
        <tr>
            <td><?php $this->doRenderLabel($model, $preferences); ?></td>
            <td>
                <input type="file" name="<?php echo $model['name']; ?>"
                    <?php if (null !== $model['accept']): ?>
                        placeholder="<?php echo $model['accept']; ?>"
                    <?php endif; ?>
                       value="<?php echo htmlspecialchars($model['value']); ?>">
            </td>
        </tr>
        <?php
        $this->doRenderError($model);
    }


    //--------------------------------------------
    // HELPERS
    //--------------------------------------------
    protected function doRenderInputControl(array $model, array $preferences = [])
    {
        $attr = $this->getHtmlAtributesAsString($preferences);
        ?>
        <tr<?php echo $attr; ?>>
            <td><?php $this->doRenderLabel($model, $preferences); ?></td>
            <td>
                <?php $this->doRenderInputWidget($model, $preferences); ?>
            </td>
        </tr>
        <?php
        $this->doRenderError($model, $preferences);
    }


    protected function doRenderChoiceControl(array $model, array $preferences = [])
    {
        $attr = $this->getHtmlAtributesAsString($preferences);
        ?>
        <tr<?php echo $attr; ?>>
            <td><?php $this->doRenderLabel($model, $preferences); ?></td>
            <td>
                <?php $this->doRenderChoiceWidget($model, $preferences); ?>
            </td>
        </tr>
        <?php
        $this->doRenderError($model);
    }

    protected function doRenderInputWidget(array $model, array $preferences = [])
    {
        ?>
        <input type="<?php echo $model['type']; ?>" name="<?php echo $model['name']; ?>"
            <?php if (null !== $model['placeholder']): ?>
                placeholder="<?php echo htmlspecialchars($model['placeholder']); ?>"
            <?php endif; ?>
               value="<?php echo htmlspecialchars($model['value']); ?>">
        <?php
    }


    protected function doRenderTextareaWidget(array $model, array $preferences = [])
    {
        ?>
        <textarea name="<?php echo $model['name']; ?>"
            <?php if (null !== $model['placeholder']): ?>
                placeholder="<?php echo htmlspecialchars($model['placeholder']); ?>"
            <?php endif; ?>
        ><?php echo htmlspecialchars($model['value']); ?></textarea>
        <?php
    }

    protected function doRenderChoiceWidget(array $model, array $preferences = [])
    {
        $type = $model['type'];
        if ("list" === $type) {
            $this->doRenderChoiceListWidget($model, $preferences);
        } elseif ("listGroup" === $type) {
            $this->doRenderChoiceListGroupWidget($model, $preferences);
        } elseif ("listWithNames" === $type) {
            $this->doRenderChoiceListWithNamesWidget($model, $preferences);
        } else {
            $this->error("SokoTableFormRenderer: Unknown choice type $type");
        }
    }

    protected function doRenderChoiceListWidget(array $model, array $preferences = [])
    {
        $style = $this->getPreference("style", $preferences, 'select'); // select (default)|radio
        if ("radio" === $style) {
            $this->doRenderChoiceListRadioWidget($model, $preferences);
        } elseif ("checkbox" === $style) {
            $this->doRenderChoiceListCheckboxWidget($model, $preferences);
        } else {
            $this->doRenderChoiceListSelectWidget($model, $preferences);
        }
    }

    protected function doRenderChoiceListSelectWidget(array $model, array $preferences = [])
    {
        $value = $model['value'];
        ?>
        <select name="<?php echo $model['name']; ?>">
            <?php foreach ($model['choices'] as $val => $label):
                $val = (string)$val; // if the model provides keys as int, we need to convert them so that the === works
                $sSel = ($value === $val) ? 'selected="selected"' : '';
                ?>
                <option <?php echo $sSel; ?>
                        value="<?php echo htmlspecialchars($val); ?>"><?php echo $label; ?></option>
            <?php endforeach; ?>
        </select>
        <?php
    }

    protected function doRenderChoiceListRadioWidget(array $model, array $preferences = [])
    {
        $value = $model['value'];
        foreach ($model['choices'] as $val => $label):

            $name = $model['name'];

            $val = (string)$val; // if the model provides keys as int, we need to convert them so that the === works
            $sSel = ($value === $val) ? 'checked="checked"' : '';
            $id = $this->formModel['form']['name'] . "-" . CaseTool::toDog($name) . "-" . CaseTool::toDog($val);
            ?>
            <input
                    id="<?php echo $id; ?>"
                    type="radio" name="<?php echo $name; ?>"
                <?php echo $sSel; ?>
                    value="<?php echo htmlspecialchars($val); ?>"
            >
            <label for="<?php echo $id; ?>"><?php echo $label; ?></label>
        <?php endforeach;
    }

    protected function doRenderChoiceListCheckboxWidget(array $model, array $preferences = [])
    {
        $value = $model['value'];
        foreach ($model['choices'] as $val => $label):

            $name = $model['name'];


            $val = (string)$val; // if the model provides keys as int, we need to convert them so that the === works
            $sSel = ($value === $val) ? 'checked="checked"' : '';
            $id = $this->formModel['form']['name'] . "-" . CaseTool::toDog($name) . "-" . CaseTool::toDog($val);
            ?>
            <input
                    id="<?php echo $id; ?>"
                    type="checkbox" name="<?php echo $name; ?>"
                <?php echo $sSel; ?>
                    value="<?php echo htmlspecialchars($val); ?>"
            >
            <label for="<?php echo $id; ?>"><?php echo $label; ?></label>
        <?php endforeach;
    }

    protected function doRenderChoiceListGroupWidget(array $model, array $preferences = [])
    {
        $value = $model['value'];
        ?>
        <select name="<?php echo $model['name']; ?>">
            <?php foreach ($model['choices'] as $groupLabel => $values): ?>
                <optgroup label="<?php echo htmlspecialchars($groupLabel); ?>">
                    <?php foreach ($values as $val => $label):
                        $val = (string)$val; // if the model provides keys as int, we need to convert them so that the === works
                        $sSel = ($value === $val) ? 'selected="selected"' : '';
                        ?>
                        <option <?php echo $sSel; ?>
                                value="<?php echo htmlspecialchars($val); ?>"><?php echo $label; ?></option>
                    <?php endforeach; ?>
                </optgroup>
            <?php endforeach; ?>
        </select>
        <?php
    }

    protected function doRenderChoiceListWithNamesWidget(array $model, array $preferences = [])
    {
        $inline = $this->getPreference('inline', $preferences, false);


        /**
         * This is an array or null if not posted at all
         */
        $values = $model['value'];
        if (null === $values) {
            $values = [];
        }
        ?>

        <?php foreach ($model['choices'] as $info): ?>
        <?php $this->doRenderChoiceListWithNamesItemWidget($info, $values, $preferences); ?>
        <?php if (false === $inline): ?><br><?php endif; ?>


    <?php endforeach; ?>
        <?php
    }

    protected function doRenderChoiceListWithNamesItemWidget(array $itemModel, array $values, array $preferences = [])
    {
        list($name, $val, $label, $controlName) = $itemModel;
        $id = $this->formModel['form']['name'] . "-" . CaseTool::toDog($name) . "-" . CaseTool::toDog($val);
        $val = (string)$val; // if the model provides keys as int, we need to convert them so that the === works
        $sSel = (array_key_exists($val, $values) && $values[$val]) ? 'checked="checked"' : '';
        ?>
        <input
                id="<?php echo $id; ?>"
            <?php echo $sSel; ?>
                type="checkbox" name="<?php echo htmlspecialchars($name); ?>"
                data-control-name="<?php echo $controlName; ?>"
                value="<?php echo htmlspecialchars($val); ?>">
        <label for="<?php echo $id; ?>"><?php echo $label; ?></label>
        <?php
    }

    protected function doRenderLabel(array $model, array $preferences = [])
    {
        if (null !== $model['label']) {
            echo $model['label'];
        }
    }

    protected function doRenderError(array $model, array $preferences = [])
    {
        ?>
        <tr class="soko-error-container
<?php if ($model['errors']): ?>
<?php echo " soko-active"; ?>
    <?php endif; ?>
">
            <td></td>
            <td>
                <?php foreach ($model['errors'] as $errorMsg): ?>
                    <div class="soko-error" data-name="<?php echo $model['name']; ?>"><?php echo $errorMsg; ?></div>
                <?php endforeach; ?>
            </td>
        </tr>
        <?php
    }


}