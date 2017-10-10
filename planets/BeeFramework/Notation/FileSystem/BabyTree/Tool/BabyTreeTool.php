<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\FileSystem\BabyTree\Tool;

use BeeFramework\Notation\FileSystem\BabyTree\Scanner\BabyTreeArrayScanner;


/**
 * BabyTreeTool
 * @author Lingtalfi
 * 2015-04-28
 *
 */
class BabyTreeTool
{


    /**
     * Returns a babyTree array by parsing a directory.
     */
    public static function scanTree($dir)
    {
        $o = new BabyTreeArrayScanner();
        return $o->scanDir($dir);
    }
}
