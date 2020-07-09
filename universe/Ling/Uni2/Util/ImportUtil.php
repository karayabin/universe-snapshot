<?php


namespace Ling\Uni2\Util;


use Ling\CliTools\Output\OutputInterface;
use Ling\Uni2\Application\UniToolApplication;
use Ling\Uni2\DependencySystemImporter\DependencySystemImporterInterface;
use Ling\Uni2\ErrorSummary\ErrorSummary;
use Ling\Uni2\Exception\Uni2Exception;
use Ling\Uni2\Helper\DependencyMasterHelper;
use Ling\Uni2\Helper\OutputHelper as H;
use Ling\Uni2\LocalServer\LocalServer;
use Ling\Uni2\PostInstall\DirectiveHandler\PostInstallDirectiveHandler;
use Ling\UniverseTools\MetaInfoTool;
use Ling\UniverseTools\PlanetTool;


/**
 * The ImportUtil class.
 *
 * Helps with the importing operations used in commands such as:
 * - import
 * - reimport
 * - reimport-all
 *
 *
 */
class ImportUtil
{

    /**
     * This property holds the post install directives handler for this instance.
     * @var PostInstallDirectiveHandler
     */
    protected $postInstallHandler;


    /**
     * This property holds the localServer for this instance.
     * @var LocalServer
     */
    private $localServer;

    /**
     * This property holds the application for this instance.
     * @var UniToolApplication
     */
    private $application;

    /**
     * This property holds the errorSummary for this instance.
     * @var ErrorSummary
     */
    private $errorSummary;


    /**
     * Builds the ImportUtil instance.
     */
    public function __construct()
    {
        $this->postInstallHandler = new PostInstallDirectiveHandler();
        $this->localServer = null;
    }

    /**
     * Sets the errorSummary.
     *
     * @param ErrorSummary $errorSummary
     */
    public function setErrorSummary(ErrorSummary $errorSummary)
    {
        $this->errorSummary = $errorSummary;
    }


