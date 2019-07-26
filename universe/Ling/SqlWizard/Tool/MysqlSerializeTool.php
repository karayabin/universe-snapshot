<?php


namespace Ling\SqlWizard\Tool;

/**
 * The MysqlSerializeTool class.
 *
 * Sometimes, we need to store arrays, or even objects in the database.
 * This tool uses a serialization technique in order to convert those arrays/objects into a string which
 * fits the database, and back from the database to their original form.
 *
 *
 */
class MysqlSerializeTool
{


    /**
     * Serializes the $keys found in the given array in place.
     *
     *
     * @param array $arr
     * @param array $keys
     */
    public static function serialize(array &$arr, array $keys)
    {
        foreach ($arr as $k => $v) {
            if (in_array($k, $keys, true)) {
                $arr[$k] = serialize($v);
            }
        }
    }

    /**
     * Un-serializes the $keys found in the given array in place.
     *
     *
     * @param array $arr
     * @param array $keys
     */
    public static function unserialize(array &$arr, array $keys)
    {
        foreach ($arr as $k => $v) {
            if (in_array($k, $keys, true)) {
                $arr[$k] = unserialize($v);
            }
        }
    }
}