<?php


namespace Ling\Chloroform\Helper;


use Ling\Bat\BDotTool;
use Ling\Bat\CaseTool;

/**
 * The FieldHelper class.
 */
class FieldHelper
{


    /**
     * Returns the default @concept(field id) from the given label.
     *
     * @param string $label
     * @return string
     */
    public static function getDefaultIdByLabel(string $label)
    {
        return CaseTool::toSnake($label);
    }


    /**
     * Returns the default error name (the name of the field when
     * used in an error message) from the given label and id.
     *
     * At least one of the label or id should be not null in order for this method to work properly.
     *
     * @param string|null $label
     * @param string|null $id
     * @return string
     */
    public static function getDefaultErrorNameByLabelOrId(string $label = null, string $id = null)
    {
        if (null !== $label) {
            return strtolower($label);
        }
        return strtolower(preg_replace('!\s+!', ' ', str_replace('_', ' ', $id)));
    }


    /**
     * Returns the value of the field in the given values array,
     * or null if it doesn't exist.
     *
     * Note: the null state for non-existent fields might actually be used by
     * checkbox validators.
     *
     *
     *
     * @param string $fieldId
     * @param array $values
     * @return mixed|null
     */
    public static function getFieldValue(string $fieldId, array $values)
    {
        return BDotTool::getDotValue($fieldId, $values, null);
    }


    /**
     * Returns the html name from a field id.
     *
     * So for instance, first_name becomes first_name,
     * and colors.red becomes colors[red].
     *
     *
     * @param string $fieldId
     * @param bool $isScalar = true
     * @return string
     */
    public static function getHtmlNameById(string $fieldId, bool $isScalar = true): string
    {
        $p = explode(".", $fieldId);
        $s = array_shift($p);
        if ($p) {
            $s .= '[' . implode('][', $p) . ']';
        }
        if (false === $isScalar) {
            $s .= '[]';
        }
        return $s;
    }


}