    /**
     * Imports a planet using the algorithm defined in the **importItem** method of this class.
     * See the @object(importItem method) for more details.
     *
     *
     *
     * @param string $longPlanetName
     * The long planet name: galaxy/planetShortName.
     *
     * @param UniToolApplication $application
     * @param OutputInterface $output
     * @param array $options . See the importItem method options argument for more details.
     * @throws \Ling\Uni2\Exception\Uni2Exception
     */
    public function importPlanet(string $longPlanetName, UniToolApplication $application, OutputInterface $output, array $options = [])
    {

        $indentLevel = $options['indentLevel'] ?? 0;


        //--------------------------------------------
        // PROCEED WITH THE IMPORT PLANET
        //--------------------------------------------
        $planetComponents = PlanetTool::getGalaxyNamePlanetNameByPlanetName($longPlanetName);
        if (false !== $planetComponents) {
            list($galaxy, $planetShortName) = $planetComponents;


            $this->localServer = $application->getLocalServer();
            $this->application = $application;


            $depMaster = $this->application->getDependencyMasterConf();
            $planetMasterItem = DependencyMasterHelper::getPlanetItem($depMaster, $longPlanetName);
            if (false !== $planetMasterItem) {


                $appDir = $application->getApplicationDir();
                $appUniverseDir = $appDir . "/" . $application->getUniverseDirectoryName();
                $planetDir = $appUniverseDir . "/$longPlanetName";


                $postInstall = $planetMasterItem['post_install'] ?? [];
                $this->importItem($galaxy, $planetShortName, $planetDir, $output, $postInstall, $options);


            } else {
                H::warning(H::i($indentLevel) . "The planet <bold>$longPlanetName</bold> is not registered in the local dependency master file, it will be ignored." . PHP_EOL, $output);
            }
        } else {
            H::warning(H::i($indentLevel) . "The planet name <bold>$longPlanetName</bold> is invalid. A valid planet name should be of the form <bold>\$galaxy/\$planetShortName</bold>." . PHP_EOL, $output);
        }

    }





    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Tries to reimport an item into the current application.
     * See the @page(universe dependency system page) for more details.
     *
     * The item is identified by the $dependencySystem and the $packageImportName.
     *
     *
     * Algorithm
     * --------------
     * Here is the inner algorithm of this method in a nutshell.
     *
     * 1. this method re-imports the given item.
     *      The reimporting steps are always the same:
     *          - it will first try to import the item from the local server
     *          - if the item is not in the local server, it will try to import it from the web.
     *                  Also, if this step is successful, this method will try to make a local server copy of the item
     *                  for the next time.
     *          - if it fails too, a warning is been displayed and the next item is processed
     *
     * 2. Then if it's a planet, it processes any dependencies that the item has.
     *      The dependency process is the following by default:
     *          - if the force flag is set, the dependency will be reimported no matter what
     *          - else, if the dependency already exists in the application and is up-to-date (i.e. it has the same
     *              version number than the version number in the @page(local dependency master file)), then
     *              the dependency will not be reimported.
     *          - else, if the dependency doesn't exist in the application, or if it exists but is outdated,
     *              then it gets reimported.
     *          - if reimported, this whole algorithm is being reused from the beginning (starting back from step 1...).
     *
     * 3. If the item is a planet and has post install directives, those are executed.
     *
     *
     *
     *
     *
     *
     *
     * @param $dependencySystem
     * @param $packageImportName
     * @param $appItemDir
     * The directory where the item should be imported into.
     * Warning: the old directory, if it exists, might be removed/replaced by the newly created item directory.
     *
     *
     * @param OutputInterface $output
     * @param array $postInstall
     * @param array $options
     *
     * - indentLevel: int=0. The base indent level to write output messages with.
     * - resolveDependencies: bool=true. An internal property, you shouldn't use it. Forces whether or not to allow dependency resolving.
     * - forceMode: bool=false. In force mode, all items are reimported, even if their version number is the latest.
     * - forceMode: bool=false. In force mode, all items are reimported, even if their version number is the latest.
     * - importMode: (only applies to planets)
     *
     *      - reimport: the planet is imported if one of the following cases is true:
     *
     *          - the planet does not exist in the application yet
     *          - the force flag is set to true
     *          - the planet exists in the application but there is a newer version available (defined in the local master dependency file)
     *
     *      - import: the planet is imported if one of the following cases is true:
     *
     *          - the planet does not exist in the application yet
     *          - the force flag is set to true
     *
     *      - store: the planet is imported only in the local server
     *
     *
     *
     *
     * - _appReplacedItemDir: used by the PackUni2Command. You should not used it.
     *
     *
     *
     * For non-planets, the behaviour is to import only if the item does not exist.
     * The force flag has no effect on non-planets.
     * For more control on this behaviour, one needs to use the post install directives...
     *
     *
     * @throws \Ling\Uni2\Exception\Uni2Exception
     */
    protected function importItem($dependencySystem, $packageImportName, $appItemDir, OutputInterface $output, array $postInstall, array $options = [])
    {


        $indentLevel = $options['indentLevel'] ?? 0;
        $resolveDependencies = $options['resolveDependencies'] ?? true;
        $forceMode = $options['forceMode'] ?? false;
        $importMode = $options['importMode'] ?? "reimport";

        // private options
        $appReplacedItemDir = $options['_appReplacedItemDir'] ?? $appItemDir;


        $depMaster = $this->application->getDependencyMasterConf();
        $appDir = $this->application->getApplicationDir();
        $appUniverseDir = $appDir . "/" . $this->application->getUniverseDirectoryName();
        $appUniverseDependenciesDir = $appDir . "/universe-dependencies";
        $galaxies = DependencyMasterHelper::getGalaxies($depMaster);
        $isPlanet = (in_array($dependencySystem, $galaxies, true));


        if ("store" === $importMode) {
            if (false === $this->localServer->isActive()) {
                H::warning(H::i($indentLevel) . "Local server inactive. Use the <bold>conf</bold> command to set a root dir and activate it. Aborting." . PHP_EOL, $output);
                return;
            }
        }


        /**
         * @var $importer DependencySystemImporterInterface
         */
        $importer = $this->application->getImporter($dependencySystem);

        if (null !== $importer) {
            $packageSymbolicName = $importer->getPackageSymbolicName($packageImportName);



            /**
             * Overriding the dest dir to the local server (if importMode=store)
             */
            if ('store' === $importMode) {
                /**
                 * Note: the $appReplacedItemDir is only used by the PackUni2Command so far, so I figured
                 * I could overwrite it on the fly without breaking everything...
                 */
                $appReplacedItemDir = $this->localServer->getItemPath($dependencySystem, $packageSymbolicName);
            }


            $doImportItem = true;
            //--------------------------------------------
            // HANDLING IMPORT MODES
            //--------------------------------------------
            if (true === $isPlanet) {
                $masterMeta = DependencyMasterHelper::getPlanetItem($depMaster, $dependencySystem . "/" . $packageImportName);
                if (false !== $masterMeta) {

                    $masterVersion = $masterMeta['version'];


                    if ('reimport' === $importMode) {
                        $meta = MetaInfoTool::parseInfo($appReplacedItemDir);
                        $planetVersion = $meta['version'] ?? '0.0.0'; // if the planet doesn't exist, it gets a version of 0.0.0, so that it gets imported automatically.
                        if (true === $forceMode || $masterVersion > $planetVersion) {
                            $doImportItem = true;
                            H::discover(H::i($indentLevel) . "Reimporting planet <blue>$dependencySystem/$packageImportName ($planetVersion --> $masterVersion)</blue>...", $output);
                        } else {
                            $doImportItem = false;
                            H::info(H::i($indentLevel) . "The planet <bold>$dependencySystem/$packageImportName</bold> is already up-to-date with version <bold>$masterVersion</bold>." . PHP_EOL, $output);
                        }

                    } elseif ('store' === $importMode) {

                        $sVersion = $masterVersion;
                        if (true === $forceMode) {
                            $doImportItem = true;
                        } else {
                            if (true === $this->localServer->hasItem($dependencySystem, $packageSymbolicName)) {
                                $doImportItem = true;
                                $localServerPlanet = $this->localServer->getItemPath($dependencySystem, $packageSymbolicName);
                                $meta = MetaInfoTool::parseInfo($localServerPlanet);
                                $localServerVersion = $meta['version'] ?? '0.0.0'; // if the planet doesn't exist, it gets a version of 0.0.0, so that it gets imported automatically.
                                $sVersion = "$localServerVersion --> $masterVersion";

                                if ($masterVersion > $localServerVersion) {
                                    $doImportItem = true;
                                } else {
                                    $doImportItem = false;
                                    H::info(H::i($indentLevel) . "The planet <bold>$dependencySystem/$packageImportName</bold> is already up-to-date (in local server) with version <bold>$masterVersion</bold>." . PHP_EOL, $output);
                                }
                            } else {
                                $doImportItem = true;
                            }
                        }

                        if (true === $doImportItem) {
                            H::discover(H::i($indentLevel) . "Importing planet <blue>$dependencySystem/$packageImportName ($sVersion)</blue> to local server...", $output);
                        }
                    } elseif ('import' === $importMode) {
                        if (true === $forceMode || false === is_dir($appReplacedItemDir)) {
                            $doImportItem = true;
                            H::discover(H::i($indentLevel) . "Importing planet <blue>$dependencySystem/$packageImportName ($masterVersion)</blue>...", $output);
                        } else {
                            $doImportItem = false;
                            H::info(H::i($indentLevel) . "The planet <bold>$dependencySystem/$packageImportName</bold> already exists. It will not be imported." . PHP_EOL, $output);
                        }

                    } else {
                        throw new Uni2Exception("Unknown import mode: $importMode");
                    }
                } else {
                    $doImportItem = false;
                    H::warning(H::i($indentLevel) . "The planet <blue>$dependencySystem/$packageImportName</blue> is not registered in the local dependency master. It will not be imported." . PHP_EOL, $output);
                }
            } else {

                if (false === is_dir($appReplacedItemDir)) {
                    $doImportItem = true;
                    H::info(H::i($indentLevel) . "Importing item <bold>$packageImportName</bold>..." . PHP_EOL, $output);
                } else {
                    $doImportItem = false;
                    H::info(H::i($indentLevel) . "Item <bold>$packageImportName</bold> already exists and will not be reimported." . PHP_EOL, $output);
                }

            }



            if (true === $doImportItem) {


                //--------------------------------------------
                // USING THE LOCAL SERVER TECHNIQUE
                //--------------------------------------------
                $upgradeSuccessful = false;
                if ('store' !== $importMode) {
                    if ($this->localServer->isActive()) {
                        if ($this->localServer->hasItem($dependencySystem, $packageSymbolicName)) {
                            $output->write("from local server...");
                            $res = $this->localServer->replaceItem("$dependencySystem/$packageSymbolicName", $appReplacedItemDir);
                            if (true === $res) {
                                $upgradeSuccessful = true;
                                $output->write("<success>ok</success>." . PHP_EOL);
                            } else {
                                $output->write("<error>failed</error>." . PHP_EOL);
                            }

                        }
                    }
                }



                if (false === $upgradeSuccessful) {
                    //--------------------------------------------
                    // USING THE WEB FALLBACK TECHNIQUE
                    //--------------------------------------------
                    $output->write('from web...');
                    $output->write(PHP_EOL);


                    //--------------------------------------------
                    // HANDLING IMPORTER'S IMPORT
                    //--------------------------------------------
                    H::info(H::i($indentLevel + 1) . "Calling importer <bold>$dependencySystem</bold>:" . PHP_EOL, $output);


                    $res = $importer->importPackage($packageImportName, $appReplacedItemDir, $output, [
                        'indentLevel' => $indentLevel + 2,
                    ]);
                    if (true === $res) {
                        $upgradeSuccessful = true;
                        H::success(H::i($indentLevel + 2) . "The import was a <success>success</success>." . PHP_EOL, $output);

                        /**
                         * make a copy to the local server if it exists.
                         */
                        if (true === $this->localServer->exists()) {

                            H::info(H::i($indentLevel + 1) . "Creating a copy for the local server...", $output);


                            $symbolicName = $importer->getPackageSymbolicName($packageImportName);
                            $res = $this->localServer->importItem($appReplacedItemDir, $dependencySystem . "/" . $symbolicName, $isPlanet);


                            if (true === $res) {
                                $output->write("<success>ok</success>." . PHP_EOL);
                            } else {
                                $output->write("<error>oops</error>." . PHP_EOL);
                                H::warning(H::i($indentLevel + 2) . "The copy couldn't be created!" . PHP_EOL, $output);
                            }
                        }


                    } else {

                        if (null !== $this->errorSummary) {
                            $sItem = (true === $isPlanet) ? "planet" : "item";
                            $this->errorSummary->addErrorMessage("The import of $sItem <bold>$dependencySystem.$packageSymbolicName</bold> was a <error>failure</error>.");
                        }
                        H::error(H::i($indentLevel + 2) . "The import was a <error>failure</error>." . PHP_EOL, $output);
                    }
                }



                //--------------------------------------------
                // DEPENDENCIES
                //--------------------------------------------
                if (true === $resolveDependencies && true === $isPlanet && true === $upgradeSuccessful) {



                    $longPlanetName = $dependencySystem . "/" . $packageSymbolicName;
                    $dependencies = DependencyMasterHelper::getDependencyMapByPlanetName($longPlanetName, $depMaster);



                    if (count($dependencies['dependencies']) > 0) {

                        $nbDependencies = 0;
                        $systems = [];
                        foreach ($dependencies['dependencies'] as $system => $packages) {
                            $nbDependencies += count($packages);
                            $systems[] = $system;
                        }


                        if ($nbDependencies > 0) {

                            $nbSystems = count($systems);
                            $sDeps = (1 === $nbDependencies) ? "dependency" : "dependencies";
                            $sSystem = (1 === $nbSystems) ? "system" : "systems";


                            H::info(H::i($indentLevel + 1) . "$nbDependencies $sDeps found (recursively) within $nbSystems dependency $sSystem (" . implode(', ', $systems) . ") " . PHP_EOL, $output);
                            H::info(H::i($indentLevel + 1) . "Resolving dependencies:" . PHP_EOL, $output);


                            //--------------------------------------------
                            // RESOLVING ALL (FLATTENED) DEPENDENCIES
                            //--------------------------------------------
                            foreach ($dependencies['dependencies'] as $system => $packages) {
                                $isDepPlanet = (in_array($system, $galaxies, true));

                                /**
                                 * @var $depImporter DependencySystemImporterInterface
                                 */
                                $depImporter = $this->application->getImporter($system);



                                if (null !== $depImporter) {

                                    foreach ($packages as $package => $version) {


                                        $newOptions = $options;
                                        $newOptions['resolveDependencies'] = false;
                                        $newOptions['indentLevel'] = $indentLevel + 2;


                                        if (true === $isDepPlanet) {
                                            $depItemDir = $appUniverseDir . "/$system/$package";
                                        } else {
                                            $depSymbolicName = $depImporter->getPackageSymbolicName($package);
                                            $depItemDir = $appUniverseDependenciesDir . "/$system/$depSymbolicName";
                                        }


                                        //--------------------------------------------
                                        // PROCESSING POST INSTALLS
                                        //--------------------------------------------
                                        $depPostInstall = [];
                                        if ($dependencies['post_installs']) {
                                            $planetId = $system . "." . $package;
                                            if (array_key_exists($planetId, $dependencies['post_installs'])) {
                                                $depPostInstall = $dependencies['post_installs'][$planetId];
                                            }
                                        }

                                        $this->importItem($system, $package, $depItemDir, $output, $depPostInstall, $newOptions);
                                    }
                                } else {
                                    if (true === $isDepPlanet) {
                                        $sSystem = "galaxy";
                                        $sItems = "planets";
                                    } else {
                                        $sSystem = "dependency item";
                                        $sItems = "items";
                                    }
                                    H::info(H::i($indentLevel + 2) . "Importer not found for $sSystem <bold>$system</bold>. All $sItems of this $sSystem will be ignored." . PHP_EOL, $output);
                                }
                            }
                        }
                    }
                }

                if (true === $isPlanet && false === empty($postInstall)) {
                    if ('store' !== $importMode) {
                        $this->handlePostInstallDirectives($postInstall, $dependencySystem, $packageImportName, $this->application, $indentLevel, $output);
                    }
                }
            }


        } else {
            $sSystem = "dependency system";
            $sPackages = "packages";
            if (true === $isPlanet) {
                $sSystem = "galaxy";
                $sPackages = "planets";
            }
            H::warning(H::i($indentLevel) . "There is no importer defined for the <bold>$dependencySystem</bold> $sSystem. All $sPackages with the same $sSystem will be ignored." . PHP_EOL, $output);
        }
    }


