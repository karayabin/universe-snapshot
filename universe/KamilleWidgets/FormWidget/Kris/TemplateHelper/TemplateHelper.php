<?php


namespace KamilleWidgets\FormWidget\Kris\TemplateHelper;

class TemplateHelper implements TemplateHelperInterface
{

    protected $formErrorPosition;
    protected $displayFirstErrorOnly;



    public static function create()
    {
        return new static();
    }


    public function setFormErrorPosition($formErrorPosition)
    {
        $this->formErrorPosition = $formErrorPosition;
        return $this;
    }

    public function setDisplayFirstErrorOnly($displayFirstErrorOnly)
    {
        $this->displayFirstErrorOnly = $displayFirstErrorOnly;
        return $this;
    }


    //--------------------------------------------
    // 
    //--------------------------------------------
    public function wrapControl($s, array $control, $identifier)
    {


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
            $label = '<label>' . $label . '</label>';
        }

        $ret = '
<div class="type-' . $control['type'] . ' id-' . $identifier . '" data-id="' . $identifier . '">
' . $hint . '
' . $label . '
' . $s . '
' . $sError . '
</div>';
        return $ret;
    }

    public function wrapHint($hint)
    {
        return '<div class="hint">' . $hint . '</div>' . PHP_EOL;
    }

    public function wrapAllControlErrors(array $errors)
    {
        $s = '';
        $s .= '<ul class="errors">' . PHP_EOL;
        foreach ($errors as $error) {
            $s .= '<li class="error">' . $error . '</li>' . PHP_EOL;
        }
        $s .= '</ul>' . PHP_EOL;
        return $s;
    }

    public function wrapOneControlError($error)
    {
        return '<div class="error">' . $error . '</div>' . PHP_EOL;
    }

    public function wrapAllFormErrors(array $errors)
    {
        return $this->wrapAllControlErrors($errors);
    }

    public function wrapOneFormError($errorMsg)
    {
        return $this->wrapOneControlError($errorMsg);
    }


    public function onControlNotFound($identifier)
    {
        return "Control not found: $identifier";
    }

    public function wrapGroup($groupIdentifier, array $groupInfo, array $controls, array $groups, array &$allGroups)
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


    public function wrapFormMessages(array $formMessages)
    {
        $s = '';
        if (count($formMessages) > 0) {
            $s .= '<ul class="form-messages">' . PHP_EOL;
            foreach ($formMessages as $msgInfo) {
                list($msg, $type) = $msgInfo;
                $s .= '<li class="form-message form-message-' . $type . '">' . $msg . '</li>' . PHP_EOL;
            }
            $s .= '</ul>' . PHP_EOL;
        }
        return $s;
    }


    public function formatCentralizedError($identifier, $errorMsg, array $controls)
    {
        $name = $identifier;
        if (
            array_key_exists($identifier, $controls) &&
            array_key_exists("label", $controls[$identifier])
        ) {
            $name = $controls[$identifier]["label"];
        }
        return "$name: " . $errorMsg;
    }


}