<?php


namespace Ling\Uni2\Application;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\BDotTool;
use Ling\Bat\FileSystemTool;
use Ling\CliTools\Command\CommandInterface;
use Ling\CliTools\Input\ArrayInput;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\CliTools\Program\Application;
use Ling\Octopus\Exception\OctopusServiceErrorException;
use Ling\Octopus\ServiceContainer\OctopusServiceContainerInterface;
use Ling\Octopus\ServiceContainer\RedOctopusServiceContainer;
use Ling\Uni2\Command\UniToolGenericCommand;
use Ling\Uni2\Exception\Uni2Exception;
use Ling\Uni2\Helper\OutputHelper as H;
use Ling\Uni2\LocalServer\LocalServer;


/**
 * The UniToolApplication class.
 * This is the console @object(Application) of the uni tool.
 *
 *
 * It has the following commands:
 *
 * - listplanet: lists the planets in the current application, optionally with their version number.
 * - version: shows the current version of this Uni2 planet.
 * - conf: displays the uni tool configuration, or updates the configuration values.
 * - confpath: displays the uni tool's configuration path
 *
 *
 *
 * The following options apply at this application level and can be passed via the @concept(command-line):
 *
 * Options:
 * - --application-dir: the path to the application dir to use. The default value is the current directory.
 * - --universe-dir-name: the name of the universe directory (by default: universe).
 *
 *
 *
 *
 * The uni-tool info file
 * -----------------------
 * The uni-tool info file contains internal information about the uni-tool state.
 * It contains the following data:
 *
 * - last_update: string|null. The date (mysql format) when the uni tool was last updated (with the upgrade command).
 *
 *
 * This information is used internally and shouldn't be edited manually (unless you do exactly what you are doing).
 *
 *
 *
 *
 */
class UniToolApplication extends Application
{


    /**
     * This property holds the currentDirectory for this instance.
     * This is the path of the script calling this class.
     *
     * By default, it's also the application directory,
     * unless the application directory is passed explicitly as a @kw(command line option).
     *
     *
     * @var string
     */
    protected $currentDirectory;

    /**
     * This property holds the application directory.
     * It must be set via the --application-dir option.
     * If not set, this will default to the current directory (see $currentDirectory property).
     *
     * @var string
     */
    private $applicationDir;

    /**
     * This property holds the universeDirName for this instance.
     * The default value is: "universe"
     * @var string
     */
    private $universeDirName;

    /**
     * This property holds the path to the configuration file.
     * See the @object(configuration command) for more info.
     *
     * Note: there should be only one configuration file per machine, since there should be only uni tool per machine.
     *
     * @var string
     */
    private $confFile;

    /**
     * This property holds the path to the uni-tool info file.
     *
     * @var string
     */
    private $infoFile;

    /**
     * This property holds the dependencyMasterConf for this instance.
     * This is a cache for the dependency master array.
     *
     * @var array = null
     */
    private $dependencyMasterConf;



    /**
     * This property holds the localServer for this instance.
     * It's used as a cache value.
     *
     * @var LocalServer
     */
    private $localServer;

    /**
     * This property holds the baseIndent for this instance.
     * The base indent is potentially used by all commands which output something to the screen.
     *
     * @var int = 0
     */
    private $baseIndent;


    /**
     * This property holds the container for this instance.
     * It is used to load importers.
     *
     * @var OctopusServiceContainerInterface
     */
    private $container;


