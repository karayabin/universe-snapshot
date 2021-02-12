<?php


namespace Ling\Light_PlanetInstaller\Util;

use Ling\Bat\CurrentProcessTool;
use Ling\Bat\FileSystemTool;
use Ling\CliTools\Helper\QuestionHelper;
use Ling\CliTools\Output\OutputInterface;
use Ling\CliTools\Util\LoaderUtil;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_PlanetInstaller\Exception\LightPlanetInstallerException;
use Ling\Light_PlanetInstaller\Exception\LpiIncompatibleException;
use Ling\Light_PlanetInstaller\Helper\LpiConfHelper;
use Ling\Light_PlanetInstaller\Helper\LpiLocalUniverseHelper;
use Ling\Light_PlanetInstaller\Helper\LpiPlanetHelper;
use Ling\Light_PlanetInstaller\Helper\LpiVersionHelper;
use Ling\Light_PlanetInstaller\Helper\LpiWebHelper;
use Ling\Light_PlanetInstaller\Repository\LpiApplicationRepository;
use Ling\Light_PlanetInstaller\Repository\LpiLocalUniverseRepository;
use Ling\Light_PlanetInstaller\Repository\LpiWebRepository;
use Ling\Light_PlanetInstaller\Service\LightPlanetInstallerService;
use Ling\UniverseTools\PlanetTool;

/**
 * The PlanetImportProcessUtil class.
 */
class PlanetImportProcessUtil
{

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;


    /**
     * This property holds the output for this instance.
     * @var OutputInterface
     */
    protected $output;


    /**
     * This property holds the applicationDir for this instance.
     * @var string
     */
    private $applicationDir;

    /**
     * This property holds the buildDir for this instance.
     * @var string
     */
    private $buildDir;

    /**
     * This property holds the applicationPlanets for this instance.
     * It's an array of planetDot => (real) version.
     * @var array
     */
    private $applicationPlanets;

    /**
     * This property holds the virtualBin for this instance.
     * It's an array of planetDot => (real) version.
     * @var array array
     */
    private $virtualBin;


    /**
     * This property holds the lastPlanets for this instance.
     * @var array
     */
    private $lastPlanets;

    /**
     * This property holds the bernoniMode for this instance.
     *
     * string(manual|auto)=auto, the bernoni conflict resolution mode.
     * If auto, this method will automatically resolve bernoni conflicts as they occur, choosing the latest version (for now).
     * If manual, this method will prompt the user to choose which version should be used. Note that the manual mode is only available in a cli environment,
     * an exception will be thrown if you try this mode in a web environment.
     *
     * @var string
     */
    private $bernoniMode;

    /**
     * This property holds the planetDependencies for this instance.
     * Cache for planet dependencies (which are searched from the web because it's has supposedly the most up-to-date info).
     * It's an array of planetFullId => dependencyItems, with:
     *
     * - planetFullId = galaxy.planet.realVersion
     * - dependencyItems, an array of dependency items, each of which:
     *      - 0: planetDot
     *      - 1: versionExpr
     *
     *
     *
     * @var array
     */
    private $planetDependencies;

    /**
     * This property holds the indentLevel for this instance.
     * @var int
     */
    private $indentLevel;

    /**
     * This property holds the indentSymbol for this instance.
     * @var string
     */
    private $indentSymbol;

    /**
     * This property holds the bernoniMemory for this instance.
     * Array of bernoniId => userChoice,
     * with:
     * - bernoniId: galaxy.planet:version1:version2
     * - userChoice: the real version chosen by the user
     * - version1: the first version in a sorted list containing v1 and v2
     * - version2: the last version in a sorted list containing v1 and v2
     *
     * @var array
     */
    private $bernoniMemory;

    /**
     * The log levels to display to the output.
     *
     * We support @page(classic log levels).
     *
     * Choose any options in:
     *
     * - trace
     * - debug
     * - info
     * - warning
     * - error
     *
     *
     * Default is the following array:
     * - info
     * - warning
     * - error
     *
     *
     *
     * @var array
     */
    private $logLevels;

    /**
     * This property holds the sessionErrors for this instance.
     * @var array
     */
    private $sessionErrors;

    /**
     * This property holds the wishList for this instance.
     * Array of planetDot => miniVersionExpr (after prepareWishlist is called).
     *
     * @var array
     */
    private $wishList;


    /**
     * This property holds the keepBuild for this instance.
     * @var bool = false
     */
    private $keepBuild;

    /**
     * This property holds the force for this instance.
     * @var bool = false
     */
    private $force;

    /**
     * Builds the PlanetInstallerUtil instance.
     */
    public function __construct()
    {
        $this->container = null;
        $this->applicationDir = null;
        $this->output = null;
        $this->virtualBin = [];
        $this->applicationPlanets = [];
        $this->sessionErrors = [];
        $this->lastPlanets = [];
        $this->bernoniMode = "auto";
        $this->planetDependencies = [];
        $this->indentLevel = 0;
        $this->indentSymbol = (true === CurrentProcessTool::isCli()) ? ' ' : '&nbsp;';
        $this->bernoniMemory = [];
        $this->logLevels = ['info', 'warning', 'error'];
        $this->buildDir = null;
        $this->keepBuild = false;
        $this->force = false;
        $this->wishList = [];
    }

    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
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
     * Sets the logLevels.
     *
     * @param array $logLevels
     */
    public function setLogLevels(array $logLevels)
    {
        $this->logLevels = $logLevels;
    }


