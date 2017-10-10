<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\Console\KeyboardListener\Observer\SymbolicCodeObserver\Tool;

use BeeFramework\Bat\StringTool;


/**
 * AutocompleteTool
 * @author Lingtalfi
 * 2015-05-08
 *
 */
class AutocompleteTool
{

    public static function getMatchingSuggestions($search, array $suggestions, $caseSensitive = false, $ignoreAccents = true)
    {
        $ret = [];

        if (false === $caseSensitive) {
            array_walk($suggestions, function (&$v) {
                $v = strtolower($v);
            });
        }

        if (true === $ignoreAccents) {
            $search = StringTool::stripAccents($search);
        }
        $l = strlen($search);
        foreach ($suggestions as $s) {
            $s = trim($s);
            $test = $s;
            if (false === $caseSensitive) {
                $test = strtolower($test);
            }

            if (true === $ignoreAccents) {
                $test = StringTool::stripAccents($s);
            }
            if ($search === substr($test, 0, $l)) {
                $ret[] = $s;
            }
        }
        return $ret;

    }

}
