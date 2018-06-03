<?php


namespace Kamille\Utils\Routsy\Util\ConfigGenerator\Helper;


use LinearFile\LineSetFinder\BiggestWrapLineSetFinder;

class RoutsyConfigFileGeneratorHelper
{


    public static function getLineSets(array $lines)
    {
        $pat = '!^\$routes\[([^\]]+)\]\s*=!';
        $lineSets = BiggestWrapLineSetFinder::create()
            ->setPrepareNameCallback(function ($v) {
                return substr($v, 1, -1);
            })
            ->setNamePattern($pat)
            ->setStartPattern($pat)
            ->setPotentialEndPattern('!\];!')
            ->find($lines);
        return $lineSets;
    }


    public static function isDynamic($uri)
    {
        return (false !== strpos($uri, '{'));
    }




}