    /**
     * Update the given application based on the given wishlist.
     * The wishlist is an array of planetDot => versionExpr.
     *
     * Available options are:
     * - bernoniMode: string (manual|auto)=auto. See the bernoniMode property of this class for more details.
     * - keepBuild: bool=false, whether to keep the buildDir. If false, it's removed after the execution in case of success.
     * - operationMode: string (import|install) = import. The operation mode.
     * - force: bool=false, whether to force the reimport/reinstall, even if the planet is already imported/installed.
     *
     *
     * @param string $appDir
     * @param array $wishList
     * @param array $options
     */
    public function updateApplicationByWishList(string $appDir, array $wishList, array $options = [])
    {
        $operationMode = $options['operationMode'] ?? 'import';
        $install = ('install' === $operationMode);
        $this->bernoniMode = $options['bernoniMode'] ?? 'auto';
        $this->keepBuild = $options['keepBuild'] ?? false;
        $this->force = $options['force'] ?? false;

        if (false === in_array($this->bernoniMode, ['auto', 'manual'], true)) {
            $this->error("Unknown bernoni mode: \"$this->bernoniMode\".");
        }


        $buildDir = $this->getBuildDir();

        $this->info("Removing build dir (<blue>$buildDir</blue>)...");
        FileSystemTool::remove($buildDir);


        $this->info("<success>ok</success>" . PHP_EOL);


        $output = $this->output;
        $this->info("Creating virtual bin...be patient..." . PHP_EOL);


        $this->applicationDir = $appDir;
        $this->wishList = $this->prepareWishlist($wishList);

        $this->init();
        $wishList = $this->wishList;

        // add a loader...
        $nbItems = count($wishList);
        $loader = new LoaderUtil();
        $loader->setOutput($output);
        $loader->setNbTotalItems($nbItems);
        $loader->setDisplayMode('percent');
        $loader->start();



        foreach ($wishList as $planetDot => $versionExpr) {
            $this->importToVirtualBin($planetDot, $versionExpr, [
                'force' => $this->force,
            ]);
            $loader->incrementBy(1);
        }


        $this->info(PHP_EOL);
        $this->info("<success>Ok</success>." . PHP_EOL);


        $virtualBin = $this->getVirtualBin();
        $this->info("The virtual bin looks like this: " . PHP_EOL);



        if ($virtualBin) {
            foreach ($virtualBin as $planetDot => $version) {
                $this->info("- $planetDot: $version" . PHP_EOL);
            }
            $this->info(PHP_EOL);


            $buildDir = $this->getBuildDir();
            $this->info("Importing virtual bin into build directory (<blue>$buildDir</blue>)..." . PHP_EOL);
            $this->moveVirtualBinToBuildDir();
            $errors = $this->getSessionErrors();

            $importToApp = true;
            if ($errors) {

                $this->info("<error>The buildDir is <blue>$buildDir</blue></error>" . PHP_EOL);
                $this->info("<error>The following errors occurred:</error>" . PHP_EOL);
                foreach ($errors as $error) {
                    $this->info('- <error>' . $error . '</error>' . PHP_EOL);
                }


                $msg = "<blue>Do you wish to continue and move the build dir in the app?</blue>" . PHP_EOL;
                $msg .= "    1. Yes" . PHP_EOL;
                $msg .= "    2. No" . PHP_EOL;


                $userResponse = "1";
                QuestionHelper::ask($output, $msg, function ($response) use (&$userResponse, $output) {
                    $userResponse = $response;
                    if (true === in_array($response, ['1', '2', 'y', 'Y', 'n', 'N'], true)) {
                        return true;
                    }
                    $output->write('<error>Invalid answer, try again.</error>' . PHP_EOL);
                    return false;
                });
                if (true === in_array($userResponse, ['2', 'n', 'N'])) {
                    $importToApp = false;
                }

            } else {
                $this->info("<success>Ok</success>." . PHP_EOL);
            }


            if (true === $importToApp) {

                $s = '';
                if (true === $install) {
                    $s .= ", with assets/map";
                }
                $this->info("Importing build directory to app (<blue>$appDir</blue>)$s..." . PHP_EOL);

                $errors = [];
                $planetDotNames = $this->importBuildDirToApp($errors, [
                    "install" => $install,
                ]);

                if ($errors) {
                    $this->info("<error>Oops, the process failed. You should find the error messages above</error>." . PHP_EOL);
                } else {
                    $this->info("<success>Ok</success>." . PHP_EOL);
                }


                //--------------------------------------------
                // POST ASSETS/MAP HOOKS
                //--------------------------------------------

                if (true === $install) {
                    if ($planetDotNames) {

                        $this->info("Checking for post assets/map hooks..." . PHP_EOL);

                        /**
                         * @var $pis LightPlanetInstallerService
                         */
                        $pis = $this->container->get("planet_installer");
                        foreach ($planetDotNames as $planetDotName) {
                            $planetInstaller = $pis->getInstallerInstance($planetDotName);
                            if (null !== $planetInstaller) {
                                $planetInstaller->onMapCopyAfter($this->applicationDir, $output);
                            }
                        }
                    }

                }


                if (true === $install) {

                    $lightScript = $this->applicationDir . "/scripts/Ling/Light_Cli/light-cli.php";

                    if ($planetDotNames) {
                        $this->info("Logic installing imported planets..." . PHP_EOL);
                        $sOptions = "";
                        if (
                            true === in_array("debug", $this->logLevels) ||
                            true === in_array("trace", $this->logLevels)
                        ) {
                            $sOptions = ' -d';
                        }

                        foreach ($planetDotNames as $planetDotName) {


                            $cmdOutput = [];
                            $cmdBuffer = '';
                            $resultCode = null;

                            if (true === $this->force) {
                                $sOptions .= ' -f';
                            }

                            exec('php -f "' . $lightScript . '" -- lpi logic_install "' . $planetDotName . '" ' . $sOptions, $cmdOutput, $resultCode);
                            if ($cmdOutput) {
                                $cmdBuffer = implode(PHP_EOL, $cmdOutput) . PHP_EOL;
                            }




                            if (0 !== $resultCode) {
                                $this->error("The logic install of planet $planetDotName failed: $cmdBuffer.");
                            }

                            if ($cmdOutput) {
                                $this->output->write($cmdBuffer);
                            }
                        }


                    } else {
                        $this->info("0 imported planets, nothing to logic install..." . PHP_EOL);
                    }
                }


            }
        } else {
            $this->info('(empty)' . PHP_EOL);
            $this->info('Nothing else to do.' . PHP_EOL);
        }

    }


