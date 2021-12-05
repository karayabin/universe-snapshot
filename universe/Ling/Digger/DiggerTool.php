<?php


namespace Ling\Digger;

use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\BDotTool;
use Ling\UniverseTools\PlanetTool;

/**
 * The DiggerTool class.
 */
class DiggerTool
{

    /**
     * Returns the digger value for the given dotKey (using bdot notation), or the default value otherwise.
     *
     *
     * Learn more about digger at: https://github.com/lingtalfi/TheBar/blob/master/discussions/digger.md
     *
     * Learn more about bdot notation at: https://github.com/karayabin/universe-snapshot/blob/master/universe/Ling/Bat/doc/bdot-notation.md
     *
     * @param string $appDir
     * @param string $planetDotName
     * @param string $dotKey
     * @param null $default
     * @return mixed
     * @throws \Exception
     */
    public static function getValue(string $appDir, string $planetDotName, string $dotKey, $default = null)
    {
        $diggerPath = self::getDiggerFile($appDir, $planetDotName);
        if (true === file_exists($diggerPath)) {
            $arr = BabyYamlUtil::readFile($diggerPath);
            return BDotTool::getDotValue($dotKey, $arr, $default);
        }
        return $default;
    }


    /**
     * Returns the path to the digger file.
     *
     * @param string $appDir
     * @param string $planetDotName
     * @return string
     * @throws \Exception
     */
    public static function getDiggerFile(string $appDir, string $planetDotName): string
    {
        list($galaxy, $planet) = PlanetTool::extractPlanetDotName($planetDotName);
        return "$appDir/universe/$galaxy/$planet/digger.byml";
    }
}