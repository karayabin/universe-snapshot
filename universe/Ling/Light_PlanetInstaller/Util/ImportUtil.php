<?php


namespace Ling\Light_PlanetInstaller\Util;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\FileSystemTool;
use Ling\CliTools\Helper\QuestionHelper;
use Ling\CliTools\Output\Output;
use Ling\CliTools\Output\OutputInterface;
use Ling\CliTools\Util\LoaderUtil;
use Ling\DirScanner\YorgDirScannerTool;
use Ling\Light_PlanetInstaller\Exception\LightPlanetInstallerException;
use Ling\Light_PlanetInstaller\Exception\LpiIncompatibleException;
use Ling\Light_PlanetInstaller\Helper\LpiHelper;
use Ling\Light_PlanetInstaller\Helper\LpiImporterHelper;
use Ling\Light_PlanetInstaller\Helper\LpiVersionHelper;
use Ling\Light_PlanetInstaller\Helper\LpiWebHelper;
use Ling\Uni2\Helper\DependencyMasterHelper;
use Ling\UniverseTools\BangTool;
use Ling\UniverseTools\LocalUniverseTool;
use Ling\UniverseTools\MetaInfoTool;
use Ling\UniverseTools\PlanetTool;

/**
 * The ImportUtil class.
 */
class ImportUtil
{

    /**
     * This property holds the warnings for this instance.
     * @var array
     */
    private array $warnings;

    /**
     * This property holds the conflicts for this instance.
     * It's an array of items, each of which:
     * - 0: planetDotName of the conflictual planet
     * - 1: version of the conflictual planet
     * - 2: the parent chain of the planet which led to this conflict, it's an array of items with the format:
     *          - $planetDotName:$version
     *      The first item is the oldest ancestor, and the last item is the direct parent of the conflictual planet.
     *
     *
     *
     * @var array
     */
    private array $conflicts;


    /**
     * This property holds the defaultOptions for this instance.
     * @var array
     */
    private array $defaultOptions;

    /**
     * This property holds the output for this instance.
     * @var OutputInterface|null
     */
    private ?OutputInterface $output;


    /**
     * This property holds the userCrmChoice for this instance.
     * @var string|null
     */
    private ?string $userCrmChoice;


    /**
     * Whether to use debug mode.
     * @var bool
     */
    private bool $useDebug;

    /**
     * The bashtml format to use to prefix a debug message.
     * @var string
     */
    private string $debugFmt;


    /**
     * Builds the ImportUtil instance.
     */
    public function __construct()
    {
        $this->defaultOptions = [
            "alt" => 'local',
            "lo" => 'aw',
            "crm" => 'latest',
            "altHasLast" => true,
            "deps" => true,
            "sym" => true,
        ];
        $this->output = null;
        $this->useDebug = false;
        $this->debugFmt = "yellow:bold";
    }

    /**
     * Sets the output.
     *
     * @param OutputInterface $output
     */
    public function setOutput(OutputInterface $output)
    {
        $this->output = $output;
    }

    /**
     * Sets the debug.
     *
     * @param bool $debug
     */
    public function setDebug(bool $debug)
    {
        $this->useDebug = $debug;
    }