    /**
     * Builds the UniToolApplication instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->baseIndent = 0;
        $this->currentDirectory = getcwd();
        $this->applicationDir = null;
        $this->universeDirName = "universe";
        $this->dependencyMasterConf = null;
        $this->localServer = null;
        $this->confFile = __DIR__ . "/../info/configuration/conf.byml";
        $this->infoFile = __DIR__ . "/../info/uni-tool-info.byml";

        $this->registerCommand("Ling\Uni2\Command\CheckCommand", "check");
        $this->registerCommand("Ling\Uni2\Command\CleanCommand", "clean");
        $this->registerCommand("Ling\Uni2\Command\ConfCommand", "conf");
        $this->registerCommand("Ling\Uni2\Command\ConfPathCommand", "confpath");
        $this->registerCommand("Ling\Uni2\Command\HelpCommand", "help");

        $this->registerCommand("Ling\Uni2\Command\ImportCommand", "import");
        $this->registerCommand("Ling\Uni2\Command\ImportAllCommand", "import-all");
        $this->registerCommand("Ling\Uni2\Command\ImportGalaxyCommand", "import-galaxy");
        $this->registerCommand("Ling\Uni2\Command\ImportMapCommand", "import-map");
        $this->registerCommand("Ling\Uni2\Command\ImportUniverseCommand", "import-universe");


        $this->registerCommand("Ling\Uni2\Command\InfoApplicationCommand", "info");
        $this->registerCommand("Ling\Uni2\Command\InfoUniverseCommand", "info-universe");


        $this->registerCommand("Ling\Uni2\Command\InitLocalServerCommand", "init-local");


        $this->registerCommand("Ling\Uni2\Command\ListPlanetCommand", "listplanet");
        $this->registerCommand("Ling\Uni2\Command\ListStoreCommand", "liststore");

        $this->registerCommand("Ling\Uni2\Command\CreateMapCommand", "map");

        $this->registerCommand("Ling\Uni2\Command\ShowDependencyMasterCommand", "master");
        $this->registerCommand("Ling\Uni2\Command\DependencyMasterPathCommand", "masterpath");


        $this->registerCommand("Ling\Uni2\Command\ReimportCommand", "reimport");
        $this->registerCommand("Ling\Uni2\Command\ReimportAllCommand", "reimport-all");
        $this->registerCommand("Ling\Uni2\Command\ReimportGalaxyCommand", "reimport-galaxy");
        $this->registerCommand("Ling\Uni2\Command\ReimportMapCommand", "reimport-map");
        $this->registerCommand("Ling\Uni2\Command\ReimportUniverseCommand", "reimport-universe");


        $this->registerCommand("Ling\Uni2\Command\StoreAllCommand", "store-all");
        $this->registerCommand("Ling\Uni2\Command\StoreCommand", "store");
        $this->registerCommand("Ling\Uni2\Command\StoreGalaxyCommand", "store-galaxy");
        $this->registerCommand("Ling\Uni2\Command\StoreMapCommand", "store-map");

        $this->registerCommand("Ling\Uni2\Command\ToDirCommand", "todir");
        $this->registerCommand("Ling\Uni2\Command\ToLinkCommand", "tolink");
        $this->registerCommand("Ling\Uni2\Command\UpgradeCommand", "upgrade");
        $this->registerCommand("Ling\Uni2\Command\VersionCommand", "version");


        $this->registerCommand("Ling\Uni2\Command\CreateDependencyMasterCommand", "create-master");
        $this->registerCommand("Ling\Uni2\Command\Internal\PackUni2Command", "private:pack");


        $universeMeta = BabyYamlUtil::readFile(__DIR__ . '/../universe-meta.byml');
        $this->container = new RedOctopusServiceContainer();
        $this->container->build($universeMeta['importers']);


    }


    /**
     * Returns a valid application directory.
     *
     * It will check that the directory exists and is a directory.
     *
     * @return string
     */
    public function getApplicationDir()
    {
        return $this->applicationDir;
    }


    /**
     * Returns the universe dependencies directory.
     *
     * @return string
     */
    public function getUniverseDependenciesDir()
    {
        $appDir = $this->getApplicationDir();
        return $appDir . "/universe-dependencies";
    }


    /**
     * Returns the importer for the given dependency system,
     * or null if not defined.
     *
     * @param string $dependencySystemName
     * @return null|object
     */
    public function getImporter(string $dependencySystemName)
    {
        try {
            return $this->container->get($dependencySystemName);
        } catch (OctopusServiceErrorException $e) {
            return null;
        }
    }


    /**
     * Returns the location of a valid universe directory.
     * The universe directory is the universe directory at the root of the application directory.
     *
     *
     * @return string
     */
    public function getUniverseDirectory()
    {
        $universeDir = $this->getApplicationDir() . "/" . $this->universeDirName;
        return $universeDir;
    }


