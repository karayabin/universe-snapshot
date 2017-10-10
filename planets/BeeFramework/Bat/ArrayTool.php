<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Bat;

use BeeFramework\Component\Arrays\ArrayExportUtil\ArrayExportUtil;
use BeeFramework\Component\Html\ArrayToUl\ArrayToUlAdaptor;
use BeeFramework\Bat\BdotTool;


/**
 * ArrayTool
 * @author Lingtalfi
 * 2014-08-21
 *
 */
class ArrayTool
{


    /**
     * Mode:
     * - 0: throw ex
     * - 1: return false
     */
    public static function checkKeys(array $keys, array $array, $mode = 0)
    {
        foreach ($keys as $k) {
            if (!array_key_exists($k, $array)) {
                if (0 === $mode) {
                    throw new \RuntimeException(sprintf("Key not found: %s", $k));
                }
                return false;
            }
        }
    }

    /**
     * Check keys and prepares an array that we can use in combination with the php list keyword.
     *
     * Mode:
     * - 0: throw ex (default)
     * - 1: return false
     * - 2: replace with null
     *
     *
     * @return array|false,
     *                  false can only be returned with mode=1
     */
    public static function checkKeysAndStack(array $keys, array $array, $mode = 0)
    {
        $ret = [];
        foreach ($keys as $k) {
            $v = null;
            if (!array_key_exists($k, $array)) {
                if (0 === $mode) {
                    throw new \RuntimeException(sprintf("Key not found: %s", $k));
                }
                elseif (1 === $mode) {
                    return false;
                }
            }
            else {
                $v = $array[$k];
            }
            $ret[] = $v;
        }
        return $ret;
    }

    /**
     * Check for the existence of properties with their types, and returns an array that we can use along
     * with the php list keyword.
     *
     *
     * Types are:
     *      - a: array
     *      - s: string
     *      - n: numeric
     *      - b: bool
     *      - c: callable
     *      - f: float
     *      - i: int
     *      - ?: null
     *
     * Types can be mixed.
     *
     * @param int $mode
     *                  0: throws an exception when something goes wrong
     *                  1: returns false when something goes wrong
     * @return false|array
     * @throws \Exception If mode=0, when a key does not exist, or when its type is incorrect
     *
     */
    public static function checkKeysAndTypes(array $keys2Types, array $array, $mode = 0)
    {
        $ret = [];
        foreach ($keys2Types as $k => $t) {
            if (array_key_exists($k, $array)) {
                $ret[] = $array[$k];
                $len = strlen($t);
                $val = $array[$k];
                for ($i = 0; $i < $len; $i++) {
                    $c = $t[$i];
                    switch ($c) {
                        case 'a':
                            if (is_array($val)) {
                                continue 3;
                            }
                            break;
                        case 's':
                            if (is_string($val)) {
                                continue 3;
                            }
                            break;
                        case 'n':
                            if (is_numeric($val)) {
                                continue 3;
                            }
                            break;
                        case 'b':
                            if (is_bool($val)) {
                                continue 3;
                            }
                            break;
                        case 'c':
                            if (is_callable($val)) {
                                continue 3;
                            }
                            break;
                        case 'f':
                            if (is_float($val)) {
                                continue 3;
                            }
                            break;
                        case 'i':
                            if (is_int($val)) {
                                continue 3;
                            }
                            break;
                        case '?':
                            if (null === $val) {
                                continue 3;
                            }
                            break;
                        default:
                            throw new \InvalidArgumentException(sprintf("Unknown type: %s", $c));
                            break;
                    }
                }


                if (0 === $mode) {
                    throw new \InvalidArgumentException(sprintf("Argument %s is of type %s, it does not match the definition %s", $k, gettype($val), $t));
                }
                else {
                    return false;
                }
            }
            else {
                if (0 === $mode) {
                    throw new \RuntimeException(sprintf("Key \"%s\" not found in the given array", $k));
                }
                return false;
            }
        }
        return $ret;
    }

    public static function diff(array $a, array $b, $mode = 'light')
    {
        $ret = [
            'add' => [],
            'delete' => [],
            'update' => [],
        ];
        self::doDiff($a, $b, $ret, '', $mode);
        self::doDiffB($b, $a, $ret, '', $mode);
        return $ret;
    }

    public static function export(array $array, $return = false, $style = 'php')
    {
        return ArrayExportUtil::create()->arrayExport($array, $return, $style);
    }

    public static function getMissingKeys(array $aArray, array $aKeys)
    {
        $missing = array();
        foreach ($aKeys as $name) {
            if (!array_key_exists($name, $aArray)) {
                $missing[] = $name;
            }
        }
        return $missing;
    }


    public static function getNextNumericIndex(array $items)
    {
        $items[] = true;
        end($items);
        $n = key($items);
        return $n;
    }


    /**
     * This method only works on numerical indexed arrays,
     * use getPrevNextAssociative for associative arrays.
     */
    public static function getPrevNext(array $nonAssociativeArray, $numericKey, $default = false)
    {
        $ret = [
            0 => $default, // prev
            1 => $default, // next
        ];
        if (array_key_exists($numericKey - 1, $nonAssociativeArray)) {
            $ret[0] = $nonAssociativeArray[$numericKey - 1];
        }
        if (array_key_exists($numericKey + 1, $nonAssociativeArray)) {
            $ret[1] = $nonAssociativeArray[$numericKey + 1];
        }
        return $ret;
    }