    /**
     * Tries to import the given planet into the current application, and returns the "session dir" path, where information data is stored.
     * Returns false if an exception occurred (the exception is displayed to the output).
     *
     *
     * See the @page(Light_PlanetInstaller conception notes) for more details.
     *
     *
     * By default this method will import the planet in its latest version, and all the dependencies are also imported, recursively, in their latest versions.
     *
     * By default, it also @page(bangs) the application directory.
     *
     *
     * If the given planet already exists in the current app, the method will ask you how to resolve the conflict.
     * Alternately, you can set the crm option of this method to set your choice in advance.
     *
     * Any warning issued during the execution of this method will be available via the getWarnings method.
     *
     *
     * Available options are:
     *
     * - version: string=null, specifies the versionNumber to use for the main planet. If specified, this tool will try to import
     *      the dependencies (if any) with the specific version number they had when the main planet was in the version $versionNumber.
     *
     * - crm: string=latest, the (application) conflict resolution mode. If specified, this will set your answer for any potential application conflict that might occur when
     *      the planet we try to import already exists in the target app.
     *
     *      This option was designed so that you can execute this command without you having to wait for a potential conflict. The possible values are:
     *
     *      - ask: ask the user what to do
     *      - abort: abort
     *      - keep: keep the planet already existing in the app
     *      - replace: remove (irreversible) the planet already existing in the app and import the new one
     *      - latest: keep the planet with the latest version (this potentially can irreversibly remove the planet from your app if the challenger planet has a higher version)
     *      - earliest: keep the planet with the lowest version number  (this potentially can irreversibly remove the planet from your app if the challenger planet has a earlier version)
     *
     *
     * - deps: bool=true, whether to include dependencies. If false, only the given planet will be listed in the returned map.
     * - alt: string=local, the path to one alternate universe to search the planets from.
     *      The special value "local" means that the local universe will be used.
     *      See more about the local universe at: https://github.com/lingtalfi/UniverseTools/blob/master/doc/pages/conception-notes.md#local-universe.
     *      The rationale behind this is that searching an alternate universe is faster than searching the web (which requires http requests).
     *      Generally, the alternate universe is the directory where you create your planets, it's your developing environment.
     *      You might/might not have one.
     *
     * - altHasLast: bool=true. Whether to consider that the alternate universe has always the latest versions of the planets.
     * - lo: string=aw, the location order. When searching for planets, this tells the method in which order the different locations are searched.
     *     The possible locations are:
     *     - alternate universe
     *     - web
     *
     *     The possible values for this option are:
     *     - aw: search the alternate universe first, then the web
     *     - wa: search web first, then the alternate universe
     *
     *
     * - sym: bool=true. If a planet is found in an alternate universe, do we use a symlink to the planet in the alternate universe, or
     *      do we make a regular copy of the planet dir instead.
     * - app: string=null. The target application directory where to import the planet. If null, defaults to the current working directory.
     * - bang: bool=true. Whether to bang the application directory.
     * - force: bool=false. If true, the **theoretical import map** is used directly as the **concrete import map**, thus avoiding application conflicts.
     *      See the @page(Light_PlanetInstaller conception notes) for more details.
     *      Basically, this means that the **theoretical import map** is imported directly and as is in the application, no question asked.
     *
     * - out: string=null. If set, the return of this method will also be written to the given file location, in babyYaml format.
     * - tim: string|array=null. the theoretical import map to use.
     *      It can be in array form, or a path to the babyYaml file containing the theoretical import map.
     *      It's an array of planetDotName => version.
     *      Note: if the tim is set, the planetDotName (first argument of this method) is ignored.
     * - test: bool=false. if true, will stop after creating the concrete import map. The build dir will not be created, and the planets won't be imported
     *      into the target app. This mode can be useful to consult the concrete import map, the theoretical import map, and/or the conflicts.
     * - testBuild: bool=false. if true, will import planets into the build dir and stop after that: and the planets won't be imported into the target app.
     *      This mode can be useful to consult the concrete import map, the theoretical import map, and/or the conflicts, and examine the content of the build dir.
     * - showEndTip: bool=true. Whether to display an end tip at the end of the process.
     *
     *
     *
     *
     * Implementation notes:
     *
     * The technique we use is to first create a dependencyTree, which is basically a list of planet/versionNumbers to import, in the order
     * they should be imported (parent first, children last).
     * Note that the order of importing planets is actually not really important, but this method is re-used by the install procedure, in which
     * the order of installation matters.
     *
     *
     *
     *
     *
     *
     * @param string $planetDotName
     * @param array $options
     * @return string|false
     */
    public function import(string $planetDotName, array $options = []): string|false
    {

        $this->init();
        $version = $options['version'] ?? null;
        $bang = $options['bang'] ?? true;
        $appDir = $options['app'] ?? null;
        $out = $options['out'] ?? null;
        $tim = $options['tim'] ?? null;
        $test = $options['test'] ?? false;
        $testBuildDir = $options['testBuildDir'] ?? false;
        $force = $options['force'] ?? false;
        $showEndTip = $options['showEndTip'] ?? true;


        if (null === $appDir) {
            $appDir = getcwd();
        }


        $sessionDir = FileSystemTool::getUniqueTimeStringedEntry(LpiHelper::getSessionDirsPath());


        $e = null;

        try {


            $theoreticalMap = [];


            $this->write("Creating session dir at: <b:red>$sessionDir</b:red>" . PHP_EOL);
            FileSystemTool::mkdir($sessionDir);

            if (true === $bang) {
                $this->debug("Banging app: <red>$appDir</red>." . PHP_EOL);
                BangTool::bangApp($appDir);
            }


            if (null !== $tim) {

                $this->debug("Reading theoretical map from user input." . PHP_EOL);
                if (true === is_array($tim)) {
                    $theoreticalMap = $tim;
                } elseif (true === is_string($tim)) {
                    if (false === is_file($tim)) {
                        $this->write("<error>The provided <b>theoretical import map</b> is not a valid file (<b>$tim</b>). Aborting.</error>." . PHP_EOL);
                        goto end;
                    }
                    $theoreticalMap = BabyYamlUtil::readFile($tim);
                } else {
                    $this->write("<error>Invalid tim provided by the user. Aborting.</error>" . PHP_EOL);
                    goto end;
                }
            } else {
                // get the list of planets to install
                if (true === $this->useDebug) {
                    $humanVersion = $version;
                    if (null === $humanVersion) {
                        $humanVersion = "(last version)";
                    }
                    $this->debug("Creating the <b>theoretical import map</b> for <red:bold>$planetDotName:$humanVersion</red:bold>:" . PHP_EOL);
                }
                $theoreticalMap = $this->getTheoreticalImportMap($planetDotName, $version, $options);
            }

            if (true === $this->useDebug) {
                if ($theoreticalMap) {

                    $s = '';
                    foreach ($theoreticalMap as $_planetDotName => $_version) {
                        $s .= "<blue>" . $_planetDotName . ":$_version</blue>" . PHP_EOL;
                    }
                    $this->debug("The theoretical import map is the following: " . PHP_EOL . $s . PHP_EOL);
                } else {

                    $this->debug("The theoretical import map was empty.");
                }
            }


            //--------------------------------------------
            // THEORETICAL IMPORT MAP - BACKUP
            //--------------------------------------------
            $timBackupDir = $sessionDir . "/tim.byml";
            BabyYamlUtil::writeFile($theoreticalMap, $timBackupDir);


            //--------------------------------------------
            // CONCRETE IMPORT MAP
            //--------------------------------------------
            if (true === $force) {
                $this->debug("Preparing the <b>concrete import map</b> (force option was used)." . PHP_EOL);
                $concreteMap = $this->translateTheoreticalToConcrete($theoreticalMap);
            } else {

                $this->debug("Preparing the <b>concrete import map</b>." . PHP_EOL);
                $concreteMap = $this->getConcreteImportMap($appDir, $theoreticalMap, $options);
            }


            //--------------------------------------------
            // SHOWING THE CONCRETE IMPORT MAP
            //--------------------------------------------
            if ($concreteMap) {
                $this->write("The <b>concrete import map</b> looks like this: " . PHP_EOL);
                $s = '';
                foreach ($concreteMap as $_planetDotName => $_item) {
                    list($_wishVersion, $_appVersion) = $_item;
                    if (null === $_appVersion) {
                        if (false === $force) {
                            $precision = "planet doesn't exist in the app yet (or force option was used)";
                        } else {
                            $precision = "force option";
                        }
                    } else {
                        $precision = "<- $_appVersion";
                    }
                    $s .= "<green:bold>" . $_planetDotName . ":" . $_wishVersion . "</green:bold> ($precision)" . PHP_EOL;
                }
                $this->write($s);
                $this->write(PHP_EOL);
            }


            $strippedConcreteMap = $this->stripConcreteImportMap($concreteMap);


            //--------------------------------------------
            // CONCRETE IMPORT MAP - BACKUP
            //--------------------------------------------
            $cimFile = $sessionDir . "/cim.byml";
            /**
             * Note that I write the stripped version of the concrete import map to a file, because it could be directly use by the user (i.e. copy/pasted in a file).
             * However, note that I didn't write the regular version of the concrete import map, which contains application conflict information.
             * So if one day you found yourself needing this information, just write the concrete import map to a file, but for now I don't think it will be needed (and I'm tired).
             */
            BabyYamlUtil::writeFile($strippedConcreteMap, $cimFile);


            if (true === empty($strippedConcreteMap)) {
                $this->write("The <b>concrete import map</b> is empty, nothing do to." . PHP_EOL);
                goto end;
            }

            if (true === $test) {
                goto end;
            }

            //--------------------------------------------
            // CREATING THE BUILD DIR AND IMPORTING PLANETS
            //--------------------------------------------
            $buildDir = $sessionDir . "/build_dir";
            FileSystemTool::remove($buildDir); // make sure it's empty
            $this->write(PHP_EOL . "Preparing the <b>build dir</b> at: <blue:bold>$buildDir</blue:bold>." . PHP_EOL);


            $useUniStyle = false;
            if (null === $version) {
                $useUniStyle = true;
            }
            $options['useUniStyle'] = $useUniStyle;
            $res = $this->importPlanetsToDir($strippedConcreteMap, $buildDir, $options);


            if (false === $res) {
                goto end;
            }


            if (true === $testBuildDir) {
                goto end;
            }


            //--------------------------------------------
            // MOVING BUILD DIR TO TARGET APP DIR (REPLACING PLANETS)
            //--------------------------------------------
            if (true === $this->useDebug) {
                $this->write(PHP_EOL);
            }
            $this->write("Moving <b>build dir</b> to <b>target app</b> ( <red>$buildDir</red> -> <blue>$appDir</blue> )." . PHP_EOL);
            $this->moveBuildDirToTargetApp($buildDir, $appDir);


            if (true === $this->useDebug) {
                $this->write(PHP_EOL);
            }


            if (null !== $out) {
                $this->debug("Writing output (<b>theoretical import map</b>) to: <red>$out</red>." . PHP_EOL);
                BabyYamlUtil::writeFile($theoreticalMap, $out);
            }


            //--------------------------------------------
            // SUCCESS MESSAGE
            //--------------------------------------------
            $this->write(PHP_EOL);
            $this->write("<green:bold>Planet <blue>$planetDotName</blue> was successfully imported</green:bold>." . PHP_EOL);


            $nbWarnings = count($this->warnings);
            $this->write("<b>$nbWarnings</b> warning(s) found." . PHP_EOL);
            foreach ($this->warnings as $warning) {
                $this->write("<warning>$warning</warning>" . PHP_EOL);
            }
        } catch (\Exception $e) {
            //
        }

        //--------------------------------------------
        // END ROUTINE
        //--------------------------------------------
        end:


        if (null === $e) {

            //--------------------------------------------
            // WRITING CONFLICTS
            //--------------------------------------------
            $nbConflicts = count($this->conflicts);
            $cFile = $sessionDir . "/conflicts.byml";
            if ($nbConflicts > 0) {
                $this->write("<b>$nbConflicts</b> conflict(s) found." . PHP_EOL);


            } else {
                $this->write("<b>0</b> conflicts found." . PHP_EOL);
            }
            BabyYamlUtil::writeFile($this->conflicts, $cFile);


            //--------------------------------------------
            // DISPLAY HELPFUL COMMANDS
            //--------------------------------------------
            if (true === $showEndTip) {
                $this->write(PHP_EOL);
                $this->write("The following commands are available:" . PHP_EOL);
                $this->write("<green>- <b>light debug</b></green>: inspect the current session dir (info about theoretical import map, concrete import map, conflicts, build dir)" . PHP_EOL);
                $this->write("<green>- <b>light clean</b></green>: do this from time to time, to clean the session dirs." . PHP_EOL);
            }
        } else {

            //--------------------------------------------
            // DISPLAY EXCEPTION MESSAGE
            //--------------------------------------------
            $this->write(PHP_EOL . "<red:bold>An exception occurred!</red:bold>" . PHP_EOL);
            $this->write("<error>Consider removing the session dir manually: <b>$sessionDir</b></error>" . PHP_EOL . PHP_EOL);
            $this->write("<red:bold>The exception message was the following:</red:bold>" . PHP_EOL);
            $this->write("<b>- Message: </b><error>" . $e->getMessage() . "</error>" . PHP_EOL);
            $this->write("<b>- File: </b>" . $e->getFile() . PHP_EOL);
            $this->write("<b>- Line: </b>" . $e->getLine() . PHP_EOL);
            $this->write("<b>- Trace: </b>" . PHP_EOL . "<error>" . $e->getTraceAsString() . "</error>" . PHP_EOL);
            return false;
        }


        return $sessionDir;

    }


