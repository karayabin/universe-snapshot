<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\File\BabyXml\Util;

use BeeFramework\Notation\File\BabyXml\Reader\BabyXmlReader;


/**
 * BabyXmlTool
 * @author Lingtalfi
 *
 */
class BabyXmlTool
{

    /**
     * @var BabyXmlReader
     */
    private static $inst;


    private function __construct()
    {
    }

    public static function parseFile($file)
    {
        return self::getInst()->readFile($file);
    }


    public static function getInst()
    {
        if (null === self::$inst) {
            self::$inst = new BabyXmlReader();
        }
        return self::$inst;
    }


}
