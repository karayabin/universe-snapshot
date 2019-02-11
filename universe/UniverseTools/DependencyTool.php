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
     * The array is a list of dependencyItem, each of which being an array with 3 items:
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
                }
                elseif ('git' === $system) {
                    foreach ($arr as $dependency) {
                        $p = explode(':::', $dependency, 2);
                        if (2 === count($p)) {
                            list($url, $tag) = $p;
                        }
                        else {
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


    /**
     * Returns the home url (the url of the documentation) for the given $dependencyItem.
     * $dependencyItems are returned by the getDependencyList method of this class.
     *
     *
     * Design note: this method encapsulates the logic of getting the url of the documentation
     * for EVERY dependency system handled by the universe.
     * In the future, this method might execute some internet lookup to achieve its goal,
     * but for now, everything is hardcoded (because all the dependency systems are well known in advance...).
     *
     *
     *
     *
     *
     *
     * @seeMethod getDependencyList
     *
     * @param array $dependencyItem
     * @return string
     * @throws UniverseToolsException, When the dependency system is unknown to this class.
     */
    public static function getDependencyHomeUrl(array $dependencyItem)
    {
        $dependencySystem = $dependencyItem[0];
        $target = $dependencyItem[1];

        switch ($dependencySystem) {
            case "universe.ling":
                return "https://github.com/karayabin/universe-snapshot/tree/master/universe/$target";
                break;
            case "git":
                return $target;
                break;
            default:
                throw new UniverseToolsException("Unknown dependency system: $dependencySystem");
                break;
        }
    }

}