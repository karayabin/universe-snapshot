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
 * RowsTool
 * @author Lingtalfi
 * 2014-10-13
 *
 */
class RowsTool
{
    public static function addColumns(array &$rows, array $columns)
    {
        foreach ($rows as $k => $v) {
            foreach ($columns as $key => $val) {
                $rows[$k][$key] = $val;
            }
        }
    }


    /**
     * @return false|array(matchingRow)
     */
    public static function fetch(array $rows, $fnMatch = null)
    {
        $nodes = self::collectNodes($rows, $fnMatch);
        if (count($nodes) > 0) {
            return array_shift($nodes);
        }
        return false;
    }


    public static function fetchAll(array $rows, $fnMatch = null, array $options = [])
    {
        $options = array_replace([
            'fnSort' => null,
            'preserveIndexes' => false,
            'limit' => null, // 0:5
        ], $options);
        $nodes = self::collectNodes($rows, $fnMatch);
        if (null !== $options['fnSort']) {
            if (is_callable($options['fnSort'])) {
                usort($nodes, $options['fnSort']);
            }
            else {
                throw new \RuntimeException("Invalid fnSort argument type: a callable was expected");
            }
        }

        $reindex = !$options['preserveIndexes'];


        if (null !== $options['limit']) {
            if (is_string($options['limit'])) {
                $parts = explode(':', $options['limit'], 2);
                if (2 === count($parts)) {
                    $start = (int)$parts[0];
                    $numberOfItems = (int)$parts[1];
                    return array_slice($nodes, $start, $numberOfItems, !$reindex);
                }
                else {
                    throw new \RuntimeException("Invalid limit argument syntax: the colon separator char (:) was not found");
                }
            }
            else {
                throw new \RuntimeException("Invalid limit argument type: string was expected");
            }
        }
        if (true === $reindex) {
            $nodes = array_merge($nodes);
        }
        return $nodes;
    }

    /**
     * Use $properties.__operator to change the operator (default is ===)
     * @return false|array(matchingRow)
     */
    public static function fetchAllByProperties(array $rows, array $properties, array $options = [])
    {
        return self::fetchAll($rows, function ($row) use ($properties) {
            return self::fetchByPropsCallback($row, $properties);
        }, $options);
    }

    /**
     * Use $properties.__operator to change the operator (default is ===)
     * @return false|array(matchingRow)
     */
    public static function fetchByProperties(array $rows, array $properties)
    {
        return self::fetch($rows, function ($row) use ($properties) {
            return self::fetchByPropsCallback($row, $properties);
        });
    }


    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    private static function fetchByPropsCallback(array $row, array $properties)
    {
        $ret = true;
        $operator = '===';
        if (array_key_exists('__operator', $properties)) {
            $operator = $properties['__operator'];
            if (!in_array($operator, [
                '===',
                '==',
                '<',
                '<=',
                '>',
                '>=',
                'contains',
            ], true)
            ) {
                throw new \UnexpectedValueException(sprintf("Invalid operator: %s", $operator));
            }
            unset($properties['__operator']);
        }
        foreach ($properties as $k => $v) {
            if (array_key_exists($k, $row)) {

                if (
                    ('contains' !== $operator && true === eval('return ($v ' . $operator . ' $row[$k]);')) ||
                    ('contains' === $operator && true === eval('return (false !== strpos( $row[$k], $v ));'))
                ) {

                }
                else {
                    return false;
                }
            }
            else {
                $ret = false;
            }
        }
        return $ret;
    }

    private static function collectNodes(array $rows, $fnMatch = null)
    {
        $ret = [];
        if (null === $fnMatch) {
            $fnMatch = function () {
                return false;
            };
        }
        if (is_callable($fnMatch)) {
            foreach ($rows as $k => $v) {
                if (true === call_user_func($fnMatch, $v, $k)) {
                    $ret[$k] = $v;
                }
            }
            return $ret;
        }
        else {
            throw new \RuntimeException("Invalid fnMatch argument type: a callable was expected");
        }
    }

}