    /**
     * Moves the build dir to the app dir.
     * Note: this method is destructive, it will replace any planet found in the app dir with the one from the build dir without warning.
     *
     *
     * @param string $buildDir
     * @param string $appDir
     * @throws \Exception
     */
    public function moveBuildDirToTargetApp(string $buildDir, string $appDir)
    {

        FileSystemTool::mkdir($buildDir);

        $uniDir = $buildDir . "/universe";

        if (true === is_dir($uniDir)) {


            $galaxyDirs = YorgDirScannerTool::getDirs($uniDir);


            // counting planets for the loader
            $nbPlanets = 0;
            foreach ($galaxyDirs as $galaxyDir) {
                $planetDirs = YorgDirScannerTool::getDirs($galaxyDir);
                $nbPlanets += count($planetDirs);
            }


            $loader = $this->getLoader($nbPlanets, $this->output);


            foreach ($galaxyDirs as $galaxyDir) {
                $galaxy = basename($galaxyDir);
                $planetDirs = YorgDirScannerTool::getDirs($galaxyDir);
                foreach ($planetDirs as $planetDir) {
                    $planet = basename($planetDir);

                    $appPlanetDir = $appDir . "/universe/$galaxy/$planet";

                    if (true === $this->useDebug) {
                        if (true === is_dir($appPlanetDir)) {
                            $this->debug("Removing <red>$appPlanetDir</red>" . PHP_EOL);
                        }
                    }
                    FileSystemTool::remove($appPlanetDir);
                    if (true === is_link($planetDir)) {
                        $linkSrc = readlink($planetDir);
                        if (false === $linkSrc) {
                            $this->error("moveBuildDirToTargetApp: cannot read the source of the symlink for $planetDir. Aborting.");
                        }
                        $this->debug("Creating symlink: <red>$appPlanetDir</red> ( -> <b>$linkSrc</b>)" . PHP_EOL);
                        FileSystemTool::mkdir(dirname($appPlanetDir));
                        symlink($linkSrc, $appPlanetDir);
                    } else {
                        $this->debug("Copying dir to: <red>$appPlanetDir</red> ( <- <b>$planetDir</b>)" . PHP_EOL);
                        FileSystemTool::copyDir($planetDir, $appPlanetDir);
                    }

                    if (false === $this->useDebug) {
                        $loader->incrementBy();
                    }
                }
            }

            if (false === $this->useDebug) {
                $this->write(PHP_EOL); // go to the next line after the loader
            }
        } else {
            $this->write("The build dir is empty, nothing to move." . PHP_EOL);
        }
    }



