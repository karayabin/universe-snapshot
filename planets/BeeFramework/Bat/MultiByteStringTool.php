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
 * MultiByteStringTool
 * @author Lingtalfi
 * 2015-06-12
 *
 */
class MultiByteStringTool
{

    public static function getByteSafeChars($string, $encoding = null)
    {
        $len = mb_strlen($string, $encoding);
        $ret = [];
        for ($i = 0; $i < $len; $i++) {
            $ret[] = mb_substr($string, $i, 1);
        }
        return $ret;
    }

    public static function loop($string, callable $onChar, $offset = 0, $encoding = null)
    {
        if (null === $encoding) {
            $encoding = mb_internal_encoding();
        }
        $len = mb_strlen($string, $encoding);
        if ($offset > $len) {
            $offset = $len;
        }
        if ($offset < 0) {
            $offset = 0;
        }
        for ($i = $offset; $i < $len; $i++) {
            call_user_func($onChar, mb_substr($string, $i, 1, $encoding));
        }
    }


}
