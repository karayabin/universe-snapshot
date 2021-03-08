<?php


namespace Ling\UniverseTools;

/**
 * The LocalUniverseTool class.
 */
class LocalUniverseTool
{


    /**
     * Returns the path to the [local universe](https://github.com/lingtalfi/UniverseTools/blob/master/doc/pages/conception-notes.md#local-universe).
     *
     * @return string
     */
    public static function getLocalUniversePath(): string
    {
        $confFile = "/usr/local/share/universe/Ling/UniverseTools/local-universe-path.txt";
        if (true === file_exists($confFile)) {
            return trim(file_get_contents($confFile));
        }
        return "/myphp/universe";
    }


    /**
     * Returns the path to the local universe planet dir if it exists, or null otherwise.
     *
     *
     * @param string $planetDotName
     * @return string|null
     */
    public static function getPlanetDir(string $planetDotName): ?string
    {
        $slash = PlanetTool::getPlanetSlashNameByDotName($planetDotName);
        $uniDir = self::getLocalUniversePath();
        $planetDir = $uniDir . "/$slash";
        if (true === is_dir($planetDir)) {
            return $planetDir;
        }
        return null;
    }
}