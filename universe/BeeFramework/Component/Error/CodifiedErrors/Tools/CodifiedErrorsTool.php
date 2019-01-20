<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Error\CodifiedErrors\Tools;


/**
 * CodifiedErrorsTool
 * @author Lingtalfi
 * 2015-02-28
 *
 */
class CodifiedErrorsTool
{


    public static function toPlainErrorMessages(array $codifiedErrors)
    {
        $ret = [];
        foreach ($codifiedErrors as $codError) {
            $ret[] = $codError[0] . ': ' . $codError[1];
        }
        return $ret;
    }
}
