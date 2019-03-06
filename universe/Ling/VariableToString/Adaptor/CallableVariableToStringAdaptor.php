<?php

namespace Ling\VariableToString\Adaptor;

/*
 * LingTalfi 2015-10-27
 */


use Ling\ReflectionRepresentation\ReflectionParameterUtil;

class CallableVariableToStringAdaptor implements VariableToStringAdaptorInterface
{


    public function toString($var)
    {
        $ret = null;
        if (is_callable($var)) {
            if ($var instanceof \Closure) {
                $o = new \ReflectionFunction($var);
                $args = [];
                $rutil = ReflectionParameterUtil::create();
                foreach ($o->getParameters() as $p) {
                    $args[] = $rutil->getParameterAsString($p);
                }
                return 'closure(' . implode(', ', $args) . ')';
            }
            elseif (is_string($var)) {
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
                $ret = 'callable(' . $o->getName() . $char . $var[1] . '(' . $this->getMethodParametersAsString($m) . '))';
            }
            else {
                throw new \LogicException("Unknown case of callable");
            }
        }
        return $ret;

    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function getMethodParametersAsString(\ReflectionMethod $method)
    {
        $args = [];
        $rutil = ReflectionParameterUtil::create();
        foreach ($method->getParameters() as $p) {
            $args[] = $rutil->getParameterAsString($p);
        }
        return implode(', ', $args);
    }
}
