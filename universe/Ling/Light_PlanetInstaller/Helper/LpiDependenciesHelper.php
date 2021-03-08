<?php


namespace Ling\Light_PlanetInstaller\Helper;

use Ling\BabyYaml\BabyYamlUtil;
use Ling\Light_PlanetInstaller\Exception\LpiIncompatibleException;
use Ling\Light_PlanetInstaller\Repository\LpiWebRepository;
use Ling\UniverseTools\PlanetTool;

/**
 * The LpiDependenciesHelper class.
 */
class LpiDependenciesHelper
{


    /**
     * This property holds the webRepository for this instance.
     * @var LpiWebRepository|null
     */
    protected ?LpiWebRepository $webRepository;


    /**
     * Builds the LpiDependenciesHelper instance.
     */
    public function __construct()
    {
        $this->webRepository = null;
    }


    /**
     * Returns an array of lpi dependencies for the given planet.
     *
     * Available options:
     * - recursive: bool=false, whether to get the dependencies recursively.
     * - version: string|null=null, which version to get the dependencies for.
     *      If null, the last version will be used, and the $lastVersion variable will be set.
     *
     *
     *
     * The @page(local universe) is used if it exists.
     *
     *
     * The returned array is an array of planetDotName => version.
     *
     *
     *
     *
     *
     * @param string $planetDir
     * @param array $options
     * @param string|null $lastVersion
     * @return array
     */
    public function getLpiDependenciesByPlanetDir(string $planetDir, array $options = [], string &$lastVersion = null): array
    {
        $ret = [];
        $deps = [];

        $recursive = $options['recursive'] ?? false;
        $version = $options['version'] ?? null;


        if (null !== $version) {
            $lpiDepsFile = LpiDepsFileHelper::getLpiDepsFilePathByPlanetDir($planetDir);
            $tmpDeps = LpiDepsFileHelper::getLpiDepsByLocation($lpiDepsFile, $version);
            foreach ($tmpDeps as $dep) {
                $deps[$dep[0]] = $dep[1];
            }

        } else {
            list($lastVersion, $tmpDeps) = LpiDepsFileHelper::getLatestLpiDependenciesByPlanetDir($planetDir);
            foreach ($tmpDeps as $line) {
                $p = explode(":", $line);
                $version = array_pop($p);
                $deps[implode('.', $p)] = $version;
            }
        }


        if (true === $recursive) {
            foreach ($deps as $planetDotName => $version) {
                $this->collectLpiDependenciesRecursive($planetDotName, $version, $ret);
            }
        } else {
            $ret = $deps;
        }


        ksort($ret);
        return $ret;
    }


    /**
     * Returns an array listing the planets that depend on the given planet, along with the version numbers.
     *
     * It's an array of planetDotName => versionInfo.
     *
     * With:
     * - planetDotName: the planet that "subscribes"/depends on the given planet
     * - versionInfo: an array of versionInfo items, each of which:
     *      - 0: the subscriber's version
     *      - 1: the given planet's version the subscribers depends on
     *
     *
     * The versionInfo items are sorted by ascending subscriber's version.
     *
     *
     * Available options are:
     *
     * - lastOnly: bool=false. If true, we only look at the latest subscriber's version.
     *      The returned array is instead an array of planetDotName => lastVersionInfo,
     *      with lastVersionInfo:
     *          - 0: the last subscriber's version
     *          - 1: the given planet's version the subscribers depends on
     *
     *
     * @param string $planetDotName
     * @param string $uniDir
     * @param array $noLpiFiles
     * @param array $options
     * @return array
     * @throws \Exception
     */
    public function getSubscribersList(string $planetDotName, string $uniDir, array &$noLpiFiles = [], array $options = []): array
    {

        $lastOnly = $options['lastOnly'] ?? false;
        $matches = [];
        $depHelper = new LpiDependenciesHelper();
        $planetDirs = PlanetTool::getPlanetDirs($uniDir);

        foreach ($planetDirs as $planetDir) {
            $pDotName = PlanetTool::getPlanetDotNameByPlanetDir($planetDir);
            $deps = $depHelper->getLpiDepsFileDependenciesByPlanetDir($planetDir);


            if (true === is_array($deps)) {

                if (true === $lastOnly) {
                    reset($deps);

                    $deps = [
                        array_key_last($deps) => array_pop($deps),
                    ];
                }
                foreach ($deps as $version => $items) {
                    foreach ($items as $item) {
                        list($dotName, $versionExpr) = $item;
                        if ($planetDotName === $dotName) {
                            if (true === $lastOnly) {
                                $matches[$pDotName] = [$version, $versionExpr];
                            } else {
                                if (false === array_key_exists($pDotName, $matches)) {
                                    $matches[$pDotName] = [];
                                }
                                $matches[$pDotName][] = [$version, $versionExpr];
                            }
                        }
                    }
                }

            } else {
//                                a("no lpi-deps.byml file for planet $pDotName.");
                /**
                 * Note: we could go with uni style deps here, but for now I didn't need it personally...
                 */
                $noLpiFiles[] = $pDotName;
            }
        }
        return $matches;
    }


