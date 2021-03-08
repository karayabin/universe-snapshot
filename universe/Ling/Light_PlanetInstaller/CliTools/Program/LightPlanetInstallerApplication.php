<?php


namespace Ling\Light_PlanetInstaller\CliTools\Program;

use Exception;
use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\FileSystemTool;
use Ling\CliTools\Command\CommandInterface;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\CliTools\Util\LoaderUtil;
use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light_Cli\CliTools\Program\LightCliBaseApplication;
use Ling\Light_Logger\LightLoggerService;
use Ling\Light_PlanetInstaller\CliTools\Command\LightPlanetInstallerBaseCommand;
use Ling\Light_PlanetInstaller\Exception\LightPlanetInstallerException;
use Ling\Light_PlanetInstaller\Helper\LpiConfHelper;
use Ling\Light_PlanetInstaller\Helper\LpiVersionHelper;
use Ling\Light_PlanetInstaller\Helper\LpiWebHelper;
use Ling\Light_PlanetInstaller\Util\PlanetImportProcessUtil;
use Ling\UniverseTools\MetaInfoTool;
use Ling\UniverseTools\PlanetTool;

/**
 * The LightPlanetInstallerApplication class.
 *
 *
 * Nomenclature
 * ----------------
 *
 * ### planetInfo
 * The planetInfo array is an array with the following structure:
 *
 * - 0: planet path     (string)
 * - 1: galaxy name     (string)
 * - 2: planet name     (string)
 * - 3: real version number  (string)
 *
 *
 *
 */
class LightPlanetInstallerApplication extends LightCliBaseApplication
{


    /**
     * This property holds the currentDirectory when this instance was first instantiated.
     * @var string
     */
    protected $currentDirectory;

    /**
     * This property holds the current output for this instance.
     *
     * It's set by a command when the command is executed.
     *
     * @var OutputInterface
     */
    protected $currentOutput;


    /**
     * This property holds the devMode for this instance.
     * In dev mode, exceptions trace are displayed directly in the console output.
     *
     *
     * @var bool
     */
    protected $devMode;

    /**
     * This property holds the notFoundPlanets for this instance.
     * @var array
     */
    protected $notFoundPlanets;


    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();

        $this->currentOutput = null;
        $this->currentDirectory = getcwd();


        $this->devMode = false;

        $this->registerCommand("Ling\Light_PlanetInstaller\CliTools\Command\BuildCommand", "build");
        $this->registerCommand("Ling\Light_PlanetInstaller\CliTools\Command\OpenConfCommand", "conf");
        $this->registerCommand("Ling\Light_PlanetInstaller\CliTools\Command\DependencyCommand", "deps");
        $this->registerCommand("Ling\Light_PlanetInstaller\CliTools\Command\HelpCommand", "help");
        $this->registerCommand("Ling\Light_PlanetInstaller\CliTools\Command\ImportCommand", "import");
        $this->registerCommand("Ling\Light_PlanetInstaller\CliTools\Command\InstallCommand", "install");
        $this->registerCommand("Ling\Light_PlanetInstaller\CliTools\Command\LogicInstallCommand", "logic_install");
        $this->registerCommand("Ling\Light_PlanetInstaller\CliTools\Command\PostMapCommand", "post_map");
        $this->registerCommand("Ling\Light_PlanetInstaller\CliTools\Command\ReImportAppPlanetsCommand", "reimport");
        $this->registerCommand("Ling\Light_PlanetInstaller\CliTools\Command\RemoveCommand", "remove");
        $this->registerCommand("Ling\Light_PlanetInstaller\CliTools\Command\ToDirCommand", "todir");
        $this->registerCommand("Ling\Light_PlanetInstaller\CliTools\Command\ToLinkCommand", "tolink");
        $this->registerCommand("Ling\Light_PlanetInstaller\CliTools\Command\UninstallCommand", "uninstall");
        $this->registerCommand("Ling\Light_PlanetInstaller\CliTools\Command\UpgradeCommand", "upgrade");
        $this->registerCommand("Ling\Light_PlanetInstaller\CliTools\Command\VersionCommand", "version");


