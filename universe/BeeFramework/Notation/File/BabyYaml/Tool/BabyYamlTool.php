<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\File\BabyYaml\Tool;

use BeeFramework\Notation\File\BabyYaml\Resolver\BabyYamlDashTreeResolver;
use BeeFramework\Notation\File\BabyYaml\Writer\BabyYamlWriter;
use BeeFramework\Notation\File\BabyYaml\Reader\BabyYamlReader;


/**
 * BabyYamlTool
 * @pattern [babyYaml™]
 * @author Lingtalfi
 *
 */
class BabyYamlTool
{

    /**
     * @var BabyYamlReader
     */
    private static $inst;
    /**
     * @var BabyYamlWriter
     */
    private static $winst;


    private function __construct()
    {
    }

    public static function parseFile($file)
    {
        return self::getInst()->readFile($file);
    }

    public static function export(array $data, $file = null)
    {
        return self::getWInst()->export($data, $file);
    }


    private static function getInst()
    {
        if (null === self::$inst) {
            self::$inst = new BabyYamlReader();
        }
        return self::$inst;
    }

    private static function getWInst()
    {
        if (null === self::$winst) {
            self::$winst = new BabyYamlWriter();
        }
        return self::$winst;
    }


}