    /**
     * Returns the virtualBin of this instance.
     *
     * @return array
     */
    public function getVirtualBin(): array
    {
        return $this->virtualBin;
    }


    /**
     * Returns the sessionErrors of this instance.
     *
     * @return array
     */
    public function getSessionErrors(): array
    {
        return $this->sessionErrors;
    }


    /**
     * Returns the path to the build dir.
     * @return string
     */
    public function getBuildDir(): string
    {
        if (null === $this->buildDir) {
            $this->buildDir = rtrim(sys_get_temp_dir(), '/') . "/universe/Ling/Light_PlanetInstaller/build";
        }
        return $this->buildDir;
    }

    /**
     * Moves the planets defined in the virtual bin to the build dir.
     *
     * @param array $options
     * @throws \Exception
     */
    public function moveVirtualBinToBuildDir(array $options = [])
    {


        $forceWeb = $options['forceWeb'] ?? false;

        $this->debug("Calling <blue>moveVirtualBinToBuildDir</blue>." . PHP_EOL);
        $nbItems = count($this->virtualBin);

        if ($this->virtualBin) {


            $buildDir = $this->getBuildDir();


            $this->trace("The virtual bin contains <blue>$nbItems</blue> items." . PHP_EOL);
            $loader = new LoaderUtil();
            $loader->setOutput($this->output);
            $loader->setNbTotalItems($nbItems);
            $loader->setDisplayMode('percent');
            $loader->start();


            $appRepo = null;
            if (null !== $this->applicationDir) {
                $appRepo = new LpiApplicationRepository();
                $appRepo->setAppDir($this->applicationDir);
            }
            $webRepo = new LpiWebRepository();
            $localUniRepo = new LpiLocalUniverseRepository();

            $warnings = [];
            foreach ($this->virtualBin as $planetDot => $version) {


                list($galaxy, $planet) = PlanetTool::extractPlanetDotName($planetDot);
                $dstDir = $buildDir . "/universe/$galaxy/$planet";

                $this->trace("Processing item <blue>$planetDot:$version</blue>" . PHP_EOL);


                //--------------------------------------------
                // FIRST TRY FROM APP
                //--------------------------------------------
                $planetFound = false;
                if (false === $this->force && null !== $appRepo && false === $forceWeb) {
                    if (true === $appRepo->hasPlanet($planetDot, $version)) {
                        $this->trace("Found in app, skipping." . PHP_EOL);
                        $planetFound = true;
                    }
                }


                //--------------------------------------------
                // IF NOT FOUND TRY FROM LOCAL UNIVERSE
                //--------------------------------------------
                if (false === $planetFound) {
                    if (true === $localUniRepo->hasPlanet($planetDot, $version)) {
                        $this->trace("Found in local universe, importing from local universe." . PHP_EOL);
                        $localUniRepo->copy($planetDot, $version, $dstDir, $warnings);
                        $this->handleCopyWarnings($warnings);
                        $planetFound = true;
                    }
                }

                //--------------------------------------------
                // IF NOT FOUND TRY FROM WEB
                //--------------------------------------------
                if (false === $planetFound) {
                    if (true === $webRepo->hasPlanet($planetDot, $version)) {
                        $this->trace("Found in web, importing from web." . PHP_EOL);
                        $webRepo->copy($planetDot, $version, $dstDir, $warnings);
                        $this->handleCopyWarnings($warnings);
                    } else {
                        $this->logError("Planet not found in web: <blue>$planetDot:$version</blue>" . PHP_EOL);
                    }
                }


                $loader->incrementBy(1);
            }
            $this->output->write(PHP_EOL); // carriage return after last loader incrementBy


        } else {
            $this->trace("The virtual bin contains <blue>$nbItems</blue> items, nothing to do." . PHP_EOL);
        }
    }


