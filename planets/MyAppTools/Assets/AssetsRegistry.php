<?php

namespace MyAppTools\Assets;

/*
 * LingTalfi 2016-01-13
 * 
 * This class help you not to pollute php global space with variables of type $useAAALib.
 * If you don't know what those variables are, then you probably don't need this class.
 * 
 */
class AssetsRegistry
{

    private static $assets = [];

    
    
    public static function add($libName)
    {
        self::$assets[] = $libName;
    }

    public static function has($libName)
    {
        return (in_array($libName, self::$assets, true));
    }
}
