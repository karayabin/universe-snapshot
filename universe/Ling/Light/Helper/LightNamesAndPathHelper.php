<?php


namespace Ling\Light\Helper;


use Ling\Bat\CaseTool;
use Ling\Light\Exception\LightException;

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
}