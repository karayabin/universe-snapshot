<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\FileSystem\Caterpillar;


/**
 * CaterpillarTool
 * @author Lingtalfi
 * @pattern [caterpillar™]
 * 2014-08-21
 *
 */
class CaterpillarTool
{

    public static function getTags($file)
    {
        return explode('.', basename($file));
    }

}
