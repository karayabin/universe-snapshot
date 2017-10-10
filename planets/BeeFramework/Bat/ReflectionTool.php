<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Bat;

use BeeFramework\Notation\Reflection\ReflectionParameterUtil\ReflectionParameterUtil;


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
