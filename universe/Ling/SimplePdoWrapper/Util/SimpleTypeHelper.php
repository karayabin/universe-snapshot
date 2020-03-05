<?php


namespace Ling\SimplePdoWrapper\Util;


/**
 * The SimpleTypeHelper class.
 */
class SimpleTypeHelper
{


    /**
     * Returns an array of column name => simple type from the given sql types.
     * The simple types are either:
     *
     * - str: a string type, such as varchar, char, text, ...
     * - int: an int type, such as int, tinyint, float, decimal, but also bit, bool, ...
     * - date: a type containing a date, such as date, time, datetime...
     *
     *
     * The given types are sql types, which might be followed by the precision (inside parenthesis),
     * such as tinyint(4) for instance.
     *
     *
     * @param array $types
     * @return array
     */
    public static function getSimpleTypes(array $types): array
    {
        $ret = [];
        foreach ($types as $col => $type) {
            $p = explode('(', $type);
            $sqlType = array_shift($p);
            switch ($sqlType) {
                case "tinyint":
                case "smallint":
                case "mediumint":
                case "int":
                case "integer":
                case "bigint":
                case "decimal":
                case "float":
                case "double":
                case "bit":
                case "bool":
                case "boolean":
                    $simpleType = 'int';
                    break;
                case "date":
                case "datetime":
                case "timestamp":
                    $simpleType = 'date';
                    break;
                default:
                    $simpleType = 'str';
                    break;
            }
            $ret[$col] = $simpleType;
        }
        return $ret;
    }

}