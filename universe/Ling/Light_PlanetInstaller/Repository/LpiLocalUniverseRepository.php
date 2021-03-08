<?php


namespace Ling\Light_PlanetInstaller\Repository;


use Ling\Bat\FileSystemTool;
use Ling\Light_PlanetInstaller\Exception\LightPlanetInstallerException;
use Ling\Light_PlanetInstaller\Helper\LpiDepsFileHelper;
use Ling\Light_PlanetInstaller\Helper\LpiHelper;
use Ling\Light_PlanetInstaller\Helper\LpiLocalUniverseHelper;
use Ling\UniverseTools\DependencyTool;

/**
 * The LpiLocalUniverseRepository class.
 */
class LpiLocalUniverseRepository implements LpiRepositoryInterface
{


    /**
     * Returns the planet path in the local universe that matches the given planet dot name, or false otherwise.
     * @param string $planetDot
     * @return string|false
     */
    public function getPlanetPath(string $planetDot): string|false
    {
        $ret = LpiLocalUniverseHelper::getPlanetPath($planetDot);
        if (null === $ret) {
            return false;
        }
        return $ret;
    }


    //--------------------------------------------
    // LpiRepositoryInterface
    //--------------------------------------------
    /**
     * @implementation
     */
    public function hasPlanet(string $planetDot, string $realVersion): bool
    {
        if (true === LpiLocalUniverseHelper::hasPlanet($planetDot)) {
            $version = LpiLocalUniverseHelper::getVersion($planetDot);
            return ($version === $realVersion);
        }
        return false;
    }


    /**
     * @implementation
     */
    public function getFirstVersionWithMinimumNumber(string $planetDot, string $realVersion)
    {
        throw new LightPlanetInstallerException("Not implemented yet, not necessary at the moment.");
    }


    /**
     * @implementation
     */
    public function copy(string $planetDot, string $realVersion, string $dstDir, array &$warnings = []): void
    {
        if (true === LpiLocalUniverseHelper::hasPlanet($planetDot)) {
            $version = LpiLocalUniverseHelper::getVersion($planetDot);
            if ($version === $realVersion) {
                $planetDir = LpiLocalUniverseHelper::getPlanetPath($planetDot);
                if (null !== $planetDir) {
                    FileSystemTool::copyDir($planetDir, $dstDir);
                    return;
                } else {
                    throw new LightPlanetInstallerException("Planet path not found in local universe for $planetDot:$realVersion.");
                }
            }
        }
        throw new LightPlanetInstallerException("Planet not found in local universe for $planetDot:$realVersion.");
    }


    /**
     * @implementation
     */
    public function getDependencies(string $planetDot, string $realVersion): array
    {
        $planetDir = LpiLocalUniverseHelper::getPlanetPath($planetDot);
        if (null !== $planetDir) {
            $lpiDepsPath = LpiDepsFileHelper::getLpiDepsFilePathByPlanetDir($planetDir);
            return LpiDepsFileHelper::getLpiDepsByLocation($lpiDepsPath, $realVersion);
        }
        return [];
    }


    /**
     * @implementation
     */
    public function getUniDependencies(string $planetDot, string $realVersion): array
    {
        $planetDir = LpiLocalUniverseHelper::getPlanetPath($planetDot);
        if (null !== $planetDir) {
            $dependenciesFile = $planetDir . "/dependencies.byml";
            return LpiHelper::uniDependenciesToPlanetDotList(DependencyTool::getDependencyListByFile($dependenciesFile));
        }
        return [];
    }


}