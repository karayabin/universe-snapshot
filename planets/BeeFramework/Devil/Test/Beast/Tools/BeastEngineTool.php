<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Devil\Test\Beast\Tools;

use BeeFramework\Bat\DebugTool;
use BeeFramework\Bat\HtmlTool;
use BeeFramework\Bat\VarTool;
use BeeFramework\Devil\Diff\LongestCommonSubsequence\LongestCommonSubsequenceTool;


/**
 * BeastEngineTool
 * @author Lingtalfi
 * 2014-08-13
 *
 */
class BeastEngineTool
{


    public static function getBeastTestResultsString(array $results)
    {
        $s = 0;
        $f = 0;
        $e = 0;
        $na = 0;
        $sk = 0;
        foreach ($results as $row) {
            if (array_key_exists(0, $row)) {
                switch ($row[0]) {
                    case 's':
                        $s++;
                        break;
                    case 'f':
                        $f++;
                        break;
                    case 'e':
                        $e++;
                        break;
                    case 'na':
                        $na++;
                        break;
                    case 'sk':
                        $sk++;
                        break;
                    default:
                        throw new \UnexpectedValueException("type must be one of s, f, e, na or sk");
                        break;
                }
            }
            else {
                throw new \InvalidArgumentException("Invalid row, must at least contain the 0 index");
            }
        }
        return sprintf('_BEAST_TEST_RESULTS:s=%d;f=%d;e=%d;na=%d;sk=%d__',
            $s,
            $f,
            $e,
            $na,
            $sk
        );
    }


    public static function displayDebugTable(array $columns, array $options = [])
    {
        $caption = '<div>-DEBUG TABLE-</div>';
        $noTransform = [];
        /**
         * Beware, noTransform must contain int (and not only numerical values)
         */
        if (array_key_exists('noTransform', $options) && is_array($options['noTransform'])) {
            $noTransform = $options['noTransform'];
        }
        $options = array_replace([
            'headers' => ['value', 'result', 'expected'],
            'useStyle' => true,
            /**
             * This option may only work with default cols (value, expected, result),
             * it will try
             */
            'diff' => [2, 3], // null | array containing the index of the two columns to diff
            'caption' => $caption,
            'htmlAttributes' => ["class" => "beast-tool-debug-table"],
            'alterRow' => function ($row) use ($noTransform, &$options) {

                foreach ($row as $k => $v) {
                    if (!in_array($k, $noTransform, true)) {
                        ob_start();
                        VarTool::dump($v);
                        $row[$k] = ob_get_clean();
                    }
                }
                return $row;
            },
        ], $options);


        if (true === $options['useStyle']) {
            echo '
                    <style>
                        .beast-tool-debug-table{
                            border-collapse: collapse;
                            text-align: left;
                        }
                        .beast-tool-debug-table,
                        .beast-tool-debug-table tr,
                        .beast-tool-debug-table th,
                        .beast-tool-debug-table td
                        {
                            border: 1px solid black;
                            padding: 5px;
                        }
                    </style>';
        }
        HtmlTool::quickTable($columns, $options);
    }

    public static function displayResultsTable(array $results, array $options = [])
    {
        $caption = '<div id="beast-test-results">' . BeastEngineTool::getBeastTestResultsString($results) . '</div>';
        $options = array_replace([
            'headers' => ['#', 'label', 'message'],
            'useStyle' => true,
            'caption' => $caption,
            'htmlAttributes' => ["class" => "beast-tool-results-table"],
            'trAttributesFromRow' => function ($row) {
                return [
                    'class' => 'type' . $row[0],
                ];
            },
            'alterRow' => function ($row) {
                unset($row[0]);
                return $row;
            },
        ], $options);


        if (true === $options['useStyle']) {
            echo '
                    <style>
                        .beast-tool-results-table{
                            border-collapse: collapse;
                            text-align: left;
                        }
                        .beast-tool-results-table,
                        .beast-tool-results-table tr,
                        .beast-tool-results-table th,
                        .beast-tool-results-table td
                        {
                            border: 1px solid black;
                            padding: 5px;
                        }
                        .beast-tool-results-table .types{
                            background: green;
                        }
                        .beast-tool-results-table .typef{
                            background: red;
                        }
                        .beast-tool-results-table .typee{
                            background: black;
                            color: yellow;
                        }
                        .beast-tool-results-table .typena{
                            background: orange;
                        }
                        .beast-tool-results-table .typesk{
                            background: white;
                        }
                    </style>';
        }
        HtmlTool::quickTable($results, $options);
    }


    public static function getTags(array $values)
    {
        $ret = [];
        foreach ($values as $letter => $value) {
            $mini = VarTool::toString($value);
            $mini = '$' . $letter . ' = ' . $mini;
            $auto = $mini;
            if (is_string($value)) {
                $auto = $value;
            }
            $ret['[' . $letter . ']'] = $auto;
            $ret['[' . $letter . '+]'] = $mini;
        }
        return $ret;
    }


    public static function getLabel(array $options, array $tags, array $callableArgs)
    {
        $label = '';
        if (array_key_exists('label', $options)) {
            $label = $options['label'];
            if (is_string($label)) {
                $label = self::replaceTags($label, $tags);
            }
            elseif (is_callable($label)) {
                $label = call_user_func_array($label, $callableArgs);
            }
        }
        return $label;
    }

    public static function replaceTags($string, array $tags)
    {
        return str_replace(array_keys($tags), array_values($tags), $string);
    }

}
