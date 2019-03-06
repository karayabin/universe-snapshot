<?php


namespace Ling\OnTheFlyForm\Helper;


use Ling\Bat\CaseTool;

class OnTheFlyFormHelper
{
    public static function idToSuffix($id)
    {
        return CaseTool::snakeToFlexiblePascal($id);
    }

    public static function getLabel($id, array $model)
    {
        $labelKey = "label" . self::idToSuffix($id);
        if (array_key_exists($labelKey, $model)) {
            return $model[$labelKey];
        }
        return $id;
    }


    public static function selectOptions(array $options, $value)
    {
        foreach ($options as $k => $v) {
            $sSel = ($k == $value) ? 'selected="selected"' : '';
            echo '<option ' . $sSel . ' value="' . $k . '">' . $v . '</option>';
        }
    }

    public static function generateKey(array $model)
    {
        echo '<input type="hidden" name="' . $model['nameKey'] . '" value="' . $model['valueKey'] . '" />';
    }

    public static function checked($v1, $v2)
    {
        if ($v1 === $v2) {
            echo "checked";
        }
    }
}