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
        ];
    }
}