    /**
     * Imports the planets found in the build dir to the application dir, and returns the planet dot names that have been successfully imported.
     * The errors variable is filled, if errors occur.
     *
     *
     * Available options are:
     * - install: bool=false. If true, the assets/map of the planet(s) will be imported as well
     *
     *
     * @param array $errors
     * @param array $options
     * @return array
     * @throws \Exception
     */
    public function importBuildDirToApp(array &$errors = [], array $options = [])
    {

        $ret = [];
        $install = $options['install'] ?? false;


        $appDir = $this->applicationDir;
        $this->debug("Calling importBuildDirToApp." . PHP_EOL);
        $buildDir = $this->getBuildDir();
        $buildUniverseDir = $buildDir . "/universe";


        if (true === file_exists($buildUniverseDir)) {
            $planetDirs = PlanetTool::getPlanetDirs($buildUniverseDir);


            $nbItems = count($planetDirs);
            $loader = new LoaderUtil();
            $loader->setOutput($this->output);
            $loader->setNbTotalItems($nbItems);
            $loader->setDisplayMode('percent');
            $loader->start();


            if ($planetDirs) {


                foreach ($planetDirs as $planetDir) {


                    list($galaxy, $planet) = PlanetTool::getGalaxyNamePlanetNameByDir($planetDir);
                    $planetDotName = $galaxy . "." . $planet;


                    $version = PlanetTool::getVersionByPlanetDir($planetDir);
                    $this->trace("Processing $planetDotName:$version ($planetDir)." . PHP_EOL);

                    $appPlanetDir = $appDir . "/universe/$galaxy/$planet";
                    if (is_dir($appPlanetDir)) {


                        $appVersion = PlanetTool::getVersionByPlanetDir($appPlanetDir);
                        if (false === $this->force && $version === $appVersion) {
                            $this->trace("Planet already exists with same version in the app, skipping." . PHP_EOL);
                            $loader->incrementBy(1);
                            continue;
                        }


                        $this->trace("Removing planet from app." . PHP_EOL);
                        PlanetTool::removePlanet($planetDotName, $appDir);
                    }


                    $s = "without";
                    if (false === $install) {
                        $s = "with";
                    }
                    $s .= " assets/map";

                    try {
                        $this->trace("Importing from build to app, $s." . PHP_EOL);
                        PlanetTool::importPlanetByExternalDir($planetDotName, $planetDir, $appDir, [
                            "assets" => $install,
                        ]);
                        $ret[] = $planetDotName;
                    } catch (\Exception $e) {
                        $err = $e->getMessage();
                        $errors[] = $err;
                        $this->logError("An error occurred while trying to import $planetDotName:$version from build to app: $err." . PHP_EOL);
                        $this->trace("Exception detail: " . (string)$e . PHP_EOL);
                    }


                    $loader->incrementBy(1);
                }


                $this->output->write(PHP_EOL);
            }


            if (false === $this->keepBuild && true === empty($errors)) {
                FileSystemTool::remove($buildDir);
            }

        } else {
            $this->debug("universe dir not found in build (<blue>$buildUniverseDir</blue>)." . PHP_EOL);
        }
        return $ret;
    }

    /**
     * Display all the warnings to the output (if the conf allows it), and empties the warnings array.
     *
     * @param array $warnings
     */
    private function handleCopyWarnings(array &$warnings)
    {
        foreach ($warnings as $warning) {
            $this->warning($warning);
        }
        $warnings = [];
    }

