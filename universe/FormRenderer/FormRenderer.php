<?php


namespace FormRenderer;

use Bat\StringTool;

/**
 * Implements this model: https://github.com/lingtalfi/form-modelization
 */
class FormRenderer implements FormRendererInterface
{

    private $displayFirstErrorOnly;
    private $formErrorPosition;
    //
    protected $formOpeningTag;
//    private $formMessages;
    protected $centralizedFormErrors;
    protected $controls;

    /**
     * Array of controls to turn down
     * controlId => int
     */
    protected $quietControls;
    /**
     * @var array of type => css class|factory|null
     *
     * A factory is either a string or a callback.
     * Look at the cssClasses in the constructor and in this class to see the parameters passed to the callables.
     *
     * Null means no class should be displayed
     *
     */
    protected $cssClasses;

    /**
     * The form model (array).
     *
     * Only available after the prepare method has been called.
     */
    protected $model;


    public function __construct()
    {
        $this->quietControls = [];
        $this->cssClasses = [
            "controlWrap" => function ($identifier, array $control) {
                return 'control type-' . $control['type'] . ' id-' . $identifier;
            },
            "control" => "",
        ];
        $this->controlsIdentifier2Html = [];
    }

    public static function create()
    {
        return new static();
    }


    public function render()
    {
        // call prepare first...
        ?>
        <div class="widget widget-form">
            <?php
            echo $this->formOpeningTag;
            //            echo $this->formMessages;
            echo $this->centralizedFormErrors;
            echo $this->controls;
            echo $this->renderSubmitButtonBar();
            echo '</form>';
            ?>
        </div>
        <?php
    }

    public function setCssClasses(array $classes)
    {
        $this->cssClasses = $classes;
        return $this;
    }

    public function setCssClass($type, $class)
    {
        $this->cssClasses[$type] = $class;
        return $this;
    }

    public function setQuietControls(array $controls)
    {
        $this->quietControls = array_flip($controls);
        return $this;
    }