    /**
     * Returns the name of the universe directory.
     *
     * @return string
     */
    public function getUniverseDirectoryName()
    {
        return $this->universeDirName;
    }


    /**
     * Returns the application directory if it actually exists.
     * An exception is thrown otherwise (if the application directory is not a valid directory).
     *
     *
     * @return string
     * @throws Uni2Exception
     */
    public function checkApplicationDir()
    {
        if (null === $this->applicationDir) {
            throw new Uni2Exception("The application directory hasn't been set. You can set it using either the --application-dir option, or execute the program from the application directory.");
        }

        if (false === is_dir($this->applicationDir)) {
            throw new Uni2Exception("The application directory (" . $this->applicationDir . ") is not a directory. You can set the application directory using either the --application-dir option, or executing the program from the application directory directly.");
        }

        return $this->applicationDir;
    }

    /**
     * Returns the universe directory if it actually exists.
     * An exception is thrown otherwise (if the universe directory is not a valid directory).
     *
     *
     * @return string
     * @throws Uni2Exception
     */
    public function checkUniverseDirectory()
    {
        $universeDir = $this->getApplicationDir() . "/" . $this->universeDirName;
        if (false === is_dir($universeDir)) {
            throw new Uni2Exception("The universe directory (" . $universeDir . ") is not a directory. You must create the universe directory at the root of your application directory.");
        }
        return $universeDir;
    }

    /**
     * Ensure that the universe exists under the current application directory.
     *
     * If the universe directory doesn't exist yet, a primitive universe is created,
     * containing:
     *
     * - the bigbang.php script
     * - the Ling/BumbleBee autoloader
     *
     *
     * @param OutputInterface $output
     * @throws Uni2Exception
     */
    public function bootUniverse(OutputInterface $output)
    {

        $indentLevel = 0;


        $universeDir = $this->getUniverseDirectory();
        $bigBangFile = $universeDir . "/bigbang.php";
        $bumbleBeeDir = $universeDir . "/Ling/BumbleBee";
        if (
            false === is_dir($universeDir) ||
            false === file_exists($bigBangFile) ||
            false === is_dir($bumbleBeeDir)
        ) {
            H::info(H::i($indentLevel) . "Creating the primary universe:" . PHP_EOL, $output);
        }


        if (false === is_dir($universeDir)) {
            FileSystemTool::mkdir($universeDir);
        }
        if (false === file_exists($bigBangFile)) {
            $bigBangSrc = __DIR__ . "/../assets/uni-skeleton/universe/bigbang.php";
            FileSystemTool::copyFile($bigBangSrc, $bigBangFile);
        }
        if (false === is_dir($bumbleBeeDir)) {
            $myInput = new ArrayInput();
            $myInput->setItems([
                ":import" => true,
                ":Ling/BumbleBee" => true,
                "application-dir" => $this->applicationDir,
                "universe-dir-name" => $this->universeDirName,
                "-n" => true,
                "indent" => 1,
            ]);
            $this->run($myInput, $output);
        }
    }

    /**
     * Returns the confFile of this instance.
     *
     * @return string
     */
    public function getConfFile(): string
    {
        return realpath($this->confFile);
    }


    /**
     * Returns the @concept(Uni2 configuration).
     *
     * @return array
     */
    public function getConf(): array
    {
        return BabyYamlUtil::readFile($this->confFile);
    }


    /**
     * Returns a value from the uni-tool configuration.
     *
     * If the provided $key doesn't exist in the configuration,
     * then the $default value is returned.
     *
     *
     * @param string $key
     * @param mixed $default = null
     * @return mixed
     */
    public function getConfValue(string $key, $default = null)
    {
        $conf = BabyYamlUtil::readFile($this->confFile);
        return BDotTool::getDotValue($key, $conf, $default);
    }


    /**
     * Returns an instance of the local server.
     *
     * @return LocalServer
     */
    public function getLocalServer(): LocalServer
    {
        if (null === $this->localServer) {
            $this->localServer = new LocalServer();
            $this->localServer->setRootDir($this->getConfValue("local_server.root_dir"));
            $this->localServer->setActive($this->getConfValue("local_server.is_active"));
        }

        return $this->localServer;
    }