    /**
     * Returns the warnings of this instance.
     *
     * @return array
     */
    public function getWarnings(): array
    {
        return $this->warnings;
    }

    /**
     * Returns the conflicts of this instance.
     *
     * @return array
     */
    public function getConflicts(): array
    {
        return $this->conflicts;
    }





    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Initializes the class before a public method is executed.
     */
    private function init()
    {
        $this->warnings = [];
        $this->conflicts = [];
        $this->userCrmChoice = null;
    }


    /**
     * Returns a **concrete import map**, assuming no **application conflicts** at all.
     * See the @page(Light_PlanetInstaller conception notes) for more details.
     *
     * @param array $theoreticalImportMap
     * @return array
     */
    private function translateTheoreticalToConcrete(array $theoreticalImportMap): array
    {
        $ret = [];
        foreach ($theoreticalImportMap as $planetDotName => $version) {
            $ret[$planetDotName] = [
                $version,
                null,
            ];
        }
        return $ret;
    }

    /**
     * Returns a stripped down version of the given concrete import map.
     *
     * It returns an array of planetDotName => version (to install).
     *
     * See the @page(Light_PlanetInstaller conception notes) for more details.
     *
     * @param array $concreteImportMap
     * @return array
     */
    private function stripConcreteImportMap(array $concreteImportMap): array
    {
        $ret = [];
        foreach ($concreteImportMap as $planetDotName => $item) {
            $ret[$planetDotName] = $item[0];
        }
        return $ret;
    }




    /**
     * Imports the given planets to the given dir, and returns whether the program should continue.
     *
     *
     * The given planets argument is an array of planetDotName => version (to install/import).
     *
     *
     * Note: the program might ask the user to stop the program in case of a planet not found.
     *
     * Available options are (when no explanations, same as import method from this class):
     *
     * - alt
     * - lo
     * - altHasLast
     * - useUniStyle: bool=false. Whether to use uni style import (i.e. always use latest versions)
     *
     * @param array $planets
     * @param string $dstDir
     * @param array $options
     * @throws \Exception
     */
    private function importPlanetsToDir(array $planets, string $dstDir, array $options = []): bool
    {

        $alt = $options['alt'] ?? $this->defaultOptions['alt'];
        $altHasLast = $options['altHasLast'] ?? $this->defaultOptions['altHasLast'];
        $locationOrder = $options['lo'] ?? $this->defaultOptions['lo'];
        $useUniStyle = $options['useUniStyle'] ?? false;
        $sym = $options['sym'] ?? $this->defaultOptions['sym'];


        if ($planets) {

            $nbPlanets = count($planets);
            $loader = $this->getLoader($nbPlanets, $this->output);


            foreach ($planets as $planetDotName => $version) {

                list($galaxy, $planet) = PlanetTool::extractPlanetDotName($planetDotName);

                $dstPlanetDir = $dstDir . "/universe/$galaxy/$planet";


                $letters = str_split($locationOrder);

                $found = false;
                foreach ($letters as $letter) {
                    if (true === $found) {
                        break;
                    }


                    switch ($letter) {
                        case "a":
                            $path = $alt;
                            if ('local' === $path) {
                                $path = LocalUniverseTool::getLocalUniversePath();
                            }
                            $planetPath = $path . "/$galaxy/$planet";

                            if (true === is_dir($planetPath)) {
                                if (true === $useUniStyle) {
                                    if (true === $altHasLast) {
                                        $found = true;
                                        $this->smartCopy($planetPath, $dstPlanetDir, $sym);
                                    } else {
                                        $lastVersion = LpiWebHelper::getPlanetCurrentVersion($planetDotName);
                                        $altVersion = MetaInfoTool::getVersion($planetPath);
                                        if (null === $altVersion) {
                                            $this->addWarning("importPlanetsToDir: the planet $galaxy.$planet doesn't have a version in the alt universe ($planetPath). Skipping." . PHP_EOL);
                                        } else {
                                            if ($altVersion === $lastVersion) {
                                                $found = true;
                                                $this->smartCopy($planetPath, $dstPlanetDir, $sym);
                                            }
                                        }
                                    }
                                } else {

                                    $altVersion = MetaInfoTool::getVersion($planetPath);
                                    if (null === $altVersion) {
                                        $this->addWarning("importPlanetsToDir: the planet $galaxy.$planet doesn't have a version in the alt universe ($planetPath). Skipping." . PHP_EOL);
                                    } else {
                                        if ($altVersion === $version) {
                                            $found = true;
                                            $this->smartCopy($planetPath, $dstPlanetDir, $sym);
                                        }
                                    }
                                }
                            }

                            break;
                        case "w":

                            $importer = LpiImporterHelper::getImporterByGalaxy($galaxy);
                            $planetIdentifier = str_replace('.', "/", $planetDotName);

                            if (true === $useUniStyle) {
                                // assuming the current web version is always the latest version
                                $lastVersion = LpiWebHelper::getPlanetCurrentVersion($planetDotName);
                                $warnings = [];
                                $importer->importItem($planetIdentifier, $lastVersion, $dstPlanetDir, $warnings);
                                $found = true;
                                $this->debug("Copy from web to: <red>$dstPlanetDir</red> (last version)" . PHP_EOL);
                                foreach ($warnings as $message) {
                                    $this->addWarning("importPlanetsToDir: warning from the web importer while importing $planetDotName in uniStyle (version=$lastVersion):" . $message . PHP_EOL);
                                }
                            } else {
                                if (true === $importer->hasItem($planetIdentifier, $version)) {
                                    $warnings = [];
                                    $importer->importItem($planetIdentifier, $version, $dstPlanetDir, $warnings);
                                    $found = true;
                                    $this->debug("Copy from web to: <red>$dstPlanetDir</red> ($version)" . PHP_EOL);
                                    foreach ($warnings as $message) {
                                        $this->addWarning("importPlanetsToDir: warning from the web importer while importing $planetDotName in versioned style (version=$version):" . $message . PHP_EOL);
                                    }
                                }
                            }
                            break;
                        default:
                            $this->error("collectVersionedDependencies: Unrecognized letter $letter, planet was $planetDotName.");
                            break;
                    }
                }


                if (false === $this->useDebug) {
                    $loader->incrementBy(1);
                }
            }

            if (false === $this->useDebug) {
                $this->write(PHP_EOL); // go to the next line after the loader
            }

            if (false === $found) {
                $this->write("<error>The planet <b>$planetDotName:$version</b> was not found in the given locations ($locationOrder).</error>" . PHP_EOL);
                $answer = QuestionHelper::ask($this->output, "Press <b>c to continue</b> without this planet, or <b>any other key to abort</b> the program:" . PHP_EOL, function () {

                });

                if ('c' !== $answer) {
                    $this->write("Aborting the program." . PHP_EOL);
                    return false;
                }

            }

        }
        return true;
    }