    /**
     * Returns all the lpi dependencies for the given planet dir, or false if no lpi-deps.byml file was found.
     * The returned array is an array of version => item.
     * Each item is an array with the following structure:
     *
     * - 0: planetDotName
     * - 1: versionExpr
     *
     *
     *
     * @param string $planetDir
     * @return array|false
     * @throws \Exception
     */
    public function getLpiDepsFileDependenciesByPlanetDir(string $planetDir): array|false
    {
        $ret = [];
        $lpiDepsFile = LpiDepsFileHelper::getLpiDepsFilePathByPlanetDir($planetDir);
        if (false === file_exists($lpiDepsFile)) {
            return false;
        }
        $content = file_get_contents($lpiDepsFile);
        if (false === $content) {
            throw new LpiIncompatibleException("The lpi-deps.byml file was not found at \"$lpiDepsFile\".");
        }
        $deps = BabyYamlUtil::readBabyYamlString($content);
        foreach ($deps as $version => $items) {
            $ret[$version] = [];

            foreach ($items as $item) {
                $p = explode(":", $item);
                $vExpr = array_pop($p);
                $pDotName = implode('.', $p);

                $ret[$version][] = [
                    $pDotName,
                    $vExpr,
                ];
            }
        }
        return $ret;
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Collects the lpi dependencies recursively for the given planet, and stores them in the $deps array.
     *
     * @param string $planetDotName
     * @param string $versionExpr
     * @param array $deps
     * @throws \Exception
     */
    private function collectLpiDependenciesRecursive(string $planetDotName, string $versionExpr, array &$deps)
    {
        if (false === array_key_exists($planetDotName, $deps)) {
            $deps[$planetDotName] = $versionExpr;


            $realVersion = LpiVersionHelper::getRealVersionByVersionExpression($planetDotName, $versionExpr);
            if (null !== ($planetDir = LpiLocalUniverseHelper::getPlanetPath($planetDotName))) {
                $lpiDepsFile = LpiDepsFileHelper::getLpiDepsFilePathByPlanetDir($planetDir);
                $subDeps = LpiDepsFileHelper::getLpiDepsByLocation($lpiDepsFile, $realVersion);
            } else {
                $subDeps = $this->getWebRepository()->getDependencies($planetDotName, $realVersion);
            }
            foreach ($subDeps as $item) {
                self::collectLpiDependenciesRecursive(planetDotName: $item[0], versionExpr: $item[1], deps: $deps);
            }
        }
    }

    /**
     * Returns the webRepository of this instance.
     *
     * @return LpiWebRepository
     */
    private function getWebRepository(): LpiWebRepository
    {
        if (null === $this->webRepository) {
            $this->webRepository = new LpiWebRepository();
        }
        return $this->webRepository;
    }


}