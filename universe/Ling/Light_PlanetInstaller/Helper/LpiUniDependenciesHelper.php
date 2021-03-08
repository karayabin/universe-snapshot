<?php


namespace Ling\Light_PlanetInstaller\Helper;

use Ling\Light_PlanetInstaller\Repository\LpiWebRepository;
use Ling\UniverseTools\DependencyTool;

/**
 * The LpiUniDependenciesHelper class.
 */
class LpiUniDependenciesHelper
{


    /**
     * This property holds the webRepository for this instance.
     * @var LpiWebRepository|null
     */
    protected ?LpiWebRepository $webRepository;


    /**
     * Builds the LpiUniDependenciesHelper instance.
     */
    public function __construct()
    {
        $this->webRepository = null;
    }


    /**
     * Returns an array of uni dependencies for the given planet.
     *
     * Available options:
     * - recursive: bool=false, whether to get the dependencies recursively.
     *
     *
     * The @page(local universe) is used if it exists.
     *
     *
     * The returned array is an array of planet dot names.
     *
     *
     *
     * @param string $planetDir
     * @param array $options
     * @return array
     */
    public function getUniDependenciesByPlanetDir(string $planetDir, array $options = []): array
    {
        $recursive = $options['recursive'] ?? false;

        $deps = DependencyTool::getDependencyList($planetDir, ['dotNames' => true]);
        if (false === $recursive) {
            return $deps;
        }

        $ret = [];
        foreach ($deps as $planetDotName) {
            $this->collectUniDependenciesRecursive($planetDotName, $ret);
            sort($ret);
        }
        return $ret;
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Collects the uni dependencies recursively, and stores them in the $ret array.
     *
     * @param string $planetDotName
     * @param array $ret
     * @throws \Exception
     */
    private function collectUniDependenciesRecursive(string $planetDotName, array &$ret)
    {
        if (false === in_array($planetDotName, $ret)) {
            $ret[] = $planetDotName;
            if (null !== ($planetDir = LpiLocalUniverseHelper::getPlanetPath($planetDotName))) {
                $deps = DependencyTool::getDependencyList($planetDir, ['dotNames' => true]);
            } else {
                $deps = $this->getWebRepository()->getUniDependencies($planetDotName, "whatever");
            }
            foreach ($deps as $planetDotName) {
                self::collectUniDependenciesRecursive($planetDotName, $ret);
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