<?php


namespace ReflectionRepresentation;

use VariableToString\Adaptor\PhpDocVariableToStringAdaptor;
use VariableToString\VariableToStringUtil;


/**
 * ReflectionParameterUtil
 * @author Lingtalfi
 * 2015-10-27
 *
 */
class ReflectionParameterUtil
{


    protected $varToStringUtil;


    public static function create()
    {
        return new static();
    }

    public function getParameterAsString(\ReflectionParameter $parameter)
    {
        $words = [];
        if ($parameter->isArray()) {
            $words[] = 'array';
        }
        elseif (null !== $class = $parameter->getClass()) {
            $words[] = $class->getName();
        }

        $var = '';
        if ($parameter->isPassedByReference()) {
            $var .= '&';
        }
        if (version_compare(PHP_VERSION, '5.6.0') >= 0 && $parameter->isVariadic()) {
            $var .= '...';
        }
        $var .= '$' . $parameter->name;
        $words[] = $var;

        if (true === $parameter->isDefaultValueAvailable()) {
            $arg = $parameter->getDefaultValue();
            $words[] = '=';
            $words[] = $this->getDefaultValueRepresentation($arg);
        }
        return implode(' ', $words);
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function getDefaultValueRepresentation($arg)
    {
        return $this->getVariableToStringUtil()->toString($arg);
    }

    protected function getVariableToStringUtil()
    {
        if (null === $this->varToStringUtil) {
            $this->varToStringUtil = new VariableToStringUtil();
            $this->varToStringUtil->addAdaptor(new PhpDocVariableToStringAdaptor());
        }
        return $this->varToStringUtil;
    }
}
