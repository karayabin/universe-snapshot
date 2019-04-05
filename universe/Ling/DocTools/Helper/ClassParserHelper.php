<?php


namespace Ling\DocTools\Helper;


use Ling\Bat\ClassTool;

/**
 * The ClassParserHelper class.
 */
class ClassParserHelper
{


    /**
     * Returns the \ReflectionClass of the ancestors (of the given $class) having the given $method.
     *
     * @param \ReflectionClass $class
     * @param string $method
     * @return array
     */
    public static function getAncestorClassesWithMethod(\ReflectionClass $class, string $method)
    {
        $allAncestors = ClassTool::getAncestors($class, true);
        return array_filter($allAncestors, function (\ReflectionClass $class) use ($method) {
            return $class->hasMethod($method);
        });
    }
}