    /**
     * Copies or creates a symlink of the planet to the given destination.
     *
     * @param string $planetPath
     * @param string $dstPlanetDir
     * @param bool $sym
     */
    private function smartCopy(string $planetPath, string $dstPlanetDir, bool $sym)
    {
        if (true === $sym) {
            FileSystemTool::mkdir(dirname($dstPlanetDir));
            symlink($planetPath, $dstPlanetDir);
            $this->debug("Creating symlink: <red>$dstPlanetDir</red> ( -> <b>$planetPath</b>)" . PHP_EOL);
        } else {
            FileSystemTool::copyDir($planetPath, $dstPlanetDir);
            $this->debug("Copying planet dir to: <red>$dstPlanetDir</red> ( src=<b>$planetPath</b>)" . PHP_EOL);
        }
    }


    /**
     * Returns a prepared loader instance.
     *
     * @param int $nbItems
     * @param OutputInterface $output
     * @return LoaderUtil
     */
    private function getLoader(int $nbItems, OutputInterface $output): LoaderUtil
    {
        $loader = new LoaderUtil();
        $loader->setOutput($output);
        $loader->setNbTotalItems($nbItems);
        $loader->setDisplayMode('percent');
        if (false === $this->useDebug) {
            $loader->start();
        }
        return $loader;
    }

    /**
     * Returns a preconcrete import map, used internally to prepare the concrete import map.
     *
     * This is an array of planetDotName => item, each of which:
     *
     * - 0: version (theoretical version that we want to import)
     * - 1: conflicting version (version already existing in the app), or null if the planet doesn't conflict (i.e. it doesn't exist, or it has the exact same version number already)
     *
     * See the @page(Light_PlanetInstaller conception notes) for more details about the concrete import map.
     *
     *
     * @param string $appDir
     * @param array $theoreticalMap
     * @param int $nbAppConflicts
     * @return array
     */
    private function getPreConcreteImportMap(string $appDir, array $theoreticalMap, int &$nbAppConflicts = 0): array
    {
        $ret = [];
        foreach ($theoreticalMap as $planetDotName => $version) {
            $planetDir = $appDir . "/universe/" . PlanetTool::getPlanetSlashNameByDotName($planetDotName);
            if (true === is_dir($planetDir)) {


                $appPlanetVersion = MetaInfoTool::getVersion($planetDir);
                if (null === $appPlanetVersion) {
                    $this->error("getPreConcreteImportMap: cannot get the version for planet $planetDotName (in $planetDir).");
                }

                if ($appPlanetVersion !== $version) {
                    $nbAppConflicts++;
                    $ret[$planetDotName] = [
                        $version,
                        $appPlanetVersion,
                    ];
                }
            } else {
                $ret[$planetDotName] = [
                    $version,
                    null,
                ];
            }
        }
        return $ret;
    }


