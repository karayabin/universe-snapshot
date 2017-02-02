<?php


namespace BabyYaml;


use BabyYaml\Reader\BabyYamlReader;

class BabyYamlUtil
{

    /**
     * @var BabyYamlReader
     */
    private static $inst;


    private function __construct()
    {
    }

    private static function getInst()
    {
        if (null === self::$inst) {
            self::$inst = new BabyYamlReader();
        }
        return self::$inst;
    }


    public static function readFile($file)
    {
        return self::getInst()->readFile($file);
    }

}