        $this->notFoundPlanets = [];
    }



    //--------------------------------------------
    // LightCliBaseApplication
    //--------------------------------------------
    /**
     * @implementation
     */
    public function getAppId(): string
    {
        return 'lpi';
    }





    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @overrides
     */
    protected function runProgram(InputInterface $input, OutputInterface $output): int|null
    {
        if (true === $input->hasFlag('dev')) {
            $this->devMode = true;
        }
        return parent::runProgram($input, $output);
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns whether there is a lpi file in the current application.
     * This command assumes that the user is located at the root of the application.
     *
     * Available options are:
     * - appDir: string=null, the app directory to use. If null, defaults to the current directory.
     *
     *
     *
     * @param array $options
     * @return bool
     */
    public function hasLpiFile(array $options = []): bool
    {
        $lpiFile = $this->getLpiPath($options);
        return file_exists($lpiFile);
    }

    /**
     * Sets the currentOutput.
     *
     * @param OutputInterface $currentOutput
     */
    public function setCurrentOutput(OutputInterface $currentOutput)
    {
        $this->currentOutput = $currentOutput;
    }

    /**
     * Returns the currentOutput of this instance.
     *
     * @return OutputInterface
     */
    public function getCurrentOutput(): OutputInterface
    {
        return $this->currentOutput;
    }


    /**
     * Adds/replaces the planets of the given list to the lpi file.
     * The given planet list is an array of planetDotName => versionExpr.
     *
     * Sorts the planet alphabetically.
     *
     *
     * @param array $planetList
     */
    public function addPlanetListToLpiFile(array $planetList)
    {
        $lpiFile = $this->getLpiPath();
        $arr = [];
        if (true === file_exists($lpiFile)) {
            $arr = BabyYamlUtil::readFile($lpiFile);
            $planetItems = $arr['planets'] ?? [];
            $planetItems = array_merge($planetItems, $planetList);
            $arr['planets'] = $planetItems;
        } else {
            $arr['planets'] = $planetList;
        }


        // sort the planets
        $planetItems = $arr['planets'];
        ksort($planetItems);
        $arr['planets'] = $planetItems;

        BabyYamlUtil::writeFile($arr, $lpiFile);
    }


    /**
     * Removes a planet from the lpi file.
     * @param string $planetDotName
     */
    public function removePlanetFromLpiFile(string $planetDotName)
    {
        $lpiFile = $this->getLpiPath();
        if (true === file_exists($lpiFile)) {
            $arr = BabyYamlUtil::readFile($lpiFile);
            $planetItems = $arr['planets'] ?? [];
            if (true === array_key_exists($planetDotName, $planetItems)) {
                unset($planetItems[$planetDotName]);
                $arr['planets'] = $planetItems;
                BabyYamlUtil::writeFile($arr, $lpiFile);
            }
        }
    }

    /**
     * Creates the lpi file for this application if it doesn't exist yet.
     * If the file already exists, it will do nothing by default.
     *
     * This command assumes that the user is located at the root of the application.
     *
     * Available options are:
     * - skipIfExist: bool=true. If false, the file will be updated if it exists. If true (by default) the file is ignored.
     *
     *
     * @param array $options
     */
    public function createLpiFile(array $options = [])
    {

        $skipIfExist = $options['skipIfExist'] ?? true;


        $lpiFile = $this->getLpiPath();

        if (false === $skipIfExist || false === file_exists($lpiFile)) {


            $planetsInfo = $this->getPlanetsInfo();


            $nbItems = count($planetsInfo);
            $loader = new LoaderUtil();
            $loader->setOutput($this->currentOutput);
            $loader->setNbTotalItems($nbItems);


            $loader->start();


            $planetItems = [];

            foreach ($planetsInfo as $planetInfo) {

                list($planetPath, $galaxy, $planet, $version) = $planetInfo;
                $planetItems[$galaxy . "." . $planet] = $version . "+";
                $loader->incrementBy(1);
            }

            //--------------------------------------------
            // CREATING THE LPI FILE
            //--------------------------------------------
            BabyYamlUtil::writeFile([
                'planets' => $planetItems,
            ], $lpiFile);

        }
    }

    /**
     * Returns the path where the lpi file is supposed to be.
     *
     * Available options are:
     * - appDir: string=null, the directory of the application to use. If null, defaults to the current directory.
     *
     *
     *
     * @param array $options
     * @return string
     */
    public function getLpiPath(array $options = []): string
    {
        $appDir = $options['appDir'] ?? null;
        if (null === $appDir) {
            $appDir = $this->currentDirectory;
        }
        return $appDir . "/lpi.byml";
    }


    /**
     * Returns the path to the application's universe directory
     * @return string
     */
    public function getUniversePath(): string
    {
        return $this->currentDirectory . "/universe";
    }

    /**
     * Returns the currentDirectory of this instance.
     *
     * @return string
     */
    public function getCurrentDirectory()
    {
        return $this->currentDirectory;
    }


    /**
     * Returns the application directory, which should be the current directory.
     *
     * @return string
     */
    public function getApplicationDirectory()
    {
        return $this->getCurrentDirectory();
    }


    /**
     * Copies the given planet directory and its content to the global directory, in a directory named after the given $galaxy, $planet and $version.
     *
     * @param string $planetPath
     * @param string $galaxy
     * @param string $planet
     * @param string $version
     */
    public function copyToGlobalDir(string $planetPath, string $galaxy, string $planet, string $version)
    {
        $globalDir = LpiConfHelper::getGlobalDirPath();
        $newDir = $globalDir . "/" . "$galaxy.$planet.$version";
        if (false === is_dir($newDir)) {
            FileSystemTool::copyDir($planetPath, $newDir);
        }
    }


    /**
     * Returns the list of elements to update in the current app, based on their definition in the lpi file.
     *
     * Basically, when an element is defined in the lpi file and does not have an exact correspondence in the app, it's added to the returned list.
     *
     * The returned list is an array of @page(planet dot name) => versionExpression
     *
     * The versionExpression is defined in the @page(Light_PlanetInstaller conception notes).
     *
     * Available options are:
     * - appDir: string=null, the application dir to use. If null, defaults to the current directory.
     *
     *
     *
     * @param array $options
     * @return array
     */
    public function lpiDiff(array $options = []): array
    {
        $appDir = $options['appDir'] ?? null;
        if (null === $appDir) {
            $appDir = $this->currentDirectory;
        }


        $diff = [];
        $planetsInfoLpi = $this->getPlanetsInfoFromLpi([
            'appDir' => $appDir,
        ]);


        // optimizing for comparison
        $planetsInfoApp = $this->getPlanetsInfo([
            "appDir" => $appDir,
        ]);
        $appArr = [];
        foreach ($planetsInfoApp as $item) {
            list($planetPath, $galaxy, $planet, $version) = $item;
            $appArr[$galaxy . "." . $planet] = $version;
        }

        foreach ($planetsInfoLpi as $planetDot => $versionExpr) {
            $versionExpr = (string)$versionExpr;


            $addToDiff = false;


            if (false === array_key_exists($planetDot, $appArr)) {
                $addToDiff = true;
            } else {

                $planetCurrentVersion = (string)$appArr[$planetDot];

                switch ($versionExpr) {
                    case "last":
                        $planetWebVersion = LpiWebHelper::getPlanetCurrentVersion($planetDot);
                        if ($planetWebVersion !== $planetCurrentVersion) {
                            $addToDiff = true;
                        }
                        break;
                    default:

                        if (true === LpiVersionHelper::isPlus($versionExpr)) {
                            $desiredMinVersion = LpiVersionHelper::removeModifierSymbol($versionExpr);
                            if ($desiredMinVersion > $planetCurrentVersion) {
                                $addToDiff = true;
                            } else {
                                /**
                                 * The planet in the current app has already a bigger or equal version number, so it's ok we do nothing
                                 */
                            }

                        } elseif (true === LpiVersionHelper::isMinus($versionExpr)) {
                            $desiredMaxVersion = LpiVersionHelper::removeModifierSymbol($versionExpr);
                            if ($desiredMaxVersion < $planetCurrentVersion) {
                                $addToDiff = true;
                            } else {
                                /**
                                 * The planet in the current app has already a lower or equal version number, so it's ok we do nothing
                                 */
                            }

                        } elseif ($versionExpr !== $appArr[$planetDot]) {
                            $addToDiff = true;
                        }

                        break;
                }


            }


            if (true === $addToDiff) {
                $diff[$planetDot] = $versionExpr;
            }
        }

        return $diff;
    }


    /**
     * Updates the application planets using the lpi file as a reference, and fills the virtualBin array.
     *
     * Available options are:
     * - mode: string(import|install)=import. Whether to use import or install for each planet.
     * - appDir: string|null = null, the target application directory where to import/install the plugin(s).
     *      If null, the current directory will be used (assuming the user called this command from the target app's root dir).
     * - keepBuild: bool=false, whether to remove the build dir after the process is successfully executed.
     *      Beware that setting this to true can cause problems can interfere with the execution of the script, use
     *      this only if you know what you are doing.
     * - useDebug: bool=false. If true, all log levels are displayed to the screen.
     * - source: mixed. The source to use as the wishlist. Can be either the keyword "lpi", or a string representing the planetDefinition.
     *      The planetDefinition is: $planetDotName(:$versionExpr=last)?
     * - force: bool=false. Whether to force the reimport/reinstall
     * - symlinks: bool=false, whether to use symlinks to the local universe when available, instead of copying planet dirs.
     *
     *
     * @param array $options
     * @param array $virtualBin
     */
    public function updateApplicationByWishlist(array $options = [], array &$virtualBin = [])
    {
        $source = $options['source'] ?? 'lpi';
        $mode = $options['mode'] ?? 'import';
        $appDir = $options['appDir'] ?? null;
        $bernoni = $options['bernoni'] ?? 'auto';
        $keepBuild = $options['keepBuild'] ?? false;
        $useDebug = $options['useDebug'] ?? false;
        $useSymlinks = $options['symlinks'] ?? false;
        $force = $options['force'] ?? false;


        if (null === $appDir) {
            $appDir = $this->currentDirectory;
        }

        $this->useNotFoundPlanets();
        $output = $this->currentOutput;

        //--------------------------------------------
        // DEFINING THE WISHLIST
        //--------------------------------------------
        if ('lpi' === $source) {
            $wishlist = $this->lpiDiff([
                "appDir" => $appDir,
            ]);
        } else {

            $updateLpiFile = true;
            $planetDefinition = $source;
            $p = explode(':', $planetDefinition, 2);
            if (1 === count($p)) {
                $planetDotName = $p[0];
                $versionExpr = 'last';
            } else {
                list($planetDotName, $versionExpr) = $p;
            }
            $wishlist = [
                $planetDotName => $versionExpr,
            ];
        }


        //--------------------------------------------
        // EXECUTING THE OPERATION
        //--------------------------------------------
        $u = new PlanetImportProcessUtil();
        if (true === $useDebug) {
            $u->setLogLevels(['debug', 'trace', 'info', 'warning', 'error']);
        }
        $u->setContainer($this->container);
        $u->setOutput($output);
        $u->updateApplicationByWishList($appDir, $wishlist, [
            'force' => $force,
            'bernoniMode' => $bernoni,
            'keepBuild' => $keepBuild,
            'operationMode' => $mode,
            'symlinks' => $useSymlinks,
        ]);
        $virtualBin = $u->getVirtualBin();

    }


    /**
     * Writes an error message to the log, and prints it to the output too.
     *
     *
     * @param string|Exception $error
     * @throws \Exception
     *
     */
    public function logError($error)
    {
        if ($error instanceof \Exception) {
            $errorLog = date("Y-m-d H:i:s") . " - " . $error; // we want the full trace in the log
            $errorOutput = $error->getMessage();
            if (true === $this->devMode) {
                $errorOutput .= PHP_EOL . PHP_EOL . $error->getTraceAsString();
            }

        } else {
            $error = date("Y-m-d H:i:s") . " - " . $error;
            $errorLog = $errorOutput = $error;
        }


        if ($this->container->has('logger')) {
            /**
             * @var $lg LightLoggerService
             */
            $lg = $this->container->get("logger");
            $lg->log($errorLog, "lpi_error");
        }

        $this->currentOutput->write(PHP_EOL . '<error>' . $errorOutput . '</error>' . PHP_EOL);
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @overrides
     */
    protected function onCommandInstantiated(CommandInterface $command)
    {
        if ($command instanceof LightServiceContainerAwareInterface) {
            $command->setContainer($this->container);
        }
        if ($command instanceof LightPlanetInstallerBaseCommand) {
            $command->setApplication($this);
        } else {
            throw new LightPlanetInstallerException("All commands must inherit LightPlanetInstallerBaseCommand.");
        }
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Throws an exception.
     *
     * @param string $msg
     * @param int|null $code
     * @throws \Exception
     */
    private function error(string $msg, int $code = null)
    {
        throw new LightPlanetInstallerException($msg, $code);
    }


    /**
     * Returns an array of items containing information about the planets of the current app.
     * Each item is a planetInfo array (see this class' top comment for more details).
     *
     * Available options are:
     * - appDir: string=null, the application directory to use. If null, defaults to the current directory.
     *
     *
     * @param array $options
     * @return array
     */
    private function getPlanetsInfo(array $options = []): array
    {
        $appDir = $options['appDir'] ?? null;
        if (null === $appDir) {
            $appDir = $this->currentDirectory;
        }


        $planetsInfo = [];
        $universeDir = $appDir . "/universe";
        if (true === is_dir($universeDir)) {
            $planets = PlanetTool::getPlanetDirs($universeDir);
            foreach ($planets as $planetPath) {
                $version = MetaInfoTool::getVersion($planetPath);
                if (false === empty($version)) {
                    list($galaxy, $planet) = PlanetTool::getGalaxyNamePlanetNameByDir($planetPath);
                    $planetsInfo[] = [
                        $planetPath,
                        $galaxy,
                        $planet,
                        $version,
                    ];
                } else {
                    /**
                     * If the version is null, it's probably a test or temporary planet created by the user.
                     * If it doesn't have a version number yet, we just ignore it.
                     */
                }
            }
        } else {
            /**
             * If the universe dir doesn't exist, maybe it's a new project, in which case it makes sense to have an empty lpi file.
             */
        }
        return $planetsInfo;
    }


    /**
     * Returns an array of @page(planet dot name) => versionExpression contained in the lpi.byml file.
     *
     * If the lpi file doesn't exist, an exception is thrown.
     *
     * The versionExpression is defined in the @page(Light_PlanetInstaller conception notes).
     *
     * Available options are:
     * - appDir: string=null, the application directory to use. If null, defaults to the current directory.
     *
     *
     *
     * @param array $options
     * @return array
     */
    private function getPlanetsInfoFromLpi(array $options = []): array
    {
        $appDir = $options['appDir'] ?? null;
        if (null === $appDir) {
            $appDir = $this->currentDirectory;
        }


        $lpiFile = $this->getLpiPath([
            'appDir' => $appDir,
        ]);
        if (false === file_exists($lpiFile)) {
            return [];
        }

        $arr = BabyYamlUtil::readFile($lpiFile);
        return $arr['planets'] ?? [];
    }


    /**
     * Returns the number of items defined in the planets section of the lpi file.
     *
     *
     * @return int
     */
    private function countPlanetsFromLpi(): int
    {
        $lpiFile = $this->getLpiPath();
        if (false === file_exists($lpiFile)) {
            return 0;
        }
        $arr = BabyYamlUtil::readFile($lpiFile);
        $planets = $arr['planets'] ?? [];
        return count($planets);
    }


    /**
     * Resets the notFoundPlanets array
     */
    private function useNotFoundPlanets()
    {
        $this->notFoundPlanets = [];
    }


    /**
     * Adds the given planet to the list of not found planets.
     *
     * @param string $planetDot
     * @param string $versionExpr
     */
    private function addNotFoundPlanet(string $planetDot, string $versionExpr)
    {
        $this->notFoundPlanets[] = $planetDot . ":" . $versionExpr;
    }


    /**
     * Outputs the list of not found planets.
     */
    private function displayNotFoundPlanetList()
    {
        if ($this->notFoundPlanets) {
            $output = $this->currentOutput;
            $f1 = 'error';


            $output->write("<$f1>The following planets were not found:</$f1>" . PHP_EOL);
            foreach ($this->notFoundPlanets as $line) {
                list($planetDot, $versionExpr) = explode(':', $line);
                $output->write(substr(" ", 4) . "- <$f1>" . $planetDot . " " . $versionExpr . '</$f1>' . PHP_EOL);
            }
        }
    }
}