    /**
     * Imports the given planet and its dependencies recursively to the virtual bin.
     *
     * The virtual bin is basically the planets we wish to import.
     * Whether it's feasible or not is another story.
     *
     *
     *
     * The outcome of this method depends on whether you set the applicationDir property in this class.
     * If set, this method will only import the planet (to the virtual bin) if they need to be updated in the target application.
     * So for instance if you call this method with planet Ling:Bat in version 1.292+ and the target application already
     * has Ling:Bat in version 1.296, the method will do nothing.
     * However, if your target application had Ling:Bat in version 1.200 (for instance), then the planet would be added to the virtual bin.
     *
     *
     *
     *
     * Available options are:
     * - force: whether to force the reimport of this planet, not recursively.
     *
     *
     * @param string $planetDot
     * @param string $versionExpr
     * @param array $options
     */
    public function importToVirtualBin(string $planetDot, string $versionExpr, array $options = [])
    {


        $force = $options['force'] ?? false;

        $this->debug("Calling importToVirtualBin: <blue>$planetDot:$versionExpr</blue>." . PHP_EOL);

        $isCli = CurrentProcessTool::isCli();
        if ('manual' === $this->bernoniMode && false === $isCli) {
            $this->error("Operation not permitted: bernoni manual mode in non-cli environment.");
        }


        $miniVersionExpression = $this->toMiniVersionExpression($planetDot, $versionExpr);


        //--------------------------------------------
        // WISHLIST CONFLICT?
        //--------------------------------------------
        $res = $this->adaptToWishlist($planetDot, $miniVersionExpression);
        if (false !== $res) {

            if ($res !== $miniVersionExpression) {
                $this->trace("Wishlist resolution from <blue>$planetDot:$miniVersionExpression</blue> to $res." . PHP_EOL);
                $miniVersionExpression = $res;
            }
        }

        if (true === array_key_exists($planetDot, $this->wishList)) {
            $versionToAddToVirtualBin = $miniVersionExpression;
            if (true === $this->planetExistsInVirtualBin($planetDot, $versionToAddToVirtualBin)) {
                $this->trace("The planet already exists in version $versionToAddToVirtualBin in the virtual bin, skipping" . PHP_EOL);
                $versionToAddToVirtualBin = null;
            } elseif (false === $force && true === $this->planetExistsInApp($planetDot, $versionToAddToVirtualBin)) {
                $this->trace("The planet already exists in version $versionToAddToVirtualBin in the app, skipping" . PHP_EOL);
                $versionToAddToVirtualBin = null;
            }

        } else {
            $versionToAddToVirtualBin = null;
            /**
             * Does the planet exist in virtual bin?
             */
            if (true === $this->planetExistsInVirtualBin($planetDot)) {
                $this->trace("The planet already exists in the virtual bin." . PHP_EOL);

                if (true === $this->hasConflict('bin', $planetDot, $miniVersionExpression, $versionToAddToVirtualBin)) {
                    $this->trace("Bernoni conflict found, resolved with <blue>$versionToAddToVirtualBin</blue>." . PHP_EOL);
                    /**
                     * If there was a conflict, now the $planetToAddToVirtualBin and $versionToAddToVirtualBin are set,
                     * so we do nothing more
                     */
                } else {
                    /**
                     * No conflict? and already in virtual bin, we do nothing.
                     */
                    $this->trace("No conflicts found, skipping." . PHP_EOL);
                }
            } else {
                $this->trace("The planet doesn't exist in the virtual bin." . PHP_EOL);
                // the planet doesn't exist in the bin
                if (false === $force && true === $this->planetExistsInApp($planetDot)) {
                    $this->trace("The planet already exists in the target application." . PHP_EOL);

                    if (true === $this->hasConflict('app', $planetDot, $miniVersionExpression, $versionToAddToVirtualBin)) {
                        /**
                         * If there was a conflict, now the $planetToAddToVirtualBin and $versionToAddToVirtualBin are set,
                         * so we do nothing more, it will be added to the bin
                         */
                        $this->trace("Bernoni conflict found, resolved with <blue>$versionToAddToVirtualBin</blue>." . PHP_EOL);
                    } else {
                        /**
                         * No conflict? not in virtual bin, but already in app, we do nothing
                         */
                        $this->trace("No conflicts found, skipping." . PHP_EOL);
                    }
                } else {
                    $this->trace("The planet doesn't exist in the application." . PHP_EOL);
                    /**
                     * The planet doesn't exist in the app, nor in the bin, we add it to the bin
                     */
                    $versionToAddToVirtualBin = $this->getVersionToInstallFromMiniVersionExpression($miniVersionExpression);
                }
            }
        }


        if (null !== $versionToAddToVirtualBin) {


            $wasAdded = $this->addToVirtualBin($planetDot, $versionToAddToVirtualBin);
            if (true === $wasAdded) {

                $this->trace("Checking for dependencies of planet $planetDot...");
                $dependencies = $this->getPlanetDependencies($planetDot, $versionToAddToVirtualBin);


                $nbDeps = count($dependencies);
                $this->trace("$nbDeps dependency(ies) found." . PHP_EOL);

                foreach ($dependencies as $dependencyItem) {

                    list($depPlanetDot, $depVersionExpr) = $dependencyItem;

                    $this->indentLevel++;
                    /**
                     * Note: force flag is not passed, we don't want recursion, at least for now
                     */
                    $this->importToVirtualBin($depPlanetDot, $depVersionExpr);
                    $this->indentLevel--;
                }
            }
        }


    }

    //--------------------------------------------
    //
    //--------------------------------------------

    /**
     * Returns whether the given planet dot exists in the virtual bin.
     * If the version is specified, also checks that the version number matches.
     *
     * @param string $planetDot
     * @param ?string $version
     * @return bool
     */
    private function planetExistsInVirtualBin(string $planetDot, string $version = null): bool
    {
        $binVersion = $this->virtualBin[$planetDot] ?? null;
        if (null === $binVersion) {
            return false;
        }
        if (null === $version) {
            return true;
        }
        return ($version === $binVersion);
    }


