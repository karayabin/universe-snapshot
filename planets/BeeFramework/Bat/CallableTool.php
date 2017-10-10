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


/**
 * CallableTool
 * @author Lingtalfi
 * 2015-06-03
 *
 */
class CallableTool
{


    /**
     * @param callable $callable
     * @return \ReflectionParameter[]
     */
    public static function getParameters(callable $callable)
    {
        if ($callable instanceof \Closure || is_string($callable)) {
            $o = new \ReflectionFunction($callable);
            return $o->getParameters();
        }
        if (is_array($callable) && 2 === count($callable)) {
            $callable = array_merge($callable);
            $o = new \ReflectionMethod($callable[0], $callable[1]);
            return $o->getParameters();
        }

        throw new \RuntimeException("Unknown callable type");
    }

    public static function getParametersNameAndOptional(callable $callable)
    {
        $ret = [];
        $p = self::getParameters($callable);
        foreach ($p as $param) {
            $ret[] = [$param->name, $param->isOptional()];
        }
        return $ret;
    }
}