    /**
     * Handles/executes the given post install directives.
     * See the @page(post install directives page) for more details.
     *
     * @param array $postInstall
     * @param string $galaxy
     * @param string $planetName
     * @param UniToolApplication $application
     * @param int $indentLevel
     * @param OutputInterface $output
     * @throws \Exception
     */
    protected function handlePostInstallDirectives(array $postInstall, string $galaxy, string $planetName, UniToolApplication $application, int $indentLevel, OutputInterface $output)
    {
        if ($postInstall) {
            H::info(H::i($indentLevel + 1) . "Post install directives found (in the local dependency master) for planet <blue>$galaxy/$planetName</blue>." . PHP_EOL, $output);
            H::info(H::i($indentLevel + 1) . "Executing post install directives for planet <blue>$galaxy/$planetName</blue>:" . PHP_EOL, $output);

            if (is_array($postInstall)) {
                foreach ($postInstall as $directiveName => $directiveConf) {
                    $this->postInstallHandler->handleDirective($directiveName, $directiveConf, $output, [
                        'indentLevel' => $indentLevel + 2,
                        'application' => $application,
                        'planetName' => $planetName,
                        'planetDir' => $application->getUniverseDirectory() . "/$galaxy/$planetName",
                    ]);
                }

            } else {
                H::warning(H::i($indentLevel + 2) . "The post install directives must be in the form of an array." . PHP_EOL, $output);
                H::warning(H::i($indentLevel + 2) . "The post install directives for planet <blue>$galaxy/$planetName</blue> won't be executed." . PHP_EOL, $output);
            }
        }

    }
}