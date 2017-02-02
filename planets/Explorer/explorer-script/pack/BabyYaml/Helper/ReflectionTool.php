<?php

namespace BabyYaml\Helper;
use BabyYaml\Helper\ReflectionParameterUtil\ReflectionParameterUtil;


/**
 * ReflectionTool
 * @author Lingtalfi
 * 2015-04-26
 *
 */
class ReflectionTool
{


    /**
     * @param \ReflectionParameter $parameter
     */
    public static function getParameterAsString(\ReflectionParameter $parameter)
    {
        $o = new ReflectionParameterUtil();
        return $o->getParameterAsString($parameter);
    }

    public static function getMethodParametersAsString(\ReflectionMethod $method)
    {
        $args = [];
        foreach ($method->getParameters() as $p) {
            $args[] = self::getParameterAsString($p);
        }
        return implode(', ', $args);
    }
}
