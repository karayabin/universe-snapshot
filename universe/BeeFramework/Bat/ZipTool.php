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
 * ZipTool
 * @author Lingtalfi
 * 2015-07-03
 *
 */
class ZipTool
{


    public static function unzip($src, $dst = null)
    {
        return CompressTool::unzip($src, $dst);
    }
    public static function zip($src, $dst = null)
    {
        return CompressTool::zip($src, $dst);
    }
}