    /**
     * Returns a **concrete import map**, based on the given **preconcrete import map**.
     *
     * Available options come from the import method of this class:
     * - crm
     *
     *
     * @param array $preConcreteImportMap
     * @param array $options
     * @return array
     * @throws \Exception
     */
    private function resolvePreConcreteImportMap(array $preConcreteImportMap, array $options = []): array
    {
        $crm = $options['crm'] ?? $this->defaultOptions['crm'];

        /**
         *      - ask: ask the user what to do
         *      - abort: abort
         *      - keep: keep the planet already existing in the app
         *      - replace: remove (irreversible) the planet already existing in the app and import the new one
         *      - latest: keep the planet with the latest version (this potentially can irreversibly remove the planet from your app if the challenger planet has a higher version)
         *      - earliest:
         */

        switch ($crm) {
            case "ask":


                $s = '';
                $nbConflicts = 0;
                foreach ($preConcreteImportMap as $planetDotName => $item) {
                    list($wishVersion, $appVersion) = $item;
                    if (null !== $appVersion) {
                        $nbConflicts++;
                        $s .= "- <blue>$planetDotName:$wishVersion</blue> conflicts with version $appVersion in the app" . PHP_EOL;
                    }
                }


                $this->write(PHP_EOL . "<b>$nbConflicts</b> planet(s) have conflict with the current application:" . PHP_EOL);

                $this->write($s . PHP_EOL);
                $this->write("What do you want to do?" . PHP_EOL);
                $choices = [
                    1 => "1. Abort",
                    2 => "2. Ask me what to do for each planet individually",
                    3 => "3. Keep the planets already existing in the app",
                    4 => "4. Replace the planets already existing with the upcoming planets",
                    5 => "5. Always use the planet with the latest version",
                    6 => "6. Always use the planet with the earliest version",
                ];
                $this->write(implode(PHP_EOL, $choices) . PHP_EOL);
                $answer = QuestionHelper::askClear($this->output, "Type your choice: (type a number): ", "<error>Invalid response, please try again (type a number): </error>", function ($_answer) use ($choices) {
                    return array_key_exists($_answer, $choices);
                });


                switch ($answer) {
                    case "1":
                        $this->write("Ok bye." . PHP_EOL);
                        exit(1);
                    case "2":
                        $this->userCrmChoice = "ask";
                        break;
                    case "3":
                        $this->userCrmChoice = "keep";
                        break;
                    case "4":
                        $this->userCrmChoice = "replace";
                        break;
                    case "5":
                        $this->userCrmChoice = "latest";
                        break;
                    case "6":
                        $this->userCrmChoice = "earliest";
                        break;
                    default:
                        $this->error("resolvePreConcreteImportMap: Unexpected user answer: $answer.");
                        break;
                }
                return $this->doResolvePreConcreteImportMap($preConcreteImportMap);


            case "abort":
                $this->write("<warning>At least one conflict has been found between the planets tree you wish to import/install and the planets in the current application</warning>." .
                    PHP_EOL .
                    "Aborting by user configuration (crm=abort). Bye." . PHP_EOL
                );
                exit(1);
            case "keep":
            case "replace":
            case "latest":
            case "earliest":
                $this->userCrmChoice = $crm;
                return $this->doResolvePreConcreteImportMap($preConcreteImportMap);
            default:
                $this->error("getConcreteImportMap: invalid crm choice: $crm. Aborting");
                exit(2);
        }


    }


    /**
     * Returns the concrete import map from the given preconcrete import map.
     *
     * @param array $preConcreteImportMap
     * @return array
     * @throws \Exception
     */
    private function doResolvePreConcreteImportMap(array $preConcreteImportMap): array
    {
        $ret = [];

        foreach ($preConcreteImportMap as $planetDotName => $item) {
            list($wishVersion, $appVersion) = $item;

            if (null !== $appVersion) {


                if ($appVersion !== $wishVersion) {

                    $crm = $this->userCrmChoice;


                    $keepOld = false;
                    switch ($crm) {
                        case "ask":
                            $this->write(""); // make sure the output exists (hack)


                            $fmt = 'blue:bold';
                            $choices = [
                                1 => "1. Use version <$fmt>$wishVersion</$fmt>",
                                2 => "2. Keep version <$fmt>$appVersion</$fmt>",
                                3 => "3. Abort",
                                4 => "4. Keep the planet already existing in the app and remember this choice for future conflicts",
                                5 => "5. Replace the planet already existing with the upcoming planet (in version $wishVersion) and remember this choice for future conflicts",
                                6 => "6. Use the latest version and remember this choice for future conflicts",
                                7 => "7. Use the earliest version and remember this choice for future conflicts",
                            ];
                            $answer = QuestionHelper::ask(
                                $this->output,
                                "Conflict detected with planet <$fmt>$planetDotName:$wishVersion</$fmt>. The one already in the application is in version <$fmt>$appVersion</$fmt>. What do you want to do?" . PHP_EOL .
                                implode(PHP_EOL, $choices) . PHP_EOL,
                                function ($answer) use ($choices) {
                                    if (false === array_key_exists($answer, $choices)) {
                                        $this->write("Invalid response, try again.");
                                        return false;
                                    }
                                    return true;
                                });

                            switch ($answer) {
                                case "1":
                                    // nothing to do
                                    break;
                                case "2":
                                    $keepOld = true;
                                    break;
                                case "3":
                                    $this->write("Ok bye." . PHP_EOL);
                                    exit;
                                case "4":
                                    $this->userCrmChoice = "keep";
                                    $keepOld = true;
                                    break;
                                case "5":
                                    $this->userCrmChoice = "replace";
                                    // nothing else to do
                                    break;
                                case "6":
                                    $this->userCrmChoice = "latest";
                                    $cmp = LpiVersionHelper::compare($appVersion, $wishVersion);
                                    if ('>' === $cmp) {
                                        $keepOld = true;
                                    }
                                    break;
                                case "7":
                                    $this->userCrmChoice = "earliest";
                                    $cmp = LpiVersionHelper::compare($appVersion, $wishVersion);
                                    if ('<' === $cmp) {
                                        $keepOld = true;
                                    }
                                    break;
                                default:
                                    $this->error("getConcreteImportMap: invalid user choice: $answer. Aborting");
                                    break;
                            }


                            break;
                        case "abort":
                            $this->write("Ok bye." . PHP_EOL);
                            exit;
                        case "keep":
                            $keepOld = true;
                            break;
                        case "replace":
                            // nothing to do
                            break;
                        case "latest":
                            $cmp = LpiVersionHelper::compare($appVersion, $wishVersion);
                            if ('>' === $cmp) {
                                $keepOld = true;
                            }
                            break;
                        case "earliest":
                            $cmp = LpiVersionHelper::compare($appVersion, $wishVersion);
                            if ('<' === $cmp) {
                                $keepOld = true;
                            }
                            break;
                        default:
                            $this->error("getConcreteImportMap: invalid crm choice: $crm. Aborting");
                            break;
                    }

                    if (false === $keepOld) {
                        $ret[$planetDotName] = $item;
                    }
                } else {
                    // we don't add it here, because the planet already is in the app in the desired version.
                    // the force flag is already handled before this method (basically this method isn't called at all when force flag is set).
                }
            } else {
                // the planet doesn't exist yet in the app, so we can safely add it to the concrete import map
                $ret[$planetDotName] = $item;
            }

        }
        return $ret;
    }

    /**
     * Returns the @page(concrete import map).
     * It's an array of planetDotName => item, each of which:
     *
     * - 0: version the user wish to install/import
     * - 1: version already existing in the app, or null (if the planet doesn't exist in the app)
     *
     *
     * Available options come from the import method of this class:
     * - crm
     *
     *
     *
     *
     *
     * @param string $appDir
     * @param array $theoreticalMap
     * @param array $options
     * @return array
     */
    private function getConcreteImportMap(string $appDir, array $theoreticalMap, array $options = []): array
    {
        $nbAppConflicts = 0;
        $ret = $this->getPreConcreteImportMap($appDir, $theoreticalMap, $nbAppConflicts);
        if ($nbAppConflicts > 0) {
            $ret = $this->resolvePreConcreteImportMap($ret, $options);
        }
        return $ret;
    }