    /**
     * Returns whether the given planet dot exists in the defined app.
     * If the version is specified, also checks that the version number matches (and returns false if it doesn't).
     *
     * @param string $planetDot
     * @param ?string $version
     * @return bool
     */
    private function planetExistsInApp(string $planetDot, string $version = null): bool
    {
        $appVersion = $this->applicationPlanets[$planetDot] ?? null;
        if (null === $appVersion) {
            return false;
        }
        if (null === $version) {
            return true;
        }
        return ($version === $appVersion);
    }


    /**
     * Returns the dependencies for the given planet.
     *
     * First, the lpi style dependencies are tried, and if not defined, the uni style dependencies (with "last" keyword added are returned).
     *
     * It's an array of items, each of which being an array:
     *
     * - 0: planetDot
     * - 1: versionExpr
     *
     *
     *
     * @param string $planetDot
     * @param string $realVersion
     * @return array
     */
    private function getPlanetDependencies(string $planetDot, string $realVersion): array
    {

        $planetFullId = $planetDot . "." . $realVersion;
        if (false === array_key_exists($planetFullId, $this->planetDependencies)) {


            $onLpiDepsNotFoundUseUni = true;


            //--------------------------------------------
            // TRY FROM LOCAL UNIVERSE
            //--------------------------------------------
            $foundInLocalUniverse = false;
            $repository = new LpiLocalUniverseRepository();
            try {
                $dependencies = $repository->getDependencies($planetDot, $realVersion);
                $foundInLocalUniverse = true;
            } catch (LpiIncompatibleException $e) {
                if (true === $onLpiDepsNotFoundUseUni) {
                    $__dependencies = $repository->getUniDependencies($planetDot, $realVersion);
                    $dependencies = [];
                    foreach ($__dependencies as $pdot) {
                        $dependencies[] = [
                            $pdot,
                            "last",
                        ];
                    }
                    $foundInLocalUniverse = true;
                } else {
                    throw $e;
                }
            }


            //--------------------------------------------
            // TRY FROM WEB
            //--------------------------------------------
            if (false === $foundInLocalUniverse) {
                $repository = new LpiWebRepository();
                try {
                    $dependencies = $repository->getDependencies($planetDot, $realVersion);
                } catch (LpiIncompatibleException $e) {
                    if (true === $onLpiDepsNotFoundUseUni) {
                        $__dependencies = $repository->getUniDependencies($planetDot, $realVersion);
                        $dependencies = [];
                        foreach ($__dependencies as $pdot) {
                            $dependencies[] = [
                                $pdot,
                                "last",
                            ];
                        }
                    } else {
                        throw $e;
                    }
                }
            }


            $this->planetDependencies[$planetFullId] = $dependencies;
        }
        return $this->planetDependencies[$planetFullId];
    }

    /**
     * Adds the given planet to the virtual bin and returns if the planet was actually added.
     * False means that the planet was already in the bin (and therefore was not added).
     *
     * @param string $planetDot
     * @param string $realVersion
     * @return bool
     */
    private function addToVirtualBin(string $planetDot, string $realVersion): bool
    {
        $existing = $this->virtualBin[$planetDot] ?? null;
        if ($realVersion !== $existing) {
            $this->virtualBin[$planetDot] = $realVersion;
            $this->trace("Adding planet to virtual bin: <blue>$planetDot:$realVersion</blue>." . PHP_EOL);
            return true;
        }
        return false;
    }

    /**
     * Returns the real version equivalent of the given mini version expression.
     *
     * @param string $miniVersionExpression
     * @return string
     */
    private function getVersionToInstallFromMiniVersionExpression(string $miniVersionExpression): string
    {
        return rtrim($miniVersionExpression, '+');
    }


