<?php

namespace Ling\Bat;


/**
 * The ArrayTool class.
 * LingTalfi 2015-12-20
 */
class ArrayTool
{


    public static function arrayKeyExistAll(array $keys, array $pool)
    {
        foreach ($keys as $key) {
            if (false === array_key_exists($key, $pool)) {
                return false;
            }
        }
        return true;
    }


    /**
     * Merge the given arrays and return a resulting array,
     * appending numeric keys, and replacing existing associative keys.
     *
     * This algorithm merges arrays together, and when a value already exists, one of the two cases occur:
     *
     * - either the replaced value is an array, in which case the new value gets appended to that array
     * - or the replaced value is a scalar value (i.e. not an array), in which case the new value completely replaces the old one
     *
     *
     *
     * Technically, the merging rules are basically the following:
     * - set the associative key only if it doesn't already exist
     * - if it's a numeric key, append it
     *
     *
     * Example:
     * -----------
     * Given array1:
     * array(1) {
     *      ["example"] => array(2) {
     *          ["fruits"] => array(2) {
     *              [0] => string(5) "apple"
     *              [1] => string(6) "banana"
     *          }
     *          ["numbers"] => array(2) {
     *              ["one"] => int(1)
     *              ["two"] => int(2)
     *          }
     *      }
     * }
     *
     *
     * and array2:
     * array(1) {
     *      ["example"] => array(3) {
     *          ["fruits"] => array(1) {
     *              [0] => string(6) "cherry"
     *          }
     *          ["sports"] => array(2) {
     *              [0] => string(4) "judo"
     *              [1] => string(6) "karate"
     *          }
     *          ["numbers"] => array(1) {
     *              ["two"] => int(222)
     *          }
     *      }
     * }
     *
     *
     * The result of Bat::arrayMergeReplaceRecursive([array1, array2]) gives:
     *
     * array(1) {
     *      ["example"] => array(3) {
     *          ["fruits"] => array(3) {
     *              [0] => string(5) "apple"
     *              [1] => string(6) "banana"
     *              [2] => string(6) "cherry"
     *          }
     *          ["numbers"] => array(2) {
     *              ["one"] => int(1)
     *              ["two"] => int(222)
     *          }
     *          ["sports"] => array(2) {
     *              [0] => string(4) "judo"
     *              [1] => string(6) "karate"
     *          }
     *      }
     * }
     *
     *
     *
     *
     *
     *
     *
     * @param array $arrays
     * @return array
     */
    public static function arrayMergeReplaceRecursive(array $arrays)
    {
        $arr = [];
        foreach ($arrays as $array) {
            foreach ($array as $k => $v) {
                if (is_numeric($k)) {
                    $arr[] = $v;
                } else {

                    if (!array_key_exists($k, $arr)) {
                        $arr[$k] = $v;
                    } else {
                        if (is_array($v) && !empty($v)) {
                            $arr[$k] = self::arrayMergeReplaceRecursive([$arr[$k], $v]);
                        } else {
                            $arr[$k] = $v;
                        }
                    }
                }
            }
        }
        return $arr;
    }


    public static function arrayUniqueRecursive(array $array)
    {
        $result = array_map("unserialize", array_unique(array_map("serialize", $array)));
        foreach ($result as $key => $value) {
            if (is_array($value)) {
                $result[$key] = self::arrayUniqueRecursive($value);
            }
        }
        return $result;
    }

    /**
     * Check that all given $keys exist (as keys) in the given $arr.
     * If not, returns the missing keys.
     *
     *
     * @param array $arr
     * @param array $keys
     * @return array|false
     *                  Returns false if there is no missing key.
     *
     */
    public static function getMissingKeys(array $arr, array $keys)
    {
        $missing = [];
        foreach ($keys as $key) {
            if (!array_key_exists($key, $arr)) {
                $missing[] = $key;
            }
        }
        if ($missing) {
            return $missing;
        }
        return false;
    }


