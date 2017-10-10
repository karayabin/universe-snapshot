<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Application\ElementInstallerOld\Tool;


/**
 * ElementMetaTool
 * @author Lingtalfi
 * 2015-04-19
 *
 */
class ElementMetaTool
{

    /**
     * @return int,
     *      - 0 if a === b
     *      - 1 if a > b
     *      - 2 if b > a
     */
    public static function compare3mVersion($a, $b)
    {
        if ($a === $b) {
            return 0;
        }
        if ((int)$a > (int)$b) {
            return 1;
        }
        return 2;
    }
    
    
    public static function getLatestElementMeta(array $elementInfoItems, &$successfulKey = null)
    {
        $v = 0;
        $ret = [];
        foreach ($elementInfoItems as $key => $info) {
            if (1 === self::compare3mVersion($info['version'], $v)) {
                $v = $info['version'];
                $ret = $info;
                $successfulKey = $key;
            }
        }
        return $ret;
    }
}