    /**
     * Returns the @page(theoretical import map) for the given planet.
     *
     * The returned array is an array of planetDotName => version.
     *
     * If the version is NOT specified, this method will list the latest version of the planet and the latest versions for each
     * dependency recursively (by default).
     *
     * If the version is specified, the listed dependencies will be the ones used by the planet in the specified version.
     *
     * In case of conflicts, the conflicting planets will be ignored (i.e. the first planet stays), and the conflicts information
     * will be available via the getConflicts method.
     *
     *
     * The warnings that this method may trigger will be available via the getWarnings method.
     *
     *
     * Available options come from the import method of the same class:
     * - deps
     * - alt
     * - altHasLast
     * - lo
     *
     *
     * @param string $planetDotName
     * @param string|null $version
     * @param array $options
     * @return array
     * @throws \Exception
     */
    private function getTheoreticalImportMap(string $planetDotName, string $version = null, array $options = []): array
    {

        $deps = $options['deps'] ?? $this->defaultOptions['deps'];
        $alt = $options['alt'] ?? $this->defaultOptions['alt'];
        $altHasLast = $options['altHasLast'] ?? $this->defaultOptions['altHasLast'];
        $locationOrder = $options['lo'] ?? $this->defaultOptions['lo'];

        if (false === $deps) {
            if (null === $version) {
                $letters = str_split($locationOrder);
                list($galaxy, $planet) = PlanetTool::extractPlanetDotName($planetDotName);
                foreach ($letters as $letter) {
                    switch ($letter) {
                        case "a":
                            if (true === $altHasLast) {
                                $path = $alt;
                                if ('local' === $path) {
                                    $path = LocalUniverseTool::getLocalUniversePath();
                                }
                                $planetPath = $path . "/$galaxy/$planet";
                                $version = MetaInfoTool::getVersion($planetPath);
                            }
                            break;
                        case "w":
                            $version = LpiWebHelper::getPlanetCurrentVersion($planetDotName);
                            break;
                        default:
                            $this->error("getTheoreticalImportMap: Unrecognized letter $letter, planet was $planetDotName.");
                            break;
                    }
                }
                if (null === $version) {
                    $this->error("getTheoreticalImportMap: no location could access the version for planet $planetDotName.");
                }

            }
            return [
                $planetDotName => $version,
            ];
        }


        if (null === $version) {
            return $this->getUniStyleImportMap($planetDotName, $options);
        } else {
            return $this->getTheoreticalImportMapWithSpecificVersion($planetDotName, $version, $options);
        }
    }


    /**
     * Returns the dependencies for with specific version numbers.
     *
     *
     * @param string $planetDotName
     * @param string $version
     * @param array $options
     * @return array
     * @throws \Exception
     */
    private function getTheoreticalImportMapWithSpecificVersion(string $planetDotName, string $version, array $options = []): array
    {
        $locationOrder = $options['lo'] ?? $this->defaultOptions['lo'];

        if (true == str_starts_with($locationOrder, 'w')) {
            $this->write("Fetching <b>theoretical import map</b> from the web, this might take some time, please wait..." . PHP_EOL);
        }


        $ret = [];
        $this->collectVersionedDependencies($planetDotName, $version, $options, $ret);
        return $ret;
    }


    /**
     * Collects the dependencies for with specific version numbers.
     *
     * @param string $planetDotName
     * @param string $version
     * @param array $options
     * @param array $ret
     * @param array $parentChain
     * @param array $found
     * @throws \Exception
     */
    private function collectVersionedDependencies(string $planetDotName, string $version, array $options = [], array &$ret = [], array &$parentChain = [], array &$found = []): void
    {
        $alt = $options['alt'] ?? $this->defaultOptions['alt'];
        $locationOrder = $options['lo'] ?? $this->defaultOptions['lo'];

        $found[] = $planetDotName;
        list($galaxy, $planet) = PlanetTool::extractPlanetDotName($planetDotName);
        $letters = str_split($locationOrder);
        foreach ($letters as $letter) {
            switch ($letter) {
                case "a":
                    $path = $alt;
                    if ('local' === $path) {
                        $path = LocalUniverseTool::getLocalUniversePath();
                    }
                    $planetPath = $path . "/$galaxy/$planet";
                    if (true === is_dir($planetPath)) {
                        $f = "$planetPath/lpi-deps.byml";
                        if (true === is_file($f)) {
                            $arr = BabyYamlUtil::readFile($f);
                            if (true === $this->processLpiDepsArray($arr, $planetDotName, $version, $options, $ret, $parentChain, $found)) {
                                return;
                            }
                        } else {
                            $this->addWarning("The planet $planetDotName doesn't contain a lpi-deps.byml file. We cannot deal with this non-compliant planet. Aborting.");
                        }
                    }
                    break;
                case "w":
                    try {
                        $arr = LpiWebHelper::getLpiDependencies($planetDotName);
                        if (true === $this->processLpiDepsArray($arr, $planetDotName, $version, $options, $ret, $parentChain, $found)) {
                            return;
                        }
                    } catch (LpiIncompatibleException $e) {
                        $this->addWarning("The planet $planetDotName doesn't contain a lpi-deps.byml file. We cannot deal with this non-compliant planet. Aborting.");
                    }

                    break;
                default:
                    $this->error("collectVersionedDependencies: Unrecognized letter $letter, planet was $planetDotName.");
                    break;
            }
        }

        $this->error("collectVersionedDependencies: no location could access the dependencies for $planetDotName:$version.");
    }


