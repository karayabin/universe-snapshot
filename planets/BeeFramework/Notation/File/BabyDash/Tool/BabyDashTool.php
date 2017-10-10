<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\File\BabyDash\Tool;

use BeeFramework\Notation\File\BabyDash\Exception\BabyDashException;
use BeeFramework\Notation\File\BabyDash\Reader\BabyDashReader;


/**
 * BabyDashTool
 * @author Lingtalfi
 * 2015-04-17
 *
 */
class BabyDashTool
{

    /**
     * @var BabyDashReader
     */
    private static $inst;
//    /**
//     * @var BabyYamlWriter
//     */
//    private static $winst;


    private function __construct()
    {
    }

    /**
     * @param array $options
     *
     *      - multiline: bool=false
     *      - mapping: bool=false
     *      - sequence: bool=false
     *
     * @return array
     * @throws BabyDashException when something goes wrong
     */
    public static function parseFile($file, array $options = [])
    {
        return self::getReader($options)->readFile($file);
    }


    public static function parseString($string, array $options = [])
    {
        return self::getReader($options)->readString($string);
    }

//    public static function write($file, array $data)
//    {
//        $options = [];
//        return self::getWInst()->write($data, $file, $options);
//    }

    private static function getInst()
    {
        if (null === self::$inst) {
            $options = [];
            self::$inst = BabyDashReader::create($options);
        }
        return self::$inst;
    }

//    private static function getWInst()
//    {
//        if (null === self::$winst) {
//            self::$winst = new BabyYamlWriter();
//        }
//        return self::$winst;
//    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private static function getReader(array $options)
    {
        $options = array_replace([
            'multiline' => false,
            'mapping' => false,
            'sequence' => false,
        ], $options);

        $reader = self::getInst();
        $reader->getInterpreter()->resetPile($options['mapping'], $options['sequence']);
        $reader->getBuilder()->setOption('useMultiline', $options['multiline']);
        return $reader;
    }


}
