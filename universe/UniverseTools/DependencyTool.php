<?php

namespace UniverseTools;


use BabyYaml\BabyYamlUtil;
use DirScanner\YorgDirScannerTool;
use TokenFun\TokenFinder\Tool\TokenFinderTool;
use UniverseTools\Exception\UniverseToolsException;


/**
 * The DependencyTool class.
 * This class helps resolving dependencies related problem.
 *
 * See more about universe dependencies in the @page(universe dependencies document).
 *
 *
 */
class DependencyTool
{

    /**
     * A method to help creating the **dependencies.byml** file.
     *
     *
     * Parses the planet's [BSR-0](https://github.com/lingtalfi/BumbleBee/blob/master/Autoload/convention.bsr0.eng.md) classes
     * and returns a list of dependencies to put in the dependencies.byml * at the root of your planet.
     *
     * For each dependency, this method will create a new line formatted like this:
     *
     * - dependencyName: *
     *
     * Note: this is the notation for the universe @keyword(dependency system).
     * Other dependency systems are not supported yet.
     *
     *
     * Note2: This method only works if there is an effective bsr-0 autoloader in place.
     * Note3: This method works by parsing the use statements in your classes, so make sure to clean your import use statements
     *      before running this method.
     *
     *
     *
     * @param string $planetDir . The directory path of the planet to scan.
     * @param string $br = <br>. The string to use as the carriage return.
     *
     *
     * @return string
     * @throws UniverseToolsException
     */
    public static function parseDumpDependencies(string $planetDir, $br = '<br>')
    {
        if (false === is_dir($planetDir)) {
            throw new UniverseToolsException("Dir not found: $planetDir");
        }

        $allUseStatements = [];

        $planetName = basename($planetDir);
        $files = YorgDirScannerTool::getFilesWithExtension($planetDir, 'php', false, true, true);

        foreach ($files as $file) {
            $classPath = $planetName . "/" . substr($file, 0, -4);
            $className = str_replace('/', '\\', $classPath);
            $classFile = $planetDir . "/" . $file;

            try {
                $o = new \ReflectionClass($className);
                $tokens = token_get_all(file_get_contents($classFile));
                $useStatements = TokenFinderTool::getUseDependencies($tokens);

                // filtering out internal use statements (statements referencing a class inside the planet being parsed)
                $useStatements = array_filter($useStatements, function ($v) use ($planetName) {
                    if (0 === strpos($v, $planetName . "\\")) {
                        return false;
                    }
                    return true;
                });
                $allUseStatements = array_merge($allUseStatements, $useStatements);

            } catch (\ReflectionException $e) {
                // not a bsr-0 class
                continue;
            }

        }


        // reducing use statements to planet names
        $lines = [];
        foreach ($allUseStatements as $statement) {
            $lines[] = explode('\\', $statement)[0] . ': *';
        }
        $lines = array_unique($lines);

        return implode($br, $lines);
    }


    /**
     * Parses the dependencies.byml file (at the root of the given $planetDir) if it exists,
     * and return an array of all dependencies found in it.
     *
     * See the @page(universe dependencies document) for more information.
     *
     * The array is a list of dependencyItem, each of which being an array with 3 items:
     *
     * - 0: the galaxy identifier/ download technique
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

            $dependencies = $conf['dependencies'] ?? [];

            foreach ($dependencies as $downloadTechnique => $deps) {
                if ('ling' === $downloadTechnique) {
                    foreach ($deps as $planet => $tag) {
                        $ret[] = [$downloadTechnique, $planet, $tag];
                    }
                } elseif ('git' === $downloadTechnique) {
                    foreach ($deps as $dependency) {
                        $p = explode(':', $dependency);
                        $tag = array_pop($p);
                        $url = implode(":", $p);
                        $ret[] = [$downloadTechnique, $url, $tag];
                    }
                }
            }
        }
        return $ret;
    }


    /**
     * Returns the home url (i.e. the url of the main documentation) for the given $dependencyItem.
     * $dependencyItems are returned by the getDependencyList method of this class.
     *
     *
     * Design note: this method encapsulates the logic of getting the url of the documentation
     * for EVERY download technique handled by the universe.
     *
     *
     *
     * Example:
     * ------------
     * The following code:
     *
     * ```php
     * $item = [
     *      "ling",
     *      "Bat",
     *      "*",
     * ];
     * az(DependencyTool::getDependencyHomeUrl($item)); // string(71) "https://github.com/karayabin/universe-snapshot/tree/master/universe/Bat"
     * ```
     *
     *
     * Will output:
     *
     * ```html
     * string(71) "https://github.com/karayabin/universe-snapshot/tree/master/universe/Bat"
     * ```
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
        $downloadTechnique = $dependencyItem[0];
        $target = $dependencyItem[1];

        switch ($downloadTechnique) {
            case "ling":
                return "https://github.com/karayabin/universe-snapshot/tree/master/universe/$target";
                break;
            case "git":
                return $target;
                break;
            default:
                throw new UniverseToolsException("Unknown download technique/galaxy identifier: $downloadTechnique");
                break;
        }
    }

}