<?php


namespace Ling\Light_PlanetInstaller\Repository;


use Ling\CopyDir\WithFilterCopyDirUtil;
use Ling\Light_PlanetInstaller\Helper\LpiGlobalDirHelper;
use Ling\Light_PlanetInstaller\Helper\LpiHelper;
use Ling\Light_PlanetInstaller\Helper\LpiVersionHelper;
use Ling\UniverseTools\DependencyTool;
use Ling\UniverseTools\PlanetTool;

/**
 * The LpiGlobalDirRepository class.
 */
class LpiGlobalDirRepository implements LpiRepositoryInterface
{


    //--------------------------------------------
    // LpiRepositoryInterface
    //--------------------------------------------
    /**
     * @implementation
     */
    public function hasPlanet(string $planetDot, string $realVersion): bool
    {
        return LpiGlobalDirHelper::globalDirHasPlanet($planetDot, $realVersion);
    }


    /**
     * @implementation
     */
    public function getFirstVersionWithMinimumNumber(string $planetDot, string $realVersion)
    {
        $versions = LpiGlobalDirHelper::getPlanetVersions($planetDot);
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
        $globalPlanetPath = LpiGlobalDirHelper::getPlanetPath($galaxy, $planet, $realVersion);


        /**
         * It created permissions problems with some files in the .git.
         * I figured generally we don't care of the .git file (except for the dev, but in this case, the
         * dev probably knows what he needs to do).
         */
        $o = WithFilterCopyDirUtil::create();
        $o->setFilter(function ($basename, $file, $targetFile) {
            if ('.git' === $basename) {
                return false;
            }
            return true;
        });

        $o->copyDir($globalPlanetPath, $dstDir);
    }


    /**
     * @implementation
     */
    public function getDependencies(string $planetDot, string $realVersion): array
    {
        list($galaxy, $planet) = PlanetTool::extractPlanetDotName($planetDot);
        $dir = LpiGlobalDirHelper::getPlanetPath($galaxy, $planet, $realVersion);
        $lpiDepsPath = $dir . "/lpi-deps.byml";
        if (file_exists($lpiDepsPath)) {
            return LpiHelper::getLpiDepsByLocation($lpiDepsPath, $realVersion);
        } else {
            /**
             * old planets don't have the lpi-deps.byml file, but they probably have the uni2 system (dependencies.byml).
             */
            $ret = [];
            $dependencies = DependencyTool::getDependencyList($dir);
            foreach ($dependencies as $dependency) {
                list($galaxy, $planet) = $dependency;
                $ret[] = [
                    $galaxy . "." . $planet,
                    "last",
                ];
            }
            return $ret;
        }
    }

    /**
     * @implementation
     */
    public function getUniDependencies(string $planetDot, string $realVersion): array
    {
        list($galaxy, $planet) = PlanetTool::extractPlanetDotName($planetDot);
        $dir = LpiGlobalDirHelper::getPlanetPath($galaxy, $planet, $realVersion);
        return LpiHelper::uniDependenciesToPlanetDotList(DependencyTool::getDependencyList($dir));
    }


}