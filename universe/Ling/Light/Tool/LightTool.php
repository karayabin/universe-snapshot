<?php


namespace Ling\Light\Tool;

use Ling\Light\ServiceContainer\LightServiceContainerInterface;

/**
 * The LightTool class.
 */
class LightTool
{

    /**
     * Returns whether the matching route (if any) is an ajax route.
     *
     * @param LightServiceContainerInterface $container
     * @return bool
     * @throws \Exception
     */
    public static function isAjax(LightServiceContainerInterface $container): bool
    {
        $matchingRoute = $container->getLight()->getMatchingRoute();
        if (false !== $matchingRoute) {
            $isAjax = $matchingRoute['is_ajax'] ?? false;
            return $isAjax;
        }
        return false;
    }

    /**
     * Returns the plugin name from the given instance.
     *
     *
     * @param $instance
     * @return string
     */
    public static function getPluginName($instance): string
    {
        // light is part of the universe framework, so we know the naming convention.
        $p = explode('\\', get_class($instance));
        array_shift($p); // drop galaxy
        return array_shift($p); // return planet name
    }
}