    public static function getPrevNextAssociative(array $a, $key, $default = false)
    {
        $ret = [
            0 => $default, // prev
            1 => $default, // next
        ];
        $keys = array_keys($a);
        if (false !== $index = array_search($key, $keys)) {
            if (isset($keys[$index - 1])) {
                $ret[0] = $a[$keys[$index - 1]];
            }
            if (isset($keys[$index + 1])) {
                $ret[1] = $a[$keys[$index + 1]];
            }
        }
        return $ret;
    }


    public static function hasKeys(array $array, array $keys)
    {
        foreach ($keys as $key) {
            if (!array_key_exists($key, $array)) {
                return false;
            }
        }
        return true;
    }


    public static function hasSameValuesAs(array $a, array $b)
    {
        $ret = false;
        $b2 = $b;
        if (count($a) === count($b2)) {
            $ret = true;
            foreach ($a as $v) {
                if (false !== $k = array_search($v, $b2, true)) {
                    unset($b2[$k]);
                }
                else {
                    $ret = false;
                }
            }
        }
        return $ret;
    }

    // use this to ease implementation of a next/prev article system
    public static function setPointerToKey(array &$array, $key)
    {
        if (array_key_exists($key, $array)) {
            while (key($array) !== $key) {
                next($array);
            }
        }
    }


    /**
     * @return array, containing nbSlices arrays, each representing a slice.
     *                  Elements distribution starts with the left slice
     *                  and ends with the right.
     */
    public static function slice($array, $nbSlices)
    {
        $ret = [];
        $n = count($array);
        $preserveKeys = null;
        if (is_integer($nbSlices)) {
            if ($nbSlices >= 1) {
                if (1 === $nbSlices) {
                    $ret[] = $array;
                }
                else {
                    $offset = 0;
                    $nSlices = $nbSlices;
                    for ($i = 1; $i <= $nbSlices; $i++) {
                        $nbEls = ceil($n / $nSlices);
                        $ret[] = array_slice($array, $offset, $nbEls, $preserveKeys);
                        $n = $n - $nbEls;
                        $offset += $nbEls;
                        $nSlices--;
                    }
                }
            }
            else {
                throw new \InvalidArgumentException("nbSlices must be a positive integer");
            }
        }
        else {
            throw new \InvalidArgumentException("nbSlices must be of type integer");
        }
        return $ret;
    }

//    public static function toString(array $array, array $options = [])
//    {
//        $options = array_replace([
//            'trailingComma' => false,
//            'style' => 'php',
//        ], $options);
//        return DebugTool::arrayExport($array, true, $options);
//    }


    public static function toUl(array $array)
    {
        $o = new ArrayToUlAdaptor();
        return $o->render($array);
    }

    /**
     * Like array_walk_recursive, but the callback has a third parameter which is the breadcrumb.
     *
     *          callback ( &v, k, array breadCrumb )
     *              or
     *          callback ( v, k, array breadCrumb )
     *
     *
     */
    public static function walkRecursive(array &$array, $callback)
    {
        if (is_callable($callback)) {
            self::doWalkRecursive($array, $callback);
        }
        else {
            throw new \InvalidArgumentException("Argument #2 must be a callback");
        }
    }

    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    private static function doWalkRecursive(array &$a, \Closure $callback, $breadCrumb = [])
    {
        array_walk($a, function (&$v, $k) use ($breadCrumb, $callback) {
            $breadCrumb[] = $k;
            if (is_array($v)) {
                self::doWalkRecursive($v, $callback, $breadCrumb);
            }
            else {
                call_user_func_array($callback, [&$v, $k, $breadCrumb]);
            }
        });
    }


    private static function doDiff(array $a, array $b, array &$ret, $curPath = '', $mode = 'light')
    {
        /**
         * Let's do update and delete first...
         */
        array_walk($a, function ($v, $k) use ($curPath, $b, $mode, &$ret) {
            if (!empty($curPath)) {
                $curPath .= '.';
            }
            $curPath .= str_replace('.', '\.', $k);

            if (BdotTool::hasDotValue($curPath, $b)) {

                $bVal = BdotTool::getDotValue($curPath, $b);
                if (is_array($v)) {
                    if (is_array($bVal)) {
                        self::doDiff($v, $b, $ret, $curPath, $mode);
                    }
                    else {
                        $ret['update'][] = $curPath;
                    }
                }
                else {
                    if ($bVal !== $v) {
                        $ret['update'][] = $curPath;
                    }
                }
            }
            else {
                // a value is missing in b, so we need to remove a key from a
                $ret['delete'][] = $curPath;
            }
        });
    }

    private static function doDiffB(array $b, array $a, array &$ret, $curPath = '', $mode = 'light')
    {
        /**
         * Now we need to check the other way around for any added entries...
         */
        array_walk($b, function ($v, $k) use ($curPath, $a, $mode, &$ret) {
            if (!empty($curPath)) {
                $curPath .= '.';
            }
            $curPath .= str_replace('.', '\.', $k);

            if (BdotTool::hasDotValue($curPath, $a)) {

                $bVal = BdotTool::getDotValue($curPath, $a);
                if (is_array($v)) {
                    if (is_array($bVal)) {
                        self::doDiffB($v, $a, $ret, $curPath, $mode);
                    }
                }
            }
            else {
                // a value is missing in a, so we need to add a key from a
                $ret['add'][] = $curPath;
            }
        });
    }
}
