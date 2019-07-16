<?php

namespace Ling\Light_Kit\PageConfigurationTransformer\LazyReferenceResolver;


use Ling\Bat\ClassTool;

/**
 * The MethodCallResolver class.
 */
class MethodCallResolver
{
    /**
     * Interprets the given $expr and returns the result.
     *
     * The given $expr should have one of the following format:
     *
     * - $class::$method
     * - $class::$method($args)
     *
     *
     * With:
     * - $class: the full class name (i.e. Ling\Light_Kit\PageConfigurationTransformer\Blabla)
     * - $method: the method name
     * - $args: a list of args written in [shortcode notation](https://github.com/lingtalfi/Bat/blob/master/ShortCodeTool.md#parse)
     *
     *
     *
     * @param string $expr
     * @return mixed
     * @throws \Exception
     */
    public function resolve(string $expr)
    {
        return ClassTool::executePhpMethod($expr);
    }
}