    /**
     * Tests whether the given mini version expression is defined in the wishlist, and returns either false, or the adapted version.
     * False is returned if the given planet is not defined in the wishlist.
     * Otherwise, this method returns the adapted absolute version number that fits the wishlist.
     * If the wishlist defines an absolute version number, the isAbsolute flag is raised to true.
     *
     * The $wishMiniVersionExpr variable is set to the wishlist mini version expression if defined, or stays null otherwise.
     *
     *
     *
     * @param string $planetDot
     * @param string $miniVersionExpr
     * @param ?string $wishMiniVersionExpr
     * @return false|string
     */
    private function adaptToWishlist(string $planetDot, string $miniVersionExpr, string &$wishMiniVersionExpr = null)
    {
        $versionToAddToVirtualBin = false;
        if (true === array_key_exists($planetDot, $this->wishList)) {
            $adaptedVersionNumber = null;
            $wishMiniVersionExpr = $this->wishList[$planetDot];
            list($absVersion, $modifierSymbol) = LpiVersionHelper::extractMiniVersion($miniVersionExpr);
            list($wishAbsVersion, $wishModifierSymbol) = LpiVersionHelper::extractMiniVersion($wishMiniVersionExpr);


            $testAbsVersion = $absVersion;
            $testWishAbsVersion = $wishAbsVersion;

            LpiVersionHelper::equalizeVersionNumbers($testAbsVersion, $testWishAbsVersion);


            if (null === $wishModifierSymbol) {
                /**
                 * If there is no modifier symbol, the version number in the wish list is absolute, no negotiation.
                 */
                $versionToAddToVirtualBin = $wishAbsVersion;

            } else {
                if (true === LpiVersionHelper::isPolaritySymbol($wishModifierSymbol)) {
                    if ('+' === $wishModifierSymbol) {
                        if (null === $modifierSymbol || true === LpiVersionHelper::isPolaritySymbol($modifierSymbol)) {
                            /**
                             * c: challenger, w: wish
                             *
                             * w: 1.2.0+
                             * - c: 1.2.0- -> 1.2.0
                             * - c: 1.4.0- -> 1.4.0
                             * - c: 1.1.0- -> 1.2.0
                             *
                             *
                             * Note: whatever the polaritySymbol of the challenger is doesn't matter,
                             * only the wish version polarity symbol matters, by definition, since it's defined by the user.
                             *
                             */
                            if ($testAbsVersion >= $testWishAbsVersion) {
                                $versionToAddToVirtualBin = $absVersion;
                            } else {
                                $versionToAddToVirtualBin = $wishAbsVersion;
                            }
                        } else {
                            $this->error("Not handled yet, with modifier symbol not a polarity symbol ($modifierSymbol given), for $planetDot:$miniVersionExpr.");
                        }
                    } else {
                        if (null === $modifierSymbol || true === LpiVersionHelper::isPolaritySymbol($modifierSymbol)) {
                            /**
                             * c: challenger, w: wish
                             *
                             * w: 1.2.0-
                             * - c: 1.2.0+ -> 1.2.0
                             * - c: 1.4.0+ -> 1.2.0
                             * - c: 1.1.0+ -> 1.2.0
                             *
                             *
                             * Note: whatever the polaritySymbol of the challenger is doesn't matter,
                             * only the wish version polarity symbol matters, by definition, since it's defined by the user.
                             *
                             */
                            if ($testAbsVersion <= $testWishAbsVersion) {
                                $versionToAddToVirtualBin = $absVersion;
                            } else {
                                $versionToAddToVirtualBin = $wishAbsVersion;
                            }
                        } else {
                            $this->error("Not handled yet, with modifier symbol not a polarity symbol ($modifierSymbol given), for $planetDot:$miniVersionExpr.");
                        }
                    }

                } else {
                    $this->error("Not handled yet, with modifier symbol not a polarity symbol ($wishModifierSymbol given), for $planetDot in the wishlist.");
                }
            }


        }
        return $versionToAddToVirtualBin;
    }

    /**
     * Returns whether there is a conflict between the given planet and the one in the bin.
     * If there is no matching planet in the bin, false is returned.
     *
     * In case of conflict, the variable $versionToAddToVirtualBin is filled with the value which solves the conflict.
     * The conflict is the bernoni conflict, which is explained in more details in our conception notes.
     *
     *
     *
     *
     * @param string $locationId
     * @param string $planetDot
     * @param string $miniVersionExpr
     * @param string|null $versionToAddToVirtualBin
     * @return bool
     */
    private function hasConflict(string $locationId, string $planetDot, string $miniVersionExpr, string &$versionToAddToVirtualBin = null): bool
    {
        if ('bin' === $locationId) {
            $store = $this->virtualBin;
        } else {
            $store = $this->applicationPlanets;
        }


        if (false === array_key_exists($planetDot, $store)) {
            return false;
        }
        $existingVersion = $store[$planetDot];

        if ($miniVersionExpr === $existingVersion) {
            return false;
        }


        //--------------------------------------------
        // BERNONI DETECTION
        //--------------------------------------------
        $bernoniId = $this->getBernoniId($planetDot, $existingVersion, $miniVersionExpr);
        if (array_key_exists($bernoniId, $this->bernoniMemory)) {
            $versionToAddToVirtualBin = $this->bernoniMemory[$bernoniId];
            return true;
        }


        $highestVersion = null;
        if (true === LpiVersionHelper::versionMeetsExpectations($existingVersion, $miniVersionExpr, $highestVersion)) {
            return false;
        } else {

            $highestVersion = $this->getVersionToInstallFromMiniVersionExpression($highestVersion);

            //--------------------------------------------
            // BERNONI CONFLICT RESOLUTION
            //--------------------------------------------
            if ('auto' === $this->bernoniMode) {
                $versionToAddToVirtualBin = $highestVersion;
                $this->trace("Bernoni conflict in $locationId: <b>$planetDot</b> $existingVersion vs $miniVersionExpr, automatically resolved to <b>$versionToAddToVirtualBin</b>." . PHP_EOL);

            } else {
                $msg = "<blue>A bernoni conflict occurred in $locationId for planet <b>$planetDot</b>, please choose the version you prefer:</blue>" . PHP_EOL;
                $msg .= "    1. $planetDot:$existingVersion" . PHP_EOL;
                $msg .= "    2. $planetDot:$miniVersionExpr" . PHP_EOL;


                $userResponse = "1";
                QuestionHelper::ask($this->output, $msg, function ($response) use (&$userResponse) {
                    $userResponse = $response;
                    if (true === in_array($response, ['1', '2'], true)) {
                        return true;
                    }
                    $this->output->write('<error>Invalid answer, try again.</error>' . PHP_EOL);
                    return false;
                });
                if ('2' === $userResponse) {
                    $versionToAddToVirtualBin = $highestVersion;
                } else {
                    $versionToAddToVirtualBin = $existingVersion;
                }
            }


            $this->bernoniMemory[$bernoniId] = $versionToAddToVirtualBin;
            return true;
        }


    }


