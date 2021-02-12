<?php


namespace Ling\Light_PlanetInstaller\Repository;


use Ling\Light_PlanetInstaller\Exception\LightPlanetInstallerException;
use Ling\Light_PlanetInstaller\Helper\LpiImporterHelper;
use Ling\Light_PlanetInstaller\Helper\LpiVersionHelper;
use Ling\Light_PlanetInstaller\Helper\LpiWebHelper;
use Ling\UniverseTools\PlanetTool;

/**
 * The LpiWebRepository class.
 */
class LpiWebRepository implements LpiRepositoryInterface
{


    //--------------------------------------------
    // LpiRepositoryInterface
    //--------------------------------------------
    /**
     * @implementation
     */
    public function hasPlanet(string $planetDot, string $realVersion): bool
    {
        list($galaxy, $planet) = PlanetTool::extractPlanetDotName($planetDot);

        // looking for the exact version
        $importer = LpiImporterHelper::getImporterByGalaxy($galaxy);
        return $importer->hasItem($galaxy . "/" . $planet, $realVersion);
    }


    /**
     * @implementation
     */
    public function getFirstVersionWithMinimumNumber(string $planetDot, string $realVersion)
    {
        $versions = LpiWebHelper::getPlanetVersions($planetDot);
        foreach ($versions as $version) {

            if (true === LpiVersionHelper::compare($version, $realVersion, true)) {
                return $version;
            }
        }
        return false;
    }


    /**
     * @implementation
     */
    public function copy(string $planetDot, string $realVersion, string $dstDir, array &$warnings = []): void
    {
        list($galaxy, $planet) = PlanetTool::extractPlanetDotName($planetDot);

        // looking for the exact version
        $importer = LpiImporterHelper::getImporterByGalaxy($galaxy);
        if (true === $importer->hasItem($galaxy . "/" . $planet, $realVersion)) {
            list($galaxy, $planet) = PlanetTool::extractPlanetDotName($planetDot);
            $importer->importItem($galaxy . "/" . $planet, $realVersion, $dstDir, $warnings);
        } else {
            throw new LightPlanetInstallerException("Planet $planetDot:$realVersion not found, cannot import.");
        }
    }


    /**
     * @implementation
     */
    public function getDependencies(string $planetDot, string $realVersion): array
    {
        list($galaxy, $planet) = PlanetTool::extractPlanetDotName($planetDot);
        $importer = LpiImporterHelper::getImporterByGalaxy($galaxy);
        return $importer->getDependencies($galaxy . "/" . $planet, $realVersion);
    }


    /**
     * @implementation
     */
    public function getUniDependencies(string $planetDot, string $realVersion): array
    {
        list($galaxy, $planet) = PlanetTool::extractPlanetDotName($planetDot);
        $importer = LpiImporterHelper::getImporterByGalaxy($galaxy);
        return $importer->getUniDependencies($galaxy . "/" . $planet);
    }


}