    /**
     * A factorized snippet used by the collectVersionedDependencies method.
     * Returns whether or not the planet has been added to the import map.
     *
     * @param array $arr
     * @param string $planetDotName
     * @param string $version
     * @param array $options
     * @param array $ret
     * @param array $parentChain
     * @param array $found
     * @return bool
     * @throws \Exception
     */
    private function processLpiDepsArray(array $arr, string $planetDotName, string $version, array $options, array &$ret, array &$parentChain, array &$found): bool
    {
        if (true === array_key_exists($version, $arr)) {
            $deps = $arr[$version];
            foreach ($deps as $str) {
                list($_galaxy, $_planet, $_version) = explode(':', $str);
                $_planetDotName = $_galaxy . "." . $_planet;


                if (true === in_array($_planetDotName, $found)) {
                    $this->addConflict($_planetDotName, $_version, $parentChain);
                    continue;
                }

                $parentChain[] = $_planetDotName . ':' . $_version;
                $this->collectVersionedDependencies($_planetDotName, $_version, $options, $ret, $parentChain, $found);
                array_pop($parentChain);
            }
            if (false === array_key_exists($planetDotName, $ret)) {
                $ret[$planetDotName] = $version;
                return true;
            } else {
                /**
                 * Is this a conflict too?
                 */
                $this->error("collectVersionedDependencies: I don't know how to handle this case. Aborting.");
            }
        }
        return false;
    }

    /**
     * Adds information about a dependency conflict that potentially occurs with the versioned system (i.e. not uni style).
     *
     * The given planetDotName and version represent the conflictual planet information.
     * The parent chain points to the parent which called the planet which caused the conflict to occur.
     *
     * @param string $planetDotName
     * @param string $version
     * @param array $parentChain
     */
    private function addConflict(string $planetDotName, string $version, array $parentChain): void
    {
        $this->conflicts[] = [$planetDotName, $version, $parentChain];
    }

    /**
     * Adds a warning message.
     * @param string $message
     */
    private function addWarning(string $message): void
    {
        $this->warnings[] = $message;
    }


    /**
     * Writes a message to the output.
     * @param string $msg
     */
    private function write(string $msg)
    {
        if (null === $this->output) {
            $this->output = new Output();
        }
        $this->output->write($msg);
    }


    /**
     * Adds a message to the debug stream.
     * @param string $msg
     */
    private function debug(string $msg)
    {
        if (true === $this->useDebug) {
            $this->write("<$this->debugFmt>Debug: </$this->debugFmt>" . $msg);
        }
    }

    /**
     * Returns the @page(import map) for the given planet, in uni style (i.e. always use the latest dependencies recursively).
     *
     *
     * Available options come from the getTheoreticalImportMap method in this class:
     * - alt
     * - lo
     *
     *
     * @param string $planetDotName
     * @param array $options
     * @return array
     */
    private function getUniStyleImportMap(string $planetDotName, array $options = []): array
    {
        $alt = $options['alt'] ?? $this->defaultOptions['alt'];
        $locationOrder = $options['lo'] ?? $this->defaultOptions['lo'];

        $letters = str_split($locationOrder);
        foreach ($letters as $letter) {
            switch ($letter) {
                case "a":
                    $path = $alt;
                    if ('local' === $path) {
                        $path = LocalUniverseTool::getLocalUniversePath();
                    }
                    $f = $path . "/Ling/Uni2/dependency-master.byml";
                    if (true === is_file($f)) {
                        $arr = BabyYamlUtil::readFile($f, ['numbersAsString' => true]);
                        return $this->getTheoreticalImportMapFromUniDependencyMaster($planetDotName, $arr);
                    }
                    break;
                case "w":
                    $arr = DependencyMasterHelper::getDependencyMasterArrayFromWeb();
                    if (false !== $arr) {
                        return $this->getTheoreticalImportMapFromUniDependencyMaster($planetDotName, $arr);
                    }
                    break;
                default:
                    $this->error("getUniStyleImportMap: Unrecognized letter $letter, planet was $planetDotName.");
                    break;
            }
        }

        $this->error("getUniStyleImportMap: no location could return the import map for $planetDotName.");
    }


    /**
     * Returns the @page(import map) from the given uni dependency master content, for the given planet.
     *
     * @param string $planetDotName
     * @param array $conf
     * @return array
     */
    private function getTheoreticalImportMapFromUniDependencyMaster(string $planetDotName, array $conf): array
    {
        $ret = [];
        $galaxies = $conf["galaxies"];
        $this->collectUniDependencies($planetDotName, $galaxies, $ret);
        return $ret;
    }


    /**
     * Collects the uni dependencies for the given planet, recursively.
     *
     * @param string $planetDotName
     * @param array $planets
     * @param array $ret
     * @param array $found
     * @throws \Exception
     */
    private function collectUniDependencies(string $planetDotName, array $planets, array &$ret, array &$found = [])
    {
        list($galaxy, $planet) = PlanetTool::extractPlanetDotName($planetDotName);
        if (true === array_key_exists($galaxy, $planets)) {
            if (true === array_key_exists($planet, $planets[$galaxy])) {
                $found[] = $galaxy . "." . $planet;
                $planetInfo = $planets[$galaxy][$planet];
                $deps = $planetInfo['dependencies'];
                foreach ($deps as $_galaxy => $_planets) {
                    foreach ($_planets as $_planet) {
                        $_planetDotName = $_galaxy . "." . $_planet;
                        if (false === array_key_exists($_planetDotName, $ret)) {


                            if (true === in_array($_planetDotName, $found)) {
                                /**
                                 * Avoid cyclic recursion.
                                 * This happens for instance with Bat depending on BabyYaml, and BabyYaml depending on Bat.
                                 */
                                continue;
                            }
                            $this->collectUniDependencies($_planetDotName, $planets, $ret, $found);
                        }
                    }

                }
                $ret[$planetDotName] = (string)$planetInfo['version'];
            } else {
                $this->error("collectUniDependencies: planet <b>$galaxy.$planet</b> not defined in <b>uni master dependency file</b>." . PHP_EOL);
            }
        } else {
            $this->error("collectUniDependencies: galaxy <b>$galaxy</b> not defined in <b>uni master dependency file</b>." . PHP_EOL);
        }
    }


    /**
     * Throws an exception.
     * @param string $msg
     * @param int|null $code
     * @throws \Exception
     */
    private function error(string $msg, int $code = null)
    {
        throw new LightPlanetInstallerException(static::class . ": " . $msg, $code);
    }
}