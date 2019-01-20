<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\Variable\InlineVariableUtil\Adaptor;

use BeeFramework\Bat\ReflectionTool;


/**
 * CallableInlineVariableUtilAdaptor
 * @author Lingtalfi
 * 2015-04-27
 *
 */
class CallableInlineVariableUtilAdaptor extends InlineVariableUtilAdaptor
{

    protected function getStringVersion($var, $type)
    {
        $ret = false;
        if (is_callable($var)) {
            if (is_string($var)) {
                $ret = 'callable(' . $var . ')';
            }
            elseif (is_array($var) && isset($var[0]) && isset($var[1])) {

                // static?
                $o = new \ReflectionClass($var[0]);
                $m = $o->getMethod($var[1]); // throws a \ReflectionException if the method does not exist

                if (true === $m->isStatic()) {
                    $char = '::';
                }
                else {
                    $char = '->';
                }
                $ret = 'callable(' . $o->getName() . $char . $var[1] . '(' . ReflectionTool::getMethodParametersAsString($m) . '))';
            }
            else {
                throw new \LogicException("Unknown case of callable");
            }
        }
        return $ret;
    }
}
