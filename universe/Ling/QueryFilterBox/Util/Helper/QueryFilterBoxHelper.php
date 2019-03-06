<?php


namespace Ling\QueryFilterBox\Util\Helper;


class QueryFilterBoxHelper
{

    /**
     * Get the formTrail, based on the key/values in the uri
     */
    public static function toFormFields(array $keys, array $except = [])
    {
        $pool = $_GET;
        $s = '';
        foreach ($keys as $name) {

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

}