<?php

namespace Ling\Light_Kit\PageConfigurationTransformer\LazyReferenceResolver;


use Ling\Bat\SmartCodeTool;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;

/**
 * The RouteResolver class.
 */
class RouteResolver
{
    /**
     * Resolves the given $routeExpr and returns the corresponding url.
     *
     * The $routeExpr has the following format:
     *
     * - $route (  ::$routeParams  )?
     *
     * The $routeParams use the smartCode notation.
     *
     *
     * Example:
     *
     * - /myroute
     * - /myroute::{param1: value1, param2: value2}
     *
     *
     * More details about [SmartCodeNotation](https://github.com/lingtalfi/Bat/blob/master/SmartCodeTool.md).
     *
     *
     *
     *
     *
     * @param string $routeExpr
     * @param LightServiceContainerInterface $container
     * @return string
     * @throws \Exception
     */
    public function resolve(string $routeExpr, LightServiceContainerInterface $container)
    {
        $p = explode('::', $routeExpr, 2);
        $route = $p[0];
        $params = [];
        if (2 === count($p)) {
            $params = SmartCodeTool::parse($p[1]);
        }
        return $container->get("reverse_router")->getUrl($route, $params);
    }
}