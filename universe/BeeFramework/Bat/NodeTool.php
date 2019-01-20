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


/**
 * NodeTool
 * @author Lingtalfi
 * 2015-03-10
 *
 */
class NodeTool
{

    /**
     * Ensure that every nodes has the given key.
     *      For nodes that don't have the key yet, the key is defined with the given value.
     */
    public static function completeKeys(array &$nodes, array $key2Value)
    {
        array_walk($nodes, function (&$v) use ($key2Value) {
            foreach ($key2Value as $key => $value) {
                if (!array_key_exists($key, $v)) {
                    $v[$key] = $value;
                }
            }
        });
    }


    public static function getItemsByProperty(array $nodes, $property, $keepIndex = true)
    {
        $ret = [];
        if (true === $keepIndex) {
            foreach ($nodes as $k => $v) {
                $ret[$k] = $v[$property];
            }
        }
        else {
            foreach ($nodes as $k => $v) {
                $ret[] = $v[$property];
            }
        }
        return $ret;
    }

    /**
     * Simple sort on one numerical key
     */
    public static function sortBy(array &$nodes, $key, $asc = true)
    {
        usort($nodes, function ($a, $b) use ($asc, $key) {
            if (true === $asc) {
                return $a[$key] > $b[$key];
            }
            return $a[$key] < $b[$key];
        });
    }
}
