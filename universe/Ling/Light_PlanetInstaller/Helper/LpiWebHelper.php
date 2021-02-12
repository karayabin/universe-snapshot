<?php


namespace Ling\Light_PlanetInstaller\Helper;

use Exception;
use Ling\UniverseTools\PlanetTool;

/**
 * The LpiWebHelper class.
 */
class LpiWebHelper
{

    /**
     * Returns the current version number of the given planet, as found on the web.
     *
     * @param string $planetDot
     * @return string
     * @throws Exception
     */
    public static function getPlanetCurrentVersion(string $planetDot): string
    {
        list($galaxy, $planet) = PlanetTool::extractPlanetDotName($planetDot);
        $importer = LpiImporterHelper::getImporterByGalaxy($galaxy);
        return $importer->getCurrentVersion("$galaxy/$planet");
    }


    /**
     * Returns the version numbers available for the given planet (in the web repo), sorted by increasing value.
     *
     *
     * @param string $planetDot
     * @return array
     * @throws Exception
     */
    public static function getPlanetVersions(string $planetDot): array
    {
        list($galaxy, $planet) = PlanetTool::extractPlanetDotName($planetDot);

        // looking for the exact version
        $importer = LpiImporterHelper::getImporterByGalaxy($galaxy);
        return $importer->getAllVersions("$galaxy/$planet");
    }

}