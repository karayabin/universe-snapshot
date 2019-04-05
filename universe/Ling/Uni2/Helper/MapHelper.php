<?php


namespace Ling\Uni2\Helper;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\UniverseTools\DependencyTool;

/**
 * The MapHelper class.
 */
class MapHelper
{


    /**
     * Returns an array of planet id (galaxyName.planetShortName)
     * of the dependencies for the planet which dir is given.
     *
     *
     * @param string $planetDir
     * @return array
     * @throws \Ling\UniverseTools\Exception\UniverseToolsException
     */
    public static function getMapEntries(string $planetDir)
    {
        $ret = [];
        if (is_dir($planetDir)) {
            $conf = [];
            DependencyTool::parseDumpDependencies($planetDir, $conf);
            $deps = $conf['dependencies'] ?? [];
            foreach ($deps as $galaxy => $planets) {
                foreach ($planets as $planet) {
                    $ret[] = $galaxy . "." . $planet;
                }
            }
        }
        return $ret;
    }


    /**
     * Creates the map of dependencies for the planet $planetDir at the given $dstFile location.
     * Returns whether or not the $dstFile then exists.
     *
     * THe map of dependencies is a @page(BabyYaml) file which looks something like this:
     *
     * ```yaml
     * - Ling.Bat
     * - Ling.BabyYaml
     * - Ling.CliTools
     * ```
     *
     *
     *
     *
     *
     * @param string $planetDir
     * @param string $dstFile
     * @param bool $addBumbleBee
     * Whether to add the Ling.BumbleBee planet.
     *
     * @return bool
     * @throws \Ling\UniverseTools\Exception\UniverseToolsException
     */
    public static function createMap(string $planetDir, string $dstFile, bool $addBumbleBee = false): bool
    {
        $entries = self::getMapEntries($planetDir);
        if (true === $addBumbleBee) {
            $entries[] = "Ling.BumbleBee";
            $entries = array_unique($entries);
            sort($entries);
        }
        BabyYamlUtil::writeFile($entries, $dstFile);
        return file_exists($dstFile);
    }

}