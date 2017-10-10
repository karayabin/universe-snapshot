<?php

namespace ArrayToString;


use ArrayToString\SymbolManager\PhpArrayToStringSymbolManager;

class ArrayToStringTool
{

    /**
     * @param array $array
     * @param $showKeys : null|false|true: whether or not to show keys.
     *                          If null, numeric keys will only be shown if there are non-numeric.
     * @return string
     */
    public static function toPhpArray(array $array, $showKeys = null, $offset=0)
    {
        $manager = new PhpArrayToStringSymbolManager();
        $manager->setOffset($offset);
        $keysMode = (null === $showKeys) ? 'auto' : $showKeys;
        $manager->setShowKeysMode($keysMode);
        return ArrayToStringUtil::create()
            ->setSymbolManager($manager)
            ->toString($array);
    }

}