    public function prepare(array $model)
    {
        $this->model = $model;


        //--------------------------------------------
        // GENERAL FORM VARIABLES
        //--------------------------------------------
        $formErrorPosition = "control";
        $displayFirstErrorOnly = false;
        if (array_key_exists('form', $model)) {
            if (array_key_exists('formErrorPosition', $model['form'])) {
                $formErrorPosition = $model['form']['formErrorPosition'];
            }
            if (array_key_exists('displayFirstErrorOnly', $model['form'])) {
                $displayFirstErrorOnly = $model['form']['displayFirstErrorOnly'];
            }
        }
        $this->displayFirstErrorOnly = $displayFirstErrorOnly;
        $this->formErrorPosition = $formErrorPosition;


        //--------------------------------------------
        // CONFIGURE FORM TOP
        //--------------------------------------------
        $formHtmlAttributes = [];
        if (array_key_exists('form', $model)) {
            $form = $model['form'];
            if (array_key_exists('htmlAttributes', $form)) {
                $formHtmlAttributes = $form['htmlAttributes'];
            }
        }
        $this->formOpeningTag = $this->getFormOpeningTag($formHtmlAttributes);


        //--------------------------------------------
        // COLLECTING ERRORS
        //--------------------------------------------
        $errors = [];
        foreach ($model['controls'] as $identifier => $control) {
            if (array_key_exists('errors', $control) && count($control['errors']) > 0) {
                $errors[$identifier] = $control['errors'];
            }
        }


        //--------------------------------------------
        // CAPTURING THE CONTROLS
        //--------------------------------------------
        $controls = [];
        foreach ($model['controls'] as $identifier => $control) {


            $htmlAttributes = (array_key_exists("htmlAttributes", $control)) ? $control['htmlAttributes'] : [];


            $classFactory = $this->cssClasses['control'];
            $cssClass = null;
            if (is_string($classFactory)) {
                $cssClass = $classFactory;
            } elseif (is_callable($classFactory)) {
                $cssClass = call_user_func($classFactory, $identifier, $control, $errors);
            }
            if (null !== $cssClass) {
                if (!array_key_exists('class', $htmlAttributes)) {
                    $htmlAttributes['class'] = $cssClass;
                } else {
                    $htmlAttributes['class'] .= " $cssClass";
                }
            }


            $sControl = $this->getControlHtml($control, $htmlAttributes, $identifier);
            $controls[$identifier] = $this->wrapControl($sControl, $control, $identifier);
        }
        $this->onControlsReady($controls);


        //--------------------------------------------
        // CAPTURING THE GROUPS
        //--------------------------------------------
        $allGroups = [];
        $groups = [];
        if (array_key_exists('groups', $model) && is_array($model['groups'])) {
            $groups = $model['groups'];
        }
        foreach ($groups as $groupIdentifier => $groupInfo) {
            $allGroups[$groupIdentifier] = $this->wrapGroup($groupIdentifier, $groupInfo, $controls, $groups, $allGroups);
        }


        //--------------------------------------------
        // CREATING THE ERRORS AT A CENTRALIZED PLACE
        //--------------------------------------------
        $sFormErrors = "";
        if ('central' === $formErrorPosition && count($errors) > 0) {
            if (true === $displayFirstErrorOnly) {
                reset($errors);
                $identifier = key($errors);
                $errorMsg = current(current($errors));
                $error = $this->formatCentralizedError($identifier, $errorMsg, $model['controls']);
                $sFormErrors = $this->wrapOneFormError($error);
            } else {
                $tmpErrors = [];
                foreach ($errors as $identifier => $error) {
                    foreach ($error as $err) {
                        $tmpErrors[] = $this->formatCentralizedError($identifier, $err, $model['controls']);
                    }
                }
                $sFormErrors = $this->wrapAllFormErrors($tmpErrors);
            }
        }
        $this->centralizedFormErrors = $sFormErrors;


        //--------------------------------------------
        // COLLECTING ALL CONTROLS IN ORDER
        //--------------------------------------------
        $allControls = [];
        $sAllControls = "";
        if (array_key_exists('order', $model) && is_array($model['order'])) {
            $allControls = $model['order'];
        } else {
            $allControls = array_keys($controls);
        }
        foreach ($allControls as $identifier) {

            if (array_key_exists($identifier, $this->quietControls)) {
                continue;
            }

            if (array_key_exists($identifier, $allGroups)) {
                $sAllControls .= $allGroups[$identifier];
            } elseif (array_key_exists($identifier, $controls)) {
                $sAllControls .= $controls[$identifier];
            } else {
                $sAllControls .= $this->onControlNotFound($identifier);
            }
        }
        $this->controls = $sAllControls;


        //--------------------------------------------
        // COLLECTING FORM MESSAGES
        //--------------------------------------------
//        $sFormMessages = '';
//        if (array_key_exists('form', $model) && array_key_exists('messages', $model['form'])) {
//            $sFormMessages = $this->wrapFormMessages($model['form']['messages']);
//        }
//        $this->formMessages = $sFormMessages;
        return $this;
    }

    protected function onControlsReady(array $controls)
    {

    }


    protected function getFormOpeningTag(array $formHtmlAttributes)
    {
        return '<form' . StringTool::htmlAttributes($formHtmlAttributes) . '>' . PHP_EOL;
    }

    protected function renderSubmitButtonBar()
    {
        $m = $this->model;
        $s = '';
        if (array_key_exists('submitButtonBar', $m['form'])) {
            $s .= $this->doRenderSubmitButtonBar($m['form']['submitButtonBar']);
        }
        return $s;
    }

    protected function doRenderSubmitButtonBar(array $submitButtonBar)
    {
        $s = '';
        if (true === $submitButtonBar['enable']) {

            $s .= '<hr>';
            if (true === $submitButtonBar['showResetButton']) {
                $s .= '<button type="reset">' . $submitButtonBar['textResetButton'] . '</button>';
            }
            $s .= '<button type="submit">' . $submitButtonBar['textSubmitButton'] . '</button>';
        }
        return $s;
    }


