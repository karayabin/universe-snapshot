<?php

namespace Ling\UniverseTools;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\FileSystemTool;
use Ling\DirScanner\YorgDirScannerTool;
use Ling\TokenFun\TokenFinder\Tool\TokenFinderTool;
use Ling\UniverseTools\Exception\UniverseToolsException;


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
     * A method to help creating the @concept(dependencies.byml file).
     *
     *
     * Parses the use statements of all the @page(BSR-1) classes
     * found in the planet, and displays the content of a basic **dependencies.byml** file out of it.
     *
     * Note: This method only works if there is an effective bsr-1 autoloader in place.
     * Note2: This method works by parsing the use statements in your classes, so make sure to clean your import use statements
     *      before running this method.
     *
     *
     *
     * @param string $planetDir . The directory path of the planet to scan.
     * @param array $conf
     * A reference to the configuration array created, which has the following structure:
     * - dependencies: array of galaxyName => planets (list of planet names)
     * - post_install: the given $postInstall array
     *
     * @param array $postInstall
     *
     *
     * @return string
     * @throws UniverseToolsException
     */
    public static function parseDumpDependencies(string $planetDir, array &$conf = [], array $postInstall = [])
    {
        if (false === is_dir($planetDir)) {
            throw new UniverseToolsException("Dir not found: $planetDir");
        }

        $allUseStatements = [];
        $knownGalaxies = GalaxyTool::getKnownGalaxies();


        $pInfo = PlanetTool::getGalaxyNamePlanetNameByDir($planetDir);
        if (false !== $pInfo) {

            list($galaxy, $planetName) = $pInfo;
            $files = YorgDirScannerTool::getFilesWithExtension($planetDir, 'php', false, true, true);

            foreach ($files as $file) {

                $content = file_get_contents($planetDir . "/" . $file);


                /**
                 * Filtering scripts starting with:
                 *
                 * ```txt
                 * #!/usr/bin/env php
                 * <?php
                 * ```
                 *
                 */
                if (0 === strpos($content, '<?')) {

                    $classPath = $galaxy . "/" . $planetName . "/" . substr($file, 0, -4);
                    $className = str_replace('/', '\\', $classPath);
                    $classFile = $planetDir . "/" . $file;


                    try {


                        $tokens = token_get_all(file_get_contents($classFile));
                        $classNames = TokenFinderTool::getClassNames($tokens, true, [
                            "includeInterfaces" => true,
                        ]);

                        if ($classNames) { // ensure that the file contains a class


                            $useStatements = TokenFinderTool::getUseDependencies($tokens);


                            $o = new \ReflectionClass($className);

                            // filtering out internal use statements (statements referencing a class inside the planet being parsed)
                            $useStatements = array_filter($useStatements, function ($v) use ($planetName, $galaxy) {
                                if (0 === strpos($v, $galaxy . "\\" . $planetName . "\\")) {
                                    return false;
                                }
                                return true;
                            });
                            $allUseStatements = array_merge($allUseStatements, $useStatements);
                        }

                    } catch (\ReflectionException $e) {
                        // not a bsr-0 class
                        continue;
                    }

                }

            }


            //--------------------------------------------
            // UNIVERSE ASSET DEPENDENCIES TRICK
            //--------------------------------------------
            $universeAssetDeps = self::getUniverseAssetDependencies($planetDir);
            if($universeAssetDeps){
                $allUseStatements = array_merge($allUseStatements, $universeAssetDeps);
            }


            // reducing use statements to planet names
            $galaxies = [];
            foreach ($allUseStatements as $statement) {
                $parts = explode('\\', $statement);

                if (1 === count($parts)) { // assuming it's a trait
                    continue;
                }


                $galaxy = $parts[0];
                $planet = $parts[1];

                if (in_array($galaxy, $knownGalaxies, true)) {
                    if (false === array_key_exists($galaxy, $galaxies)) {
                        $galaxies[$galaxy] = [];
                    }
                    if (false === in_array($planet, $galaxies[$galaxy], true)) {
                        $galaxies[$galaxy][] = $planet;
                    }
                }
            }
            $conf = [
                "dependencies" => $galaxies,
                "post_install" => $postInstall,
            ];
            return BabyYamlUtil::getBabyYamlString($conf) . PHP_EOL;


        } else {
            throw new UniverseToolsException("Invalid planet dir. A valid planet dir should be of the form /my/universe/\$galaxyName/\$shortPlanetName.");
        }
    }


    /**
     * Returns the @page(universe asset dependencies) for a given planet directory.
     *
     * @param string $planetDir
     * @return array
     */
    public static function getUniverseAssetDependencies(string $planetDir): array
    {
        $ret = [];
        $assetDir = $planetDir . "/UniverseAssetDependencies";
        if (is_dir($assetDir)) {
            $galaxies = YorgDirScannerTool::getDirs($assetDir, false, true);
            foreach ($galaxies as $galaxy) {
                $planets = YorgDirScannerTool::getDirs($assetDir . "/$galaxy", false, true);
                foreach ($planets as $planet) {
                    $ret[] = $galaxy . "\\" . $planet;
                }
            }
        }
        return $ret;
    }


    /**
     * Returns an array of dependency items for the given $planetDir.
     *
     *
     * Note: it will parse the dependencies.byml file at the root of the planet dir.
     * If the planet dir does not exist, an UniverseToolsException will be thrown.
     * If the dependencies.byml file does not exist, an array will be returned.
     *
     *
     * The returned array has the following structure:
     *
     * - dependencies:
     *      0: dependency system / galaxy identifier
     *      1: the dependency identifier (name or url, ...)
     * - post_install: array of post install directives
     *
     *
     *
     *
     *
     *
     *
     * @param string $planetDir
     * @return array
     * @throws UniverseToolsException
     */
    public static function getDependencyItem(string $planetDir)
    {
        if (false === is_dir($planetDir)) {
            throw new UniverseToolsException("No dir found in $planetDir");
        }

        $ret = [
            "dependencies" => [],
            "post_install" => [],
        ];
        $dependencyFile = $planetDir . "/dependencies.byml";
        if (file_exists($dependencyFile)) {
            $conf = BabyYamlUtil::readFile($dependencyFile);


            $postInstall = $conf['post_install'] ?? [];
            $dependencies = $conf['dependencies'] ?? [];
            $ret['dependencies'] = $dependencies;
            $ret['post_install'] = $postInstall;

        }
        return $ret;
    }


    /**
     * Parses the dependencies.byml file (at the root of the given $planetDir) if it exists,
     * and return an array of all dependencies found in it.
     *
     * See the @page(universe dependencies document) for more information.
     *
     * The array is a list of dependencyItem, each of which being an array with 2 items:
     *
     * - 0: the galaxy identifier/ dependency system
     * - 1: the dependency identifier (name or url, ...), aka packageImportName.
     *
     *
     *
     *
     * @param string $planetDir
     * @return array
     * @throws UniverseToolsException
     */
    public static function getDependencyList(string $planetDir)
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

            foreach ($dependencies as $dependencySystem => $deps) {
                foreach ($deps as $dependency) {
                    $ret[] = [$dependencySystem, $dependency];
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
     * ];
     * az(DependencyTool::getDependencyHomeUrl($item)); // string(71) "https://github.com/karayabin/universe-snapshot/tree/master/universe/Ling/Bat"
     * ```
     *
     *
     * Will output:
     *
     * ```html
     * string(71) "https://github.com/karayabin/universe-snapshot/tree/master/universe/Ling/Bat"
     * ```
     *
     *
     *
     * @seeMethod getDependencyList
     *
     * @param array $dependencyItem
     * @return string
     * @throws UniverseToolsException
     * When the dependency system is unknown to this class.
     */
    public static function getDependencyHomeUrl(array $dependencyItem)
    {
        $dependencySystem = $dependencyItem[0];
        $target = $dependencyItem[1];

        switch ($dependencySystem) {
            case "Ling":
                return "https://github.com/lingtalfi/$target";
                break;
            case "git":
                return $target;
                break;
            default:
                throw new UniverseToolsException("Unknown download technique/galaxy identifier: $dependencySystem");
                break;
        }
    }


    /**
     * Writes the dependencies.byml file at the root of the given $planetDir.
     *
     * If the postInstall array is passed, it will be merged with any existing post install directives that might
     * already be there (which might happen if the dependency file already exists).
     *
     * @param string $planetDir
     * @param array $postInstall
     * @return bool
     * @throws UniverseToolsException
     */
    public static function writeDependencies(string $planetDir, array $postInstall = [])
    {
        $dependencyFile = $planetDir . "/dependencies.byml";
        $_postInstall = [];
        $conf = [];
        if (file_exists($dependencyFile)) {
            $conf = BabyYamlUtil::readFile($dependencyFile);
            $_postInstall = $conf['post_install'] ?? [];
        }

        $_postInstall = array_merge($_postInstall, $postInstall);

        $dependenciesString = self::parseDumpDependencies($planetDir, $conf, $_postInstall);
        return FileSystemTool::mkfile($dependencyFile, $dependenciesString);
    }
}