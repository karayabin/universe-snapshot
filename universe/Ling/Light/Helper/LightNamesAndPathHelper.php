<?php


namespace Ling\Light\Helper;


use Ling\Bat\CaseTool;
use Ling\Light\Exception\LightException;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;

/**
 * The LightNamesAndPathHelper class.
 */
class LightNamesAndPathHelper
{
    /**
     * Returns the service name, based on the given planet name.
     *
     * @param string $planet
     * @return string
     * @throws \Exception
     */

    public static function getServiceName(string $planet): string
    {
        if (0 !== strpos($planet, 'Light_')) {
            throw new LightException("This method is only available for Light planets, $planet was given.");
        }
        $rest = substr($planet, 6);
        $rest = CaseTool::toHumanFlatCase($rest);
        $rest = CaseTool::toSnake($rest);
        return $rest;
    }


    /**
     * Returns a symbolic path, where the given absolute path to the application directory is replaced by the symbol [app].
     *
     * @param string $path
     * @param LightServiceContainerInterface $container
     * @return string
     */
    public static function getSymbolicPath(string $path, LightServiceContainerInterface $container): string
    {
        $p = explode($container->getApplicationDir(), $path, 2);
        if (2 === count($p)) {
            return '[app]' . array_pop($p);
        }
        return $path;
    }
}