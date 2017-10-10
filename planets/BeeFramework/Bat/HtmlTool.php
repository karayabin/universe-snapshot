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
 * HtmlTool
 * @author Lingtalfi
 * 2014-08-13
 *
 */
class HtmlTool
{

    public static function quickTable(array $rows, array $options = [])
    {
        $options = array_replace([
            'htmlAttributes' => [],
            'headers' => [],
            'caption' => null,
            'return' => false,
            /**
             * callback which returns an array of attributes:    array callback (row)
             */
            'trAttributesFromRow' => null,
            /**
             * callback which returns the new row:     array callback (row)
             */
            'alterRow' => null,
        ], $options);


        if (null !== ($options['trAttributesFromRow'])) {
            if (is_callable($options['trAttributesFromRow'])) {
                $trAttributesFromRow = $options['trAttributesFromRow'];
            }
            else {
                throw new \InvalidArgumentException("trAttributesFromRow must be a valid callback");
            }
        }
        else {
            $trAttributesFromRow = function ($row) {
                return [];
            };
        }


        if (null !== ($options['alterRow'])) {
            if (is_callable($options['alterRow'])) {
                $alterRow = $options['alterRow'];
            }
            else {
                throw new \InvalidArgumentException("alterRow must be a valid callback");
            }
        }
        else {
            $alterRow = function ($row) {
                return $row;
            };
        }


        $s = '';
        if (null !== $options['caption']) {
            $s .= '<caption>';
            $s .= $options['caption'];
            $s .= '</caption>';
        }
        $s .= '<table' . HtmlTool::toAttributesString($options['htmlAttributes']) . '>';
        $headers = $options['headers'];
        //------------------------------------------------------------------------------/
        // HEADERS
        //------------------------------------------------------------------------------/
        if ($headers) {
            $s .= '<tr>';
            foreach ($headers as $columnName) {
                $s .= '<th>' . $columnName . '</th>';
            }
            $s .= '</tr>';
        }

        //------------------------------------------------------------------------------/
        // BODY
        //------------------------------------------------------------------------------/
        foreach ($rows as $row) {
            if (is_array($row)) {
                $s .= '<tr' . HtmlTool::toAttributesString($trAttributesFromRow($row)) . '>';
                $alteredRow = $alterRow($row);
                foreach ($alteredRow as $v) {
                    $s .= '<td>' . $v . '</td>';
                }
                $s .= '</tr>';
            }
            else {
                throw new \InvalidArgumentException("Invalid rows format: must be an array of nodes");
            }
        }
        $s .= '</table>';

        if (true === $options['return']) {
            return $s;
        }
        echo $s;
    }


    /**
     * Returns an html attributes string based on the given array.
     * Support arguments with just value, like checked for example.
     *
     * Also, if an argument value is null, it is omitted;
     * this behaviour might be useful in this case where we define default attributes values,
     * then the client can unset them by setting a null value.
     *
     */
    public static function toAttributesString(array $attributes)
    {
        $s = '';
        foreach ($attributes as $k => $v) {
            if (is_numeric($k)) {
                $s .= ' ';
                $s .= htmlspecialchars($v, ENT_QUOTES, 'UTF-8');
            }
            else {
                if (null !== $v) {
                    $s .= ' ';
                    $s .= htmlspecialchars($k, ENT_QUOTES, 'UTF-8') . '="' . htmlspecialchars($v, ENT_QUOTES, 'UTF-8') . '"';
                }
            }
        }
        return $s;
    }
}
