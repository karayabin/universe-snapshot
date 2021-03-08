<?php


namespace Ling\Light_PluginInstaller\Service;

use Ling\Bat\ClassTool;
use Ling\CliTools\Formatter\BashtmlFormatter;
use Ling\CliTools\Output\OutputInterface;
use Ling\CyclicChainDetector\CyclicChainDetectorUtil;
use Ling\CyclicChainDetector\Helper\CyclicChainDetectorHelper;
use Ling\CyclicChainDetector\Link;
use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_PluginInstaller\Exception\LightPluginInstallerException;
use Ling\Light_PluginInstaller\PluginInstaller\PluginInstallerInterface;
use Ling\SimplePdoWrapper\Util\MysqlInfoUtil;
use Ling\UniverseTools\PlanetTool;

/**
 * The LightPluginInstallerService class.
 *
 *
 */
class LightPluginInstallerService
{


    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;


    /**
     * The mode for the output.
     * Can be one of:
     *
     * - browser
     *
     *
     * Note: we use the bashtml language for convenience, since it can print messages in both the cli and browser environment.
     *
     * @var string
     */
    protected $outputMode;

    /**
     *
     * The array of output levels to display.
     * We support @page(classic log levels).
     *
     * The available output levels are:
     *
     * - debug
     * - info
     * - warning
     *
     *
     * By default, this is the following array:
     *
     * - info
     * - warning
     *
     *
     *
     *
     * @var array
     */
    protected $outputLevels;

    /**
     * This property holds the outputFormatter for this instance.
     * @var BashtmlFormatter
     */
    protected $outputFormatter;


    /**
     * This property holds the options for this instance.
     *
     * The available options are:
     *
     * - useDebug: bool=false.
     *      Whether to write the debug messages to the log.
     *      See the conception notes for more details.
     * - useCache: bool=true.
     *      Whether to use the cache when checking whether a plugin is installed.
     *      Note: with this version of the plugin, the checking of every plugin is done on every application boot,
     *      therefore using the cache is recommended in production, as it's faster.
     *      When you debug though, or if you encounter problems with our service, it might be a good idea to temporarily
     *      disable the cache.
     *      When the cache is disable, our service will ask the plugin directly whether it's installed or not (which takes a bit longer
     *      than the cached response, but is potentially more accurate when in doubt).
     *
     *
     *
     * @var array
     */
    protected $options;

    /**
     * This property holds a cache for the  mysqlInfoUtil used by this instance.
     * @var MysqlInfoUtil
     */
    private $mysqlInfoUtil;

    /**
     * This internal property holds the number of indent chars to prefix a log message with.
     * @var int = 0
     */
    private $_indent;

    /**
     * This property holds the cyclicUtil for this instance.
     * @var CyclicChainDetectorUtil
     */
    private $cyclicUtil;

    /**
     * A logic dependency cache.
     * It's an array of planetDotName => logic dependencies.
     * With logic dependencies being an array of planetDotNames.
     *
     * Note: this cache is used differently, depending on the calling method.
     *
     *
     * @var array|null
     */
    private $dependencies;

    /**
     * Cache for installer instances.
     * It's an array of planetDotName => PluginInstallerInterface.
     * @var array
     */
    private $installers;

    /**
     * Cache of all the planetDotNames in the current application.
     * @var array|null
     */
    private $allPlanetDotNames;

    /**
     * The output to use.
     * If null, "echo" statements will be used instead.
     *
     * @var OutputInterface
     */
    private $output;


    /**
     * Builds the LightPluginInstallerService instance.
     */
    public function __construct()
    {
        $this->container = null;
        $this->mysqlInfoUtil = null;
        $this->cyclicUtil = null;
        $this->options = [
            'info',
            'warning',
        ];
        $this->_indent = 0;
        $this->outputMode = 'browser';
        $this->outputFormatter = null;
        $this->outputLevels = [];
        $this->dependencies = null;
        $this->installers = [];
        $this->allPlanetDotNames = null;
        $this->output = null;
    }

    /**
     * Sets the options.
     *
     * @param array $options
     */
    public function setOptions(array $options)
    {
        $this->options = $options;
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
     * Sets the outputLevels.
     *
     * @param array $outputLevels
     */
    public function setOutputLevels(array $outputLevels)
    {
        $this->outputLevels = $outputLevels;
    }


    /**
     * Adds an output level.
     *
     * @param string $outputLevel
     */
    public function addOutputLevel(string $outputLevel)
    {
        $this->outputLevels[] = $outputLevel;
    }


    /**
     * Sets the output.
     * @param OutputInterface $output
     */
    public function setOutput(OutputInterface $output)
    {
        $this->outputMode = "cli";
        $this->output = $output;
    }


    /**
     * Installs the planet which [dot name](https://github.com/karayabin/universe-snapshot#the-planet-dot-name) is given.
     *
     * Available options:
     * - force: bool=false, whether to call the install method of the plugin's installer, even if the plugin is already "logic installed"
     *
     *
     * @param string $planetDotName
     * @param array $options
     */
    public function install(string $planetDotName, array $options = [])
    {
        $this->dependencies = [];

        $force = $options['force'] ?? false;

        $this->message("Light_PluginInstaller: Calling \"install\" method with $planetDotName." . PHP_EOL);

        $this->cyclicUtil = new CyclicChainDetectorUtil();
        $this->cyclicUtil->setCallback(function (Link $link) {
            $name = $link->name;
            $s = CyclicChainDetectorHelper::getPathAsString($link);
            $this->error("cyclic relationship detected with culprit $name, in chain $s.");
        });
        $this->cyclicUtil->reset();
        $this->message("Creating install map for $planetDotName...", "debug");
        $installMap = $this->getInstallMap($planetDotName);
        $nbPlanets = count($installMap);
        $this->message("...$nbPlanets planet(s) found</b>." . PHP_EOL, "debug");

        $current = 1;


        foreach ($installMap as $_planetDotName) {
            $this->message("$_planetDotName ($current/$nbPlanets) -> ", "debug");
            if (null !== ($installer = $this->getInstallerInstance($_planetDotName))) {
                if (true === $force || false === $installer->isInstalled()) {
                    $this->message("executing logic install" . PHP_EOL, "debug");
                    $installer->install();
                } else {
                    $this->message("was already logic installed, skipping." . PHP_EOL, "debug");
                }
            } else {
                $this->message("no installer, skipping." . PHP_EOL, "debug");
            }
            $current++;
        }
    }


    /**
     * Uninstalls the plugin which planetDotName is given.
     *
     *
     * @param string $planetDotName
     * @throws \Exception
     */
    public function uninstall(string $planetDotName)
    {
        $this->message("Light_PluginInstaller: Calling \"uninstall\" method with $planetDotName." . PHP_EOL);


        // init dependencies for every planet in the target application
        $this->initAllDependencies();


        $this->message("Creating uninstall map for $planetDotName...", "debug");
        $uninstallMap = $this->getUninstallMap($planetDotName);
        $nbPlanets = count($uninstallMap);
        $this->message("...$nbPlanets planet(s) found." . PHP_EOL, "debug");


        $current = 1;


        foreach ($uninstallMap as $_planetDotName) {

            $this->message("$_planetDotName ($current/$nbPlanets) -> ", "debug");

            if (null !== ($installer = $this->getInstallerInstance($_planetDotName))) {
                if (true === $installer->isInstalled()) {
                    $this->message("executing logic uninstall" . PHP_EOL, "debug");
                    $installer->uninstall();
                } else {
                    $this->message("is not installed, skipping." . PHP_EOL, "debug");
                }

            } else {
                $this->message("no installer, skipping." . PHP_EOL, "debug");
            }
            $current++;
        }
    }


    /**
     * Returns whether the given planet is [installable](https://github.com/lingtalfi/TheBar/blob/master/discussions/import-install.md#summary).
     * @param string $planetDotName
     * @return bool
     */
    public function isInstallable(string $planetDotName): bool
    {
        return (null !== $this->getInstallerInstance($planetDotName));
    }

    /**
     * Returns whether the given plugin is installed.
     *
     * @param string $planetDotName
     * @return bool
     */
    public function isInstalled(string $planetDotName): bool
    {
        if (null !== ($installer = $this->getInstallerInstance($planetDotName))) {
            return $installer->isInstalled();
        }
        return true;
    }


    /**
     * This method will logic install all plugins found in the current application.
     *
     * Available options are:
     * - force: bool=false, whether to call the install method of the plugin's installer, even if the plugin is already "logic installed"
     *
     *
     * @param array $options
     * @throws \Exception
     */
    public function installAll(array $options = [])
    {
        $force = $options['force'] ?? false;
        $this->message("Light_PluginInstaller: Calling \"installAll\" method." . PHP_EOL);
        $dotNames = $this->getAllPlanetDotNames();
        foreach ($dotNames as $dotName) {
            if (null !== ($installer = $this->getInstallerInstance($dotName))) {
                if (true === $force || false === $installer->isInstalled()) {
                    $this->install($dotName, [
                        'force' => $force,
                    ]);
                }
            }
        }
    }


    /**
     * This method will logic uninstall all plugins found in the current application.
     * @throws \Exception
     */
    public function uninstallAll()
    {
        $this->message("Light_PluginInstaller: Calling \"uninstallAll\" method." . PHP_EOL);
        $dotNames = $this->getAllPlanetDotNames();
        foreach ($dotNames as $dotName) {
            if (null !== ($installer = $this->getInstallerInstance($dotName))) {
                $this->uninstall($dotName);
            }
        }
    }

    /**
     * Writes a message to the appropriate output.
     * Depending of the message type, the message could be logged as well.
     *
     * @param string $planetDotName
     * @param string $msg
     * @param string|null $type
     */
    public function messageFromPlugin(string $planetDotName, string $msg, string $type = null)
    {
        $msg = '---- ' . $planetDotName . ": " . $msg;
        $this->message($msg, $type);
    }


    /**
     * Returns the plugin installer interface instance for the given planetDotName if defined, or null otherwise.
     *
     *
     * @param string $planetDotName
     * @return PluginInstallerInterface|null
     */
    public function getInstallerInstance(string $planetDotName): ?PluginInstallerInterface
    {
        if (false === array_key_exists($planetDotName, $this->installers)) {
            list($galaxy, $planet) = PlanetTool::extractPlanetDotName($planetDotName);

            $compressed = PlanetTool::getCompressedPlanetName($planet);
            $installerClass = "$galaxy\\$planet\\Light_PluginInstaller\\${compressed}PluginInstaller";
            if (true === ClassTool::isLoaded($installerClass)) {
                $instance = new $installerClass;
                if ($instance instanceof LightServiceContainerAwareInterface) {
                    $instance->setContainer($this->container);
                }
                $this->installers[$planetDotName] = $instance;
            } else {
                $this->installers[$planetDotName] = null;
            }
        }
        return $this->installers[$planetDotName];
    }





    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the uninstall map array for the given @page(planet dot name).
     *
     * It's an array of planet dot names, in the order they should be uninstalled.
     *
     *
     * @param string $planetDotName
     * @return array
     */
    private function getUninstallMap(string $planetDotName): array
    {
        $map = [];
        $this->collectChildrenDependencies($planetDotName, $map);
        $map[] = $planetDotName;

        $map = array_unique($map);
        return $map;
    }


    /**
     * Collects the children dependencies, recursively.
     * This method assumes that the dependencies cache is fully built (i.e. every planet in the application has
     * a corresponding entry in the cache).
     *
     * @param string $planetDotName
     * @param array $uninstallMap
     */
    private function collectChildrenDependencies(string $planetDotName, array &$uninstallMap)
    {
        foreach ($this->dependencies as $depPlanetDotName => $dependencies) {
            if (true === in_array($planetDotName, $dependencies, true)) {
                $this->collectChildrenDependencies($depPlanetDotName, $uninstallMap);
                $uninstallMap[] = $depPlanetDotName;
            }
        }
    }

    /**
     * Returns the install map array for the given @page(planet dot name).
     *
     * It's an array of planet dot names, in the order they should be installed.
     *
     *
     * @param string $planetDotName
     * @return array
     */
    private function getInstallMap(string $planetDotName): array
    {
        $installMap = [];
        $this->collectInstallMap($planetDotName, $installMap);
        $installMap = array_unique($installMap); // remove duplicates
        return $installMap;
    }


    /**
     * Collects the install map recursively.
     *
     * @param string $planetDotName
     * @param array $installMap
     */
    private function collectInstallMap(string $planetDotName, array &$installMap)
    {
        $dependencies = $this->getLogicDependencies($planetDotName);
        foreach ($dependencies as $dependencyDotName) {
            $this->cyclicUtil->addDependency($planetDotName, $dependencyDotName);
            if (false === $this->cyclicUtil->hasCyclicError()) {
                $this->collectInstallMap($dependencyDotName, $installMap);
            }
        }

        $installMap[] = $planetDotName;
    }


    /**
     * Returns the dependencies for the given planet
     * @param string $planetDotName
     * @return array
     */
    private function getLogicDependencies(string $planetDotName): array
    {
        if (null === $this->dependencies) {
            $this->dependencies = [];
        }
        if (false === array_key_exists($planetDotName, $this->dependencies)) {
            $this->dependencies[$planetDotName] = [];
            if (null !== ($installer = $this->getInstallerInstance($planetDotName))) {
                $this->dependencies[$planetDotName] = $installer->getDependencies();
            }
        }
        return $this->dependencies[$planetDotName];
    }


    /**
     * Parses all the planets in the current application, and fills the dependency cache (i.e. dependencies property of this class).
     */
    private function initAllDependencies()
    {
        if (null === $this->dependencies) {
            $planetDotNames = $this->getAllPlanetDotNames();
            foreach ($planetDotNames as $dotName) {
                $this->getLogicDependencies($dotName); // this method fills the cache for us...
            }
        }
    }


    /**
     * Returns an array of all planetDotNames found in the current application.
     *
     * @return array
     */
    private function getAllPlanetDotNames(): array
    {
        if (null === $this->allPlanetDotNames) {
            $this->allPlanetDotNames = [];
            $uniDir = $this->container->getApplicationDir() . "/universe";
            if (is_dir($uniDir)) {
                $planetDirs = PlanetTool::getPlanetDirs($uniDir);
                foreach ($planetDirs as $planetDir) {
                    list($galaxy, $planet) = PlanetTool::getGalaxyNamePlanetNameByDir($planetDir);
                    $dotName = $galaxy . "." . $planet;
                    $this->allPlanetDotNames[] = $dotName;
                }
            }
        }
        return $this->allPlanetDotNames;
    }

    /**
     * Writes a message to the appropriate output.
     * Depending of the message type, the message could be logged as well.
     *
     *
     * @param string $msg
     * @param string|null $type
     */
    private function message(string $msg, string $type = null)
    {
        $format = null;

        if (null === $type) {
            $type = 'info';
        }
        if ('debug' === $type) {
            $format = 'darkGray';
        }

        if ('warning' === $type) {
            $format = 'warning';
        }


        $tagOpen = null;
        $tagClose = null;
        if (null !== $format) {
            $tagOpen = "<$format>";
            $tagClose = "</$format>";
        }


        // print
        if (true === in_array($type, $this->outputLevels)) {

            $msg = $tagOpen . $msg . $tagClose;
            if (null !== $this->output) {
                $this->output->write($msg);
            } elseif ('browser' === $this->outputMode) {
                echo $this->getFormatter()->format($msg);
            } else {
                $this->error("Unknown output mode type: " . $this->outputMode);
            }
        }
    }

    /**
     * Returns the bashtml formatter instance.
     *
     * @return BashtmlFormatter
     */
    private function getFormatter(): BashtmlFormatter
    {
        if (null === $this->outputFormatter) {
            $this->outputFormatter = new BashtmlFormatter();
            if ('browser' === $this->outputMode) {
                $this->outputFormatter->setFormatMode('web');
            }
        }
        return $this->outputFormatter;
    }


    /**
     * Throws an exception.
     *
     * @param string $msg
     */
    private function error(string $msg)
    {
        throw new LightPluginInstallerException($msg);


    }
}