    /**
     * Copies the dependency-master file on the web to the local uni-tool copy's root directory.
     * Returns whether the copy operation was successful.
     *
     * See the @page(dependency master page) for more info.
     *
     *
     * @return bool
     */
    public function copyDependencyMasterFileFromWeb(): bool
    {
        $url = "https://raw.githubusercontent.com/lingtalfi/universe-naive-importer/master/dependency-master.byml";
        $file = $this->getLocalDependencyMasterPath();
        return FileSystemTool::copyFile($url, $file);
    }


    /**
     * Returns the dependency master array.
     * See @page(the dependency master page) for more info.
     *
     * @return array
     */
    public function getDependencyMasterConf(): array
    {
        if (null === $this->dependencyMasterConf) {
            $ret = [];
            $file = $this->getLocalDependencyMasterPath();
            if (file_exists($file)) {
                $ret = BabyYamlUtil::readFile($file);
            }
            $this->dependencyMasterConf = $ret;
        }
        return $this->dependencyMasterConf;
    }


    /**
     * Returns the galaxies known to the local dependency master array.
     * See @page(the dependency master page) for more info.
     *
     *
     * @return array
     * An array of galaxy names.
     */
    public function getKnownGalaxies(): array
    {
        $conf = $this->getDependencyMasterConf();
        return array_keys($conf['galaxies']);
    }


    /**
     * Returns the version number of the uni-tool on the web.
     * See the @page(uni-tool upgrade-system) for more info.
     *
     *
     * @return string
     * @throws Uni2Exception
     */
    public function getUniToolWebVersionNumber(): string
    {
        $url = "https://raw.githubusercontent.com/lingtalfi/universe-naive-importer/master/meta-info.byml";
        $content = file_get_contents($url); // version: x.x.x
        if (false === $content) {
            throw new Uni2Exception("Cannot access the web url: $url");
        }
        $version = trim(explode(':', $content)[1]);
        return $version;
    }


    /**
     * Returns the version number of the uni-tool on this local machine.
     * See the @page(uni-tool upgrade-system) for more info.
     *
     * Note: if for some reason the info is not accessible (i.e. the user deleted the info file for instance),
     * we return 0.0.0 (so that it looses against a version number comparison).
     *
     *
     *
     *
     * @return string
     * @throws Uni2Exception
     */
    public function getUniToolLocalVersionNumber(): string
    {
        $info = $this->getUniToolInfo();
        return $info['local_version'] ?? "0.0.0";
    }


    /**
     * Returns whether this uni-tool version is outdated.
     * In other words, whether the local copy of the uni-tool on this machine has a newer
     * version available on the web.
     * Note: the uni-tool IS NOT Uni2, the uni-tool's url is https://github.com/lingtalfi/universe-naive-importer,
     * while the Uni2's url is: https://github.com/lingtalfi/Uni2.
     *
     * However, the Uni2 is used under the hood by the uni-tool, and the Uni2 keeps track of the uni-tool
     * version number internally, so that we can see if it's outdated.
     *
     *
     * Important note: the uni-tool's version number basically reflects changes in the @page(dependency-master file).
     *
     *
     *
     * @return bool
     * @throws Uni2Exception
     */
    public function isUniToolOutdated()
    {
        //--------------------------------------------
        // UPDATING DEPENDENCY MASTER FILE (if necessary)
        //--------------------------------------------
        $webVersion = $this->getUniToolWebVersionNumber();
        $version = $this->getUniToolLocalVersionNumber();

        if ($webVersion > $version) {
            return true;
        }
        return false;
    }


    /**
     * Returns the path to the local dependency-master file.
     * See @page(the dependency master file page) for more details.
     *
     *
     * @return string
     */
    public function getLocalDependencyMasterPath(): string
    {
        return __DIR__ . "/../dependency-master.byml";
    }

    /**
     * Returns the baseIndent of this instance.
     *
     * @return int
     */
    public function getBaseIndent(): int
    {
        return $this->baseIndent;
    }


    /**
     * Updates the uni tool info with the given $values.
     * Note: only the entries passed with the $values array will be updated.
     *
     *
     * @param array $values
     * @throws Uni2Exception
     */
    public function updateUniToolInfo(array $values)
    {
        $data = $this->getUniToolInfo();
        $data = array_merge($data, $values);
        BabyYamlUtil::writeFile($data, $this->infoFile);
    }


    /**
     * Checks whether a newer version of the uni-tool is available on the web,
     * and executes the upgrade if this is the case.
     *
     *
     *
     * @param OutputInterface $output
     * @throws Uni2Exception
     */
    public function checkUpgrade(OutputInterface $output)
    {
        $indentLevel = $this->baseIndent;
        $autoUpdateConf = $this->getConfValue("automatic_updates");
        $isActive = $autoUpdateConf['is_active'] ?? false;
        if (true === (bool)$isActive) {


            //--------------------------------------------
            // CHECK FREQUENCY
            //--------------------------------------------
            $frequency = $autoUpdateConf['frequency'] ?? 5;
            $canUpdate = false;
            if (0 === (int)$frequency) {
                $canUpdate = true;
            } else {
                $uniInfo = $this->getUniToolInfo();
                $lastUpdate = $uniInfo['last_update'] ?? null;
                if (null === $lastUpdate) {
                    $lastUpdate = date("Y-m-d H:i:s");
                }

                $now = new \DateTime("now");
                $lastUpdateTime = new \DateTime($lastUpdate);
                $diff = $now->diff($lastUpdateTime);
                $nbDaysElapsed = $diff->format("%a");
                if ($nbDaysElapsed > $frequency) {
                    $canUpdate = true;
                }
            }


            //--------------------------------------------
            // CHECK VERSION NUMBER
            //--------------------------------------------
            if (true === $canUpdate) {
                H::info(H::i($indentLevel) . "Checking for updates:" . PHP_EOL, $output);

                $myInput = new ArrayInput();
                $myInput->setItems([
                    "application-dir" => $this->checkApplicationDir(),
                    "universe-dir-name" => $this->universeDirName,
                    ":upgrade" => true,
                    "indent" => $indentLevel + 1,
                ]);
                $this->run($myInput, $output);

            }
        }
    }


    /**
     * Parses general options.
     *
     * @overrides
     */
    public function run(InputInterface $input, OutputInterface $output)
    {

        //--------------------------------------------
        // APPLICATION DIR
        //--------------------------------------------
        $appDir = $input->getOption("application-dir");
        $universeDirName = $input->getOption("universe-dir-name");
        $this->baseIndent = $input->getOption("indent", 0);
        $errorVerbose = $input->hasFlag("e");

        if ($errorVerbose) {
            $this->setErrorIsVerbose(true);
        }

        if (null === $appDir) {
            $appDir = $this->currentDirectory;
            if (null === $appDir) {
                throw new Uni2Exception("current directory was not set!");
            }
        }
        $this->applicationDir = $appDir;


        if (null !== $universeDirName) {
            $this->universeDirName = $universeDirName;
        }

        //--------------------------------------------
        //
        //--------------------------------------------
        parent::run($input, $output);
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @overrides
     */
    protected function onCommandInstantiated(CommandInterface $command)
    {
        if ($command instanceof UniToolGenericCommand) {
            $command->setApplication($this);
        } else {
            throw new Uni2Exception("All commands must inherit from Uni2\Command\UniToolGenericCommand.");
        }
    }


    /**
     * Returns the uni tool info array, containing:
     *
     * - last_update: the last (mysql) datetime the uni-tool the upgrade command was called.
     * - local_version: the local version number of the uni-tool when last updated with the upgrade command.
     *
     * @return array
     * @throws Uni2Exception
     */
    protected function getUniToolInfo()
    {
        if (file_exists($this->infoFile)) {
            return BabyYamlUtil::readFile($this->infoFile);
        } else {
            throw new Uni2Exception("Info file not found: " . $this->infoFile);
        }
    }


}





