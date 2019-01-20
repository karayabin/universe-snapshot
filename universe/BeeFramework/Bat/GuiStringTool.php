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
 * GuiStringTool
 * @author Lingtalfi
 * 2015-05-17
 *
 */
class GuiStringTool
{


    public static function trail($string, $length = 100, $trailer = '...')
    {
        $ret = mb_substr($string, 0, $length);
        if ($length < mb_strlen($string)) {
            $ret .= $trailer;
        }
        return $ret;
    }
}