    /**
     * Returns whether the given argument is an array which first key is numerical.
     *
     * Note: supposedly if the first key is numerical, chances are that the whole array is numerical,
     * depending on the array structure. This method was designed to give a quick guess, as opposed to
     * check all the keys of the array, which might take too long depending on the array size.
     *
     *
     *
     *
     * @param $array
     * @param bool $emptyIsValid
     * Whether an empty array is considered a valid numerically indexed array (default is true)
     *
     * @return bool
     */
    public static function isNumericalArray($array, $emptyIsValid = true): bool
    {
        if (is_array($array)) {
            if (empty($array)) {
                return $emptyIsValid;
            }
            return is_numeric(key($array));
        }
        return false;
    }


    /**
     * Return an array with keys equal to values.
     *
     * @param array $values
     * @return array
     */
    public static function keysSameAsValues(array $values): array
    {
        $ret = [];
        foreach ($values as $value) {
            $ret[$value] = $value;
        }
        return $ret;
    }

    /**
     * Like php range function, but the ranges applies on both the values and the keys
     * (i.e. not just the values like the php range function does)
     *
     * @param $start
     * @param $end
     * @param int $step
     * @return array
     */
    public static function mirrorRange($start, $end, $step = 1)
    {
        return array_combine(range($start, $end, $step), range($start, $end, $step));
    }


    /**
     * This method returns the array corresponding to an object, including non public members.
     *
     *
     * @param object $obj
     * @return array
     * @throws \Exception
     */
    public static function objectToArray(object $obj)
    {
        $reflectionClass = new \ReflectionClass(get_class($obj));
        $array = [];
        foreach ($reflectionClass->getProperties() as $property) {
            $property->setAccessible(true);
            $array[$property->getName()] = $property->getValue($obj);
            $property->setAccessible(false);
        }
        return $array;
    }


    public static function removeEntry($entry, array &$arr)
    {
        if (false !== ($index = array_search($entry, $arr))) {
            unset($arr[$index]);
        }
    }


    /**
     * Insert the given row into the rows;
     *
     *
     * @param $index
     * @param array $entry
     * @param array $rows , an array with numerical keys, each value being an array.
     */
    public static function insertRowAfter(int $index, array $row, array &$rows)
    {
        $zeIndex = $index + 1;
        $start = array_slice($rows, 0, $zeIndex);
        $end = array_slice($rows, $zeIndex);
        $entryWrapped = [$row];
        $rows = array_merge($start, $entryWrapped, $end);

    }

    /**
     * Return the <base> array, with values overridden by
     * the <layer> (only if the key match).
     *
     * @param array $layer
     * @param array $base
     *
     *
     * @return array
     */
    public static function superimpose(array $layer, array $base)
    {
        return array_merge($base, array_intersect_key($layer, $base));
    }


    /**
     * @param array $arr
     * @param callable $callback
     * @param array $options
     *
     *
     * Example:
     * (this will add the link property to every node in the array recursively)
     *
     *
     * $linkFmt = "/mylink/{type}/{slug}";
     * ArrayTool::updateNodeRecursive($ret, function (array &$row) use ($linkFmt) {
     *      $row['link'] = str_replace([
     *          "{type}",
     *          "{slug}",
     *      ], [
     *          $row['type'],
     *          $row['slug'],
     *          ], $linkFmt);
     * });
     *
     *
     *
     *
     */
    public static function updateNodeRecursive(array &$arr, callable $callback, array $options = [])
    {
        $childrenKey = $options['childrenKey'] ?? "children";
        foreach ($arr as $k => $v) {
            call_user_func_array($callback, [&$v]);

            if (array_key_exists($childrenKey, $v) && $v[$childrenKey]) {
                $children = $v[$childrenKey];
                self::updateNodeRecursive($children, $callback, $options);
                $v[$childrenKey] = $children;
            }
            $arr[$k] = $v;
        }
    }

}
