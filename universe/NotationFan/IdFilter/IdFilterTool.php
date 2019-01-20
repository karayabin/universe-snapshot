<?php

namespace NotationFan\IdFilter;

/*
 * LingTalfi 2015-10-05
 */
class IdFilterTool
{

    private static $inst;

    public static function getSelectedIds($string)
    {
        return self::getInst()->getSelectedIds($string);
    }

    private static function getInst()
    {
        if (null === self::$inst) {
            self::$inst = new IdFilterUtil();
        }
        return self::$inst;
    }

}
