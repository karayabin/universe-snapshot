<?php


namespace Ling\Light_PlanetInstaller\Repository;


use Ling\Light_PlanetInstaller\Exception\LightPlanetInstallerException;
use Ling\UniverseTools\MetaInfoTool;
use Ling\UniverseTools\PlanetTool;

/**
 * The LpiApplicationRepository class.
 */
class LpiApplicationRepository implements LpiRepositoryInterface
{

    /**
     * This property holds the appDir for this instance.
     * @var string
     */
    protected $appDir;


    /**
     * Builds the ApplicationRepository instance.
     */
    public function __construct()
    {
        $this->appDir = null;
    }

    /**
     * Sets the appDir.
     *
     * @param string $appDir
     */
    public function setAppDir(string $appDir)
    {
        $this->appDir = $appDir;
    }





    //--------------------------------------------
    // LpiRepositoryInterface
    //--------------------------------------------
    /**
     * @implementation
     */
    public function hasPlanet(string $planetDot, string $realVersion): bool
    {
        list($galaxy, $planet) = PlanetTool::extractPlanetDotName($planetDot);
        $planetDir = $this->appDir . "/universe/$galaxy/$planet";

        // assuming uni2 planet
        $currentVersion = PlanetTool::getVersionByPlanetDir($planetDir);
        if (null === $currentVersion) {
            throw new LightPlanetInstallerException("Cannot find the version number for this planet: $planetDot (planetDir=$planetDir).");
        }
        return ($realVersion === $currentVersion);
    }


    /**
     * @implementation
     */
    public function getFirstVersionWithMinimumNumber(string $planetDot, string $realVersion)
    {
        list($galaxy, $planet) = PlanetTool::extractPlanetDotName($planetDot);
        $planetDir = $this->appDir . "/universe/$galaxy/$planet";
        // assuming uni2 planet
        $version = MetaInfoTool::getVersion($planetDir);
        if (empty($version)) {
            return false;
        }
        if ($version >= $realVersion) {
            return $version;
        }
        return false;
    }


    /**
     * @implementation
     */
    public function copy(string $planetDot, string $realVersion, string $dstDir, array &$warnings = []): void
    {
        throw new LightPlanetInstallerException("You shouldn't need this method for the application repository.");
    }


    /**
     * @implementation
     */
    public function getDependencies(string $planetDot, string $realVersion): array
    {
        throw new LightPlanetInstallerException("Are you sure you want to call the getDependencies method?");
    }


    /**
     * @implementation
     */
    public function getUniDependencies(string $planetDot, string $realVersion): array
    {
        throw new LightPlanetInstallerException("Are you sure you want to call the getUniDependencies method?");
    }


}