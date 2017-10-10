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
 * TagTool
 * @author Lingtalfi
 * 2015-05-28
 *
 */
class TagTool
{


    public static function tagify(array $tags, $beginChar = '{', $endChar = '}')
    {
        $ret = [];
        foreach ($tags as $k => $v) {
            $ret[$beginChar . $k . $endChar] = $v;
        }
        return $ret;
    }
}
