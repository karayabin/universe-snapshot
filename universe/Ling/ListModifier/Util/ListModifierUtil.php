<?php


namespace Ling\ListModifier\Util;


use Ling\ListModifier\Circle\ListModifierCircle;

class ListModifierUtil
{


    /**
     * Get the formTrail, based on the key/values in the uri
     */
    public static function toFormFields(ListModifierCircle $circle, array $except = [])
    {
        $pool = $_GET;
        $s = '';
        $names = $circle->getListModifierNames();
        foreach ($names as $name) {

            if (in_array($name, $except, true)) {
                continue;
            }

            if (array_key_exists($name, $pool)) {
                $value = $pool[$name];
                if (is_array($value)) {
                    foreach ($value as $val) {
                        $s .= '<input type="hidden" name="' . $name . '[]" value="' . htmlspecialchars($val) . '">';
                    }
                } else {

                    $s .= '<input type="hidden" name="' . $name . '" value="' . htmlspecialchars($value) . '">';
                }
            }
        }
        return $s;
    }


    public static function getCircleValues(ListModifierCircle $circle, array $defaultValues = [])
    {
        $pool = $_GET;
        $ret = [];
        $names = $circle->getListModifierNames();
        foreach ($names as $name) {
            $value = "";
            if (array_key_exists($name, $pool)) {
                $value = $pool[$name];
            } elseif (array_key_exists($name, $defaultValues)) {
                $value = $defaultValues[$name];
            }
            $ret[$name] = $value;
        }
        return $ret;
    }
}