    /**
     * Returns a bernoni id.
     *
     * @param string $planetDot
     * @param string $v1
     * @param string $v2
     * @return string
     */
    private function getBernoniId(string $planetDot, string $v1, string $v2): string
    {
        $versions = [$v1, $v2];
        sort($versions);
        return $planetDot . ":" . implode(":", $versions);
    }


    /**
     * Returns the mini version of the given version expression.
     *
     * @param string $planetDot
     * @param string $versionExpr
     * @return string
     */
    private function toMiniVersionExpression(string $planetDot, string $versionExpr): string
    {
        if ('last' === $versionExpr) {
            if (false === array_key_exists($planetDot, $this->lastPlanets)) {

                $foundInLocal = false;
                if (true === LpiConfHelper::getLocalUniverseHasLast() && true === LpiLocalUniverseHelper::hasPlanet($planetDot)) {

                    $this->lastPlanets[$planetDot] = LpiLocalUniverseHelper::getVersion($planetDot);
                    $foundInLocal = true;
                }

                if (false === $foundInLocal) {
                    $this->lastPlanets[$planetDot] = LpiWebHelper::getPlanetCurrentVersion($planetDot);
                }
            }
            return $this->lastPlanets[$planetDot];
        }
        return $versionExpr;
    }


    /**
     * Prints a debug message to the console, if the configuration allows it.
     * @param string $msg
     */
    private function debug(string $msg)
    {
        if (true === in_array('debug', $this->logLevels)) {
            $this->write($msg);
        }
    }


    /**
     * Prints a trace message to the console, if the configuration allows it.
     * @param string $msg
     */
    private function trace(string $msg)
    {
        if (true === in_array('trace', $this->logLevels)) {
            $this->write('(trace): ' . $msg);
        }
    }

    /**
     * Prints a info message to the console, if the configuration allows it.
     * @param string $msg
     */
    private function info(string $msg)
    {
        if (true === in_array('info', $this->logLevels)) {
            $this->write($msg);
        }
    }


    /**
     * Prints an error message to the console, if the configuration allows it.
     * @param string $msg
     */
    private function logError(string $msg)
    {
        if (true === in_array('error', $this->logLevels)) {
            $this->write('<error>' . $msg . '</error>');
            $this->sessionErrors[] = $msg;
        }
    }


    /**
     * Prints a warning message to the console, if the configuration allows it.
     * @param string $msg
     */
    private function warning(string $msg)
    {
        if (true === in_array('warning', $this->logLevels)) {
            $this->write('<warning>' . $msg . "</warning>" . PHP_EOL);
        }
    }


    /**
     * Writes a message to the output.
     *
     * This method handles internal indentation.
     *
     * @param string $msg
     */
    private function write(string $msg)
    {
        $sPrefix = str_repeat($this->indentSymbol, $this->indentLevel * 6);
        if ('' !== trim($sPrefix)) {
            $sPrefix .= ' ';
        }


        $this->output->write($sPrefix . $msg);
    }


    /**
     * Returns the given wishlist, converting version expressions to mini version expressions.
     *
     * @param array $wishlist
     * @return array
     */
    private function prepareWishlist(array $wishlist): array
    {
        $ret = [];
        foreach ($wishlist as $planetDot => $versionExpr) {
            $ret[$planetDot] = $this->toMiniVersionExpression($planetDot, $versionExpr);
        }
        return $ret;
    }

    /**
     * Initializes the utility before usage.
     */
    private function init()
    {

        $this->virtualBin = [];
        $this->sessionErrors = [];
        $this->indentLevel = 0;

        //--------------------------------------------
        // INITIALIZE PLANETS FROM APP
        //--------------------------------------------
        $this->applicationPlanets = [];
        if (null !== $this->applicationDir) {
            /**
             * Get all the application planets in memory (faster to work with)
             */
            $applicationUniverseDir = $this->applicationDir . "/universe";
            if (true === is_dir($applicationUniverseDir)) {
                $this->applicationPlanets = LpiPlanetHelper::getPlanetsVersionsByUniverseDir($applicationUniverseDir);
            }
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
        throw new LightPlanetInstallerException($msg, $code);
    }

}