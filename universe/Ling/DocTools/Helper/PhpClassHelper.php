<?php


namespace Ling\DocTools\Helper;


/**
 * The PhpClassHelper class.
 *
 * A helper class to help with stuff related to the php.net website, and or the php language in general.
 *
 */
class PhpClassHelper
{


    /**
     * Returns a map of php class to url.
     *
     *
     *
     * @return array
     */
    public static function getClasses2Urls()
    {
        return [
            '\\Exception' => "http://php.net/manual/en/class.exception.php",
            '\\Throwable' => "http://php.net/manual/en/class.throwable.php",
            //
            '\\ReflectionClass' => "http://php.net/manual/en/class.reflectionclass.php",
            '\\ReflectionMethod' => "http://php.net/manual/en/class.reflectionmethod.php",
            '\\ReflectionParameter' => "http://php.net/manual/en/class.reflectionparameter.php",
            '\\ReflectionProperty' => "http://php.net/manual/en/class.reflectionproperty.php",
            '\\ReflectionException' => "http://php.net/manual/en/class.reflectionexception.php",
            // SPL
            '\\BadFunctionCallException' => "http://php.net/manual/en/class.badfunctioncallexception.php",
            '\\BadMethodCallException' => "http://php.net/manual/en/class.badmethodcallexception.php",
            '\\DomainException' => "http://php.net/manual/en/class.domainexception.php",
            '\\InvalidArgumentException' => "http://php.net/manual/en/class.invalidargumentexception.php",
            '\\LengthException' => "http://php.net/manual/en/class.lengthexception.php",
            '\\LogicException' => "http://php.net/manual/en/class.logicexception.php",
            '\\OutOfBoundsException' => "http://php.net/manual/en/class.outofboundsexception.php",
            '\\OutOfRangeException' => "http://php.net/manual/en/class.outofrangeexception.php",
            '\\OverflowException' => "http://php.net/manual/en/class.overflowexception.php",
            '\\RangeException' => "http://php.net/manual/en/class.rangeexception.php",
            '\\RuntimeException' => "http://php.net/manual/en/class.runtimeexception.php",
            '\\UnderflowException' => "http://php.net/manual/en/class.underflowexception.php",
            '\\UnexpectedValueException' => "http://php.net/manual/en/class.unexpectedvalueexception.php",

        ];
    }
}