<?php


namespace Ling\Light_Lazy_Reference\Resolver;


/**
 * The MethodCallResolver class.
 */
class MethodCallResolver
{

    /**
     * Resolves a method call, and returns the result of that method call.
     *
     *
     * The syntax for $expr is one of the following:
     *
     * - $class::$method
     * - $class::$method ( $args )
     *
     *
     * With:
     *
     * - $class: the full class name (for instance: Ling\Light_Lazy_Reference\Resolver\Blabla)
     * - $method: the name of the method to call
     * - $args: a list of arguments, using the @page(shortcode notation)
     *
     *
     *
     * @param string $expr
     */
    public function resolve(string $expr)
    {
        az("HERE", $expr, __FILE__);
    }


}