    /**
     * control: the control array as defined in the form modelization document.
     */
    protected function getControlHtml(array $control, array $htmlAttributes, $identifier)
    {
        $sControl = "";


        switch ($control['type']) {
            case 'input':
                $htmlType = "text";
                if (array_key_exists("type", $htmlAttributes)) {
                    $htmlType = $htmlAttributes["type"];
                }
                if ('text' === $htmlType || 'hidden' === $htmlType || 'password' === $htmlType || "submit" === $htmlType || 'file' === $htmlType) {
                    $sControl = '<input' . StringTool::htmlAttributes($htmlAttributes) . '>' . PHP_EOL;
                } elseif (
                    'checkbox' === $htmlType ||
                    'radio' === $htmlType
                ) {

                    $isRadio = ('radio' === $htmlType);

                    $keyWord = "";
                    $values = null;
                    if (false === $isRadio) {
                        $keyWord = "checked";
                        $values = (array_key_exists("value", $control)) ? $control['value'] : [];
                    } elseif (true === $isRadio) {
                        $keyWord = "checked";
                        $values = (array_key_exists("value", $control)) ? $control['value'] : null;
                    }


                    $cpt = 0;
                    $items = (array_key_exists("items", $control)) ? $control['items'] : [];
                    $labelLeftSide = (array_key_exists("labelLeftSide", $control)) ? $control['labelLeftSide'] : true;
                    foreach ($items as $value => $label) {

                        $itemHtmlAttributes = $htmlAttributes;

                        $id = $value . "-" . $cpt++;
                        $itemHtmlAttributes["value"] = htmlspecialchars($value);
                        $itemHtmlAttributes["id"] = $id;


                        if (
                            (false === $isRadio && in_array($value, $values, true)) ||
                            (true === $isRadio && $value === $values)
                        ) {
                            $itemHtmlAttributes[$keyWord] = $keyWord;
                        }


                        $sControl .= $this->getTickableControlItemHtml($htmlType, $id, $label, $labelLeftSide, $itemHtmlAttributes, $control, $identifier);
                    }

                } else {
                    $sControl = "Unknown control type: " . $control['type'] . '(' . $htmlType . ')';
                }
                break;
            case 'select':
                $sControl = '<select' . StringTool::htmlAttributes($htmlAttributes) . '>' . PHP_EOL;
                $items = (array_key_exists("items", $control)) ? $control['items'] : [];


                $isMultiple = (in_array("multiple", $htmlAttributes, true));

                if (false === $isMultiple) {
                    $val = (array_key_exists("value", $control)) ? $control['value'] : "";
                    foreach ($items as $value => $label) {
                        $s = ((string)$val === (string)$value) ? ' selected="selected"' : "";
                        $sControl .= '<option' . $s . ' value="' . htmlspecialchars($value) . '">' . $label . '</option>' . PHP_EOL;
                    }
                } else {
                    $values = (array_key_exists("value", $control)) ? $control['value'] : [];
                    if (null === $values) {
                        $values = [];
                    }
                    foreach ($items as $value => $label) {
                        $s = (in_array($value, $values, true)) ? ' selected="selected"' : "";
                        $sControl .= '<option' . $s . ' value="' . htmlspecialchars($value) . '">' . $label . '</option>' . PHP_EOL;
                    }
                }

                $sControl .= '</select>' . PHP_EOL;
                break;
            case 'textarea':
                $sControl = '<textarea' . StringTool::htmlAttributes($htmlAttributes) . '>';
                $val = (array_key_exists("value", $control)) ? $control['value'] : "";
                $sControl .= $val;
                $sControl .= '</textarea>' . PHP_EOL;
                break;
            default:
                $sControl = "Unknown control type: " . $control['type'];
                break;
        }
        return $sControl;
    }

    protected function getTickableControlItemHtml($type, $id, $label, $labelLeftSide, $itemHtmlAttributes, $control, $identifier)
    {
        $s = '';
        $sInput = '<input ' . StringTool::htmlAttributes($itemHtmlAttributes) . '>' . PHP_EOL;
        $sLabel = '<label for="' . $id . '">' . $label . '</label>' . PHP_EOL;
        if (true === $labelLeftSide) {
            $s .= $sLabel . $sInput;
        } else {
            $s .= $sInput . $sLabel;
        }
        return $s;
    }

    protected function wrapControl($s, array $control, $identifier)
    {
        if (
            array_key_exists('type', $control) && 'input' === $control['type'] &&
            array_key_exists('htmlAttributes', $control) && array_key_exists('type', $control['htmlAttributes'])
            && 'hidden' === $control['htmlAttributes']['type']
        ) {
            return $s;
        }

        $hint = array_key_exists('hint', $control) ? $control['hint'] : null;
        $label = array_key_exists('label', $control) ? $control['label'] : null;
        $errors = array_key_exists('errors', $control) ? $control['errors'] : [];


        $sError = "";

        if (null !== $hint) {
            $hint = $this->wrapHint($hint);
        }

        if ('control' === $this->formErrorPosition && count($errors) > 0) {
            if (false === $this->displayFirstErrorOnly) {
                $sError = $this->wrapAllControlErrors($errors);
            } else {
                $error = array_shift($errors);
                $sError = $this->wrapOneControlError($error);
            }
        }


        if (null !== $label) {
            $label = $this->getLabel($label, $identifier, $control);
        }

        $classFactory = $this->cssClasses['controlWrap'];
        $cssClass = null;
        if (is_string($classFactory)) {
            $cssClass = $classFactory;
        } elseif (is_callable($classFactory)) {
            $cssClass = call_user_func($classFactory, $identifier, $control);
        }

        $sClass = (null !== $cssClass) ? ' class="' . $cssClass . '"' : '';
        $ret = $this->doWrapControl($sClass, $identifier, $s, $hint, $label, $sError);
        return $ret;
    }

    protected function doWrapControl($sClass, $identifier, $controlHtml, $hint, $label, $error)
    {
        return '
<div' . $sClass . ' data-id="' . $identifier . '">
' . $hint . '
' . $label . '
' . $controlHtml . '
' . $error . '
</div>';
    }

    protected function getLabel($label, $identifier, array $control)
    {
        return '<label>' . $label . '</label>';
    }

    protected function wrapHint($hint)
    {
        return '<div class="hint">' . $hint . '</div>' . PHP_EOL;
    }

    protected function wrapAllControlErrors(array $errors)
    {
        $s = '';
        $s .= '<ul class="errors">' . PHP_EOL;
        foreach ($errors as $error) {
            $s .= '<li class="error">' . $error . '</li>' . PHP_EOL;
        }
        $s .= '</ul>' . PHP_EOL;
        return $s;
    }

    protected function wrapOneControlError($error)
    {
        return '<div class="error">' . $error . '</div>' . PHP_EOL;
    }


    /**
     * Displays ALL errors in a centralized panel
     */
    protected function wrapAllFormErrors(array $errors)
    {
        $s = '';
        $s .= '<div class="central-panel">' . PHP_EOL;
        $s .= '<ul class="errors">' . PHP_EOL;
        foreach ($errors as $error) {
            $s .= '<li class="error">' . $error . '</li>' . PHP_EOL;
        }
        $s .= '</ul>' . PHP_EOL;
        $s .= '</div>' . PHP_EOL;
        return $s;
    }


    /**
     * Displays THE FIRST error in a centralized panel
     */
    protected function wrapOneFormError($errorMsg)
    {
        return '<div class="central-panel"><div class="error">' . $errorMsg . '</div></div>' . PHP_EOL;
    }


    protected function onControlNotFound($identifier)
    {
        return "Control not found: $identifier";
    }

    protected function wrapGroup($groupIdentifier, array $groupInfo, array $controls, array $groups, array &$allGroups)
    {

        $children = [];
        if (array_key_exists("children", $groupInfo) && null !== $groupInfo['children']) {
            $children = $groupInfo['children'];
        }
        $sLegend = "";
        if (array_key_exists("label", $groupInfo) && null !== $groupInfo['label']) {
            $sLegend = '<legend>' . htmlspecialchars($groupInfo['label']) . '</legend>' . PHP_EOL;
        }

        $s = '<fieldset>' . PHP_EOL;
        $s .= $sLegend;
        foreach ($children as $childIdentifier) {
            if (array_key_exists($childIdentifier, $controls)) {
                $s .= $controls[$childIdentifier];
            } elseif (array_key_exists($childIdentifier, $allGroups)) {
                $s .= $allGroups[$childIdentifier];
            } elseif (array_key_exists($childIdentifier, $groups)) {
                $s .= $this->wrapGroup($childIdentifier, $groups[$childIdentifier], $controls, $groups, $allGroups);
            } else {
                $s .= $this->onControlNotFound($groupIdentifier);
            }
        }
        $s .= '</fieldset>' . PHP_EOL;
        return $s;
    }


//    protected function wrapFormMessages(array $formMessages)
//    {
//        $s = '';
//        if (count($formMessages) > 0) {
//            $s .= '<ul class="form-messages">' . PHP_EOL;
//            foreach ($formMessages as $msgInfo) {
//                list($msg, $type) = $msgInfo;
//                $s .= '<li class="form-message form-message-' . $type . '">' . $msg . '</li>' . PHP_EOL;
//            }
//            $s .= '</ul>' . PHP_EOL;
//        }
//        return $s;
//    }


    protected function formatCentralizedError($identifier, $errorMsg, array $controls)
    {
        return $errorMsg;
    }


}
