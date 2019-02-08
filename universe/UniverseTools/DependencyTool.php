<?php

namespace UniverseTools;


use BabyYaml\BabyYamlUtil;
use UniverseTools\Exception\UniverseToolsException;


/**
 * The DependencyTool class.
 */
class DependencyTool
{


    /**
     * Parses the dependencies.byml file (at the root of the given $planetDir) if it exists,
     * and return an array of all dependencies found in it.
     *
     * See the [universe dependencies document](https://github.com/lingtalfi/TheScientist/blob/master/universe-dependencies-2019.md) for more information.
     *
     * The array is a list of dependencyArray, each of which being an array with 3 items:
     *
     * - 0: the dependency system name (universe, git, ...).
     * - 1: the dependency item (name, url, ...).
     * - 2: the tag (aka version) used, or the wildcard if the last version available should be used.
     *
     *
     *
     *
     * @param $planetDir
     * @return array
     * @throws UniverseToolsException
     */
    public static function getDependencyList($planetDir)
    {
        if (false === is_dir($planetDir)) {
            throw new UniverseToolsException("No dir found in $planetDir");
        }

        $ret = [];
        $dependencyFile = $planetDir . "/dependencies.byml";
        if (file_exists($dependencyFile)) {
            $conf = BabyYamlUtil::readFile($dependencyFile);

            unset($conf['post_install']);
            foreach ($conf as $system => $arr) {
                if ('universe' === $system) {
                    foreach ($arr as $maintainer => $deps) {
                        foreach ($deps as $planet => $tag) {
                            $ret[] = ["universe.$maintainer", $planet, $tag];
                        }
                    }
                } elseif ('git' === $system) {
                    foreach ($arr as $dependency) {
                        $p = explode(':::', $dependency, 2);
                        if (2 === count($p)) {
                            list($url, $tag) = $p;
                        } else {
                            $url = $dependency;
                            $tag = '*';
                        }
                        $ret[] = ["git", $url, $tag];
                    }
                }
            }
        }
        return $ret;
    }
}