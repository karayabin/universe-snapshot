<?php


namespace Ling\Light_PluginInstaller\Service;

use Ling\ArrayToString\ArrayToStringTool;
use Ling\Bat\FileSystemTool;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Database\Service\LightDatabaseService;
use Ling\Light_DbSynchronizer\Service\LightDbSynchronizerService;
use Ling\Light_Logger\LightLoggerService;
use Ling\Light_PluginInstaller\Exception\LightPluginInstallerException;
use Ling\Light_PluginInstaller\Extension\PluginInstallerExtensionInterface;
use Ling\Light_PluginInstaller\PluginInstaller\PluginInstallerInterface;
use Ling\Light_PluginInstaller\PluginInstaller\PluginPostInstallerInterface;
use Ling\SimplePdoWrapper\SimplePdoWrapper;
use Ling\SimplePdoWrapper\Util\MysqlInfoUtil;

/**
 * The LightPluginInstallerService class.
 */
class LightPluginInstallerService
{

    /**
     * This property holds the plugins for this instance.
     * It's an array of pluginName => PluginInstallerInterface
     * @var PluginInstallerInterface[]
     */
    protected $plugins;

    /**
     * This property holds the rootDir for this instance.
     * The rootDir contains all the files to keep track of whether plugins are installed or not.
     *
     * @var string
     */
    protected $rootDir;

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;

    /**
     * Whether the uninstall method throws exceptions (true) or silently ignore them (false).
     * @var bool = true
     */
    protected $uninstallStrictMode;


    /**
     * An array of plugin extensions.
     *
     * @var PluginInstallerExtensionInterface[]
     */
    protected $pluginExtensions;

    /**
     * This property holds the postInstallers for this instance.
     * @var PluginPostInstallerInterface[]
     */
    protected $postInstallers;

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
     * This property holds the _isInstalling for this instance.
     * @var bool
     */
    private $_isInstalling;

    /**
     * This internal property holds the number of indent chars to prefix a log message with.
     * @var int = 0
     */
    private $_indent;


    /**
     * Builds the LightPluginInstallerService instance.
     */
    public function __construct()
    {
        $this->plugins = [];
        $this->rootDir = "/tmp";
        $this->container = null;
        $this->mysqlInfoUtil = null;
        $this->uninstallStrictMode = true;
        $this->pluginExtensions = [];
        $this->options = [];
        $this->postInstallers = [];
        $this->_isInstalling = false;
        $this->_indent = 0;
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
     * Returns the value of the option which name was given, or the given defaultValue otherwise (if the option was not found).
     *
     *
     * @param string $key
     * @param null $defaultValue
     * @return mixed
     */
    public function getOption(string $key, $defaultValue = null)
    {
        return $this->options[$key] ?? $defaultValue;
    }


    /**
     * Sets the rootDir.
     *
     * @param string $rootDir
     */
    public function setRootDir(string $rootDir)
    {
        $this->rootDir = $rootDir;
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
     * Sets the uninstallStrictMode.
     *
     * @param bool $uninstallStrictMode
     */
    public function setUninstallStrictMode(bool $uninstallStrictMode)
    {
        $this->uninstallStrictMode = $uninstallStrictMode;
    }


    /**
     * Registers the given plugin.
     *
     * @param string $name
     * @param PluginInstallerInterface $pluginInstaller
     */
    public function registerPlugin(string $name, PluginInstallerInterface $pluginInstaller)
    {
        $this->plugins[$name] = $pluginInstaller;
        $this->dispatch("registerPluginAfter", $pluginInstaller);
    }


    /**
     * Registers a post installer.
     *
     * See the @page(Light_PluginInstaller conception notes) for more details.
     *
     * @param int $level
     * @param callable $postInstaller
     * @return void
     */
    public function registerPostInstaller(int $level, callable $postInstaller)
    {
        if (false === array_key_exists($level, $this->postInstallers)) {
            $this->postInstallers[$level] = [];
        }
        $this->postInstallers[$level][] = $postInstaller;
    }


    /**
     * Returns the array of registered plugin names.
     * @return array
     */
    public function getRegisteredPluginNames(): array
    {
        return array_keys($this->plugins);
    }

    /**
     * Registers a plugin extension.
     * @param PluginInstallerExtensionInterface $extension
     */
    public function registerPluginExtension(PluginInstallerExtensionInterface $extension)
    {
        $this->pluginExtensions[] = $extension;
    }


    /**
     * Returns whether the given plugin has a cache entry.
     *
     * Note: if so, this means that our service considers that this plugin is installed.
     *
     *
     *
     * @param string $pluginName
     * @return bool
     */
    public function pluginHasCacheEntry(string $pluginName): bool
    {
        $f = $this->getPluginInstallFile($pluginName);
        return file_exists($f);
    }


    /**
     * Removes the cache entry, if any, for the given plugin.
     *
     *
     * @param string $pluginName
     */
    public function removeCacheEntry(string $pluginName)
    {
        $f = $this->getPluginInstallFile($pluginName);
        unlink($f);
    }

    /**
     * Returns whether the service is currently in the middle of core installing plugins.
     * See the @page(Light_PluginInstaller conception notes) for more details.
     *
     * @return bool
     */
    public function pluginsAreBeingInstalled(): bool
    {
        return $this->_isInstalling;
    }

    /**
     * Installs a registered plugin by its name.
     *
     * Available options are:
     * - dependencyName: string, in the debug log, will indicate the relationship between the parent/child plugins.
     *          You probably never need this, it's used for internal purposes.
     * - indent: int=0. An internal option that I use to enhance the display of the debug (i.e. you probably should't mess with this).
     *          It's the number of indent chars to prefix the log message with.
     *
     *
     *
     * @param string $name
     * @param array $options
     * @throws \Exception
     */
    public function install(string $name, array $options = [])
    {
        $this->_isInstalling = true;
        $depName = $options['dependencyName'] ?? null;
        $plugName = $name;
        $plugType = 'plugin';
        if (null !== $depName) {
            $plugName .= ' (dependency of ' . $depName . ')';
            $plugType = 'dependency';
        }
        $this->debugLog('plugin_installer: Installing ' . $plugType . ' ' . $plugName . "...");

        if (false === array_key_exists($name, $this->plugins)) {
            $this->debugLog('plugin_installer: Fatal error: the plugin ' . $name . " is not registered.");
            throw new LightPluginInstallerException("The plugin \"$name\" is not registered.");
        }


        $pluginInstaller = $this->plugins[$name];

        // we install the dependencies first
        $dependencies = $pluginInstaller->getDependencies();

        $this->_indent++;

        if ($dependencies) {
            $nbDep = count($dependencies);
            $sDep = ($nbDep === 1) ? 'dependency' : 'dependencies';
            $this->debugLog("plugin_installer: " . $nbDep . " $sDep found.");
            $this->_indent--;
            foreach ($dependencies as $plugin) {
                $this->_indent++;
                if (false === $this->isInstalled($plugin)) {
                    $this->install($plugin, [
                        "dependencyName" => $name,
                    ]);
                } else {
                    $this->debugLog('plugin_installer: dependency ' . $plugin . " is already installed.");
                }
                $this->_indent--;
            }
        } else {
            $this->debugLog("plugin_installer: No dependency found for $name.");
            $this->_indent--;
        }


        try {
            $this->_indent++;

            $pluginInstaller->install();
            // keep track of the installation state
            $file = $this->getPluginInstallFile($name);
            FileSystemTool::mkfile($file);
            $this->_indent--;

            $this->debugLog('plugin_installer: ' . $name . " installed.");

        } catch (\Exception $e) {
            $this->debugLog('plugin_installer: An error occurred while installing plugin ' . $name . ": " . PHP_EOL . $e);
        }
        $this->_isInstalling = false;
    }

    /**
     * Uninstalls a registered plugin by its name.
     *
     * Available options are:
     * - parentName: string, in the debug log, will help to indicate the relationship between the parent/child plugins.
     *          You probably never need this, it's used for internal purposes.
     * - indent: int=0. An internal option that I use to enhance the display of the debug (i.e. you probably should't mess with this).
     *          It's the number of indent chars to prefix the log message with.
     *
     *
     * @param array $options
     * @param string $name
     * @throws \Exception
     */
    public function uninstall(string $name, array $options = [])
    {
        $depName = $options['parentName'] ?? null;
        $plugName = $name;
        if (null !== $depName) {
            $plugName .= ' (child of ' . $depName . ')';
        }
        $this->debugLog('plugin_installer: Uninstalling ' . $plugName . "...");


        if (false === array_key_exists($name, $this->plugins)) {
            $this->debugLog('plugin_installer: Fatal error: the plugin ' . $name . " is not registered.");
            throw new LightPluginInstallerException("The plugin \"$name\" is not registered.");
        }


        try {


            // we want to uninstall all the dependent plugins first.
            $children = [];
            foreach ($this->plugins as $dependentPluginName => $installer) {
                $dependencies = $installer->getDependencies();
                if (in_array($name, $dependencies, true)) {
                    $children[] = $dependentPluginName;
                }
            }


            $this->_indent++;
            $count = count($children);
            $this->debugLog('plugin_installer: ' . $count . ' children found.');
            $this->_indent--;
            if ($children) {
                $n = 1;
                foreach ($children as $child) {
                    $this->_indent++;
                    if (true === $this->isInstalled($child)) {
                        $this->uninstall($child, ['parentName' => $name]);
                        $n++;
                    } else {
                        $this->debugLog('plugin_installer: child ' . $child . " is already uninstalled.");
                    }
                    $this->_indent--;
                }
            }


            // now uninstall the plugin
            $pluginInstaller = $this->plugins[$name];
            $this->_indent++;
            $pluginInstaller->uninstall();
            $this->_indent--;


        } catch (\Exception $e) {
            if (true === $this->uninstallStrictMode) {
                throw $e;
            }
        }

        // keep track of the installation state
        $file = $this->getPluginInstallFile($name);
        FileSystemTool::remove($file);


        $this->_indent--;
        $this->debugLog('plugin_installer: ' . $name . ' is uninstalled.');
    }


    /**
     * Returns whether the given plugin is installed.
     *
     * @param string $name
     * @return bool
     */
    public function isInstalled(string $name): bool
    {
        $useCache = $this->options['useCache'] ?? true;
        if (true === $useCache) {
            $file = $this->getPluginInstallFile($name);
            return file_exists($file);
        } else {
            try {

                if (array_key_exists($name, $this->plugins)) {
                    return $this->plugins[$name]->isInstalled();
                } else {
                    $this->error("isInstalled cannot resolve for  plugin \"$name\" because it's not registered.");
                }
            } catch (\Exception $e) {
                $this->debugLog("plugin_installer: An exception occurred when calling the isInstalled method on plugin \"$name\": " . $e);
            }
        }
        return false;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * This method will install all registered plugins.
     * @throws \Exception
     */
    public function installAll()
    {
        $this->_indent = 0; // initialize indent
        $this->_isInstalling = true;
        $useCache = $this->options['useCache'] ?? true;
        $sCache = (true === $useCache) ? 'on' : 'off';

        //  auto-install all plugins
        $this->debugLog('--clean--'); // re-initialize the file to make each session more readable...
        $this->debugLog('plugin_installer: "Install check" procedure, ' . count($this->plugins) . " plugins to check (cache is $sCache).");


        foreach ($this->plugins as $name => $installer) {
            if (false === $this->isInstalled($name)) {
                $this->install($name);
            } else {
                $this->debugLog('plugin_installer: Plugin ' . $name . " is already installed.");


                // if cache if off...
                // some plugins always return isInstalled=true for some reasons
                // we need to create the cache file for them too...
                $useCache = $this->options['useCache'] ?? true;
                if (false === $useCache) {
                    $file = $this->getPluginInstallFile($name);
                    if (false === file_exists($file)) {
                        FileSystemTool::mkfile($file);
                    }
                }


            }
        }
        $this->_isInstalling = false;
    }


    /**
     * This method uninstalls all registered plugins.
     * @throws \Exception
     */
    public function uninstallAll()
    {
        $this->_indent = 0; // initialize indent
        $this->_isInstalling = true;

        //  auto-install all plugins
        $this->debugLog('--clean--'); // re-initialize the file to make each session more readable...
        $this->debugLog('plugin_installer: "Uninstall all procedure, ' . count($this->plugins) . " plugins to call.");

        foreach ($this->plugins as $name => $installer) {
            if (true === $this->isInstalled($name)) {
                $this->uninstall($name);
            } else {
                $this->debugLog('plugin_installer: Plugin ' . $name . " is already uninstalled.");
            }
        }
    }


    /**
     * Method called in response to @page(the Light.initialize_1 event).
     * It will:
     * - install all registered plugins
     */
    public function onInitialize()
    {
        $this->installAll();
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sends a message to our "official" debug log.
     * See the @page(Light_PluginInstaller conception notes) for more details.
     *
     * @param string $msg
     */
    public function debugLog(string $msg)
    {
        $useDebug = $this->options['useDebug'] ?? false;
        if (true === $useDebug) {
            /**
             * @var $logger LightLoggerService
             */
            $logger = $this->container->get("logger");
            $prefix = '';
            if ($this->_indent > 0) {
                $prefix = str_repeat('---- ', $this->_indent) . " ";
            }
            $logger->log($prefix . $msg, "plugin_installer.debug");
        }
    }


    //--------------------------------------------
    // HELPERS
    //--------------------------------------------
    /**
     * Returns whether the given table exists in the current database.
     *
     * @param string $table
     * @return bool
     * @throws \Exception
     */
    public function hasTable(string $table): bool
    {
        if (null === $this->mysqlInfoUtil) {

            /**
             * @var $db LightDatabaseService
             */
            $db = $this->container->get("database");
            $util = new MysqlInfoUtil($db);
            $this->mysqlInfoUtil = $util;
        }
        return $this->mysqlInfoUtil->hasTable($table);
    }

    /**
     * Returns whether the given table has an entry where the column is the given column with the value being the given value.
     *
     * Note: we trust the given parameters (i.e. we do not protect against sql injection), apart from the value argument,
     * which is turned into a pdo marker.
     *
     * @param string $table
     * @param string $column
     * @param $value
     * @return bool
     * @throws \Exception
     */
    public function tableHasColumnValue(string $table, string $column, $value): bool
    {
        /**
         * @var $db LightDatabaseService
         */
        $db = $this->container->get("database");
        $res = $db->fetch("select count(*) as count from `$table` where `$column` = :value", [
            ":value" => $value,
        ]);
        if (false !== $res) {
            return ((int)$res['count'] > 0);
        }
        return false;
    }


    /**
     * Returns the value of the given column in the given table, matching the given @page(where conditions).
     * In case of no match, the method either returns false by default, or throws an exception if the throwEx flag is
     * set to true.
     *
     *
     *
     *
     * @param string $table
     * @param string $column
     * @param $where
     * @param bool $throwEx = false
     * @return string|false
     * @throws \Exception
     */
    public function fetchRowColumn(string $table, string $column, $where, bool $throwEx = false)
    {
        /**
         * @var $db LightDatabaseService
         */
        $db = $this->container->get("database");
        $markers = [];
        $q = "select `$column` from `$table`";

        SimplePdoWrapper::addWhereSubStmt($q, $markers, $where);


        $res = $db->fetch($q, $markers, \PDO::FETCH_COLUMN);
        if (false !== $res) {
            return $res;
        }
        if (true === $throwEx) {
            throw new LightPluginInstallerException("Row column not found: $table.$column.");
        }
        return false;
    }


    /**
     * Tries to synchronize the database with the given @page(create file).
     * If it fails, throws an exception detailing the errors.
     *
     * We use the Light_DbSynchronizer plugin under the hood (Light_DbSynchronizer->synchronize).
     *
     * $syncOptions are directly passed to the synchronize method.
     *
     *
     * Available options are:
     *
     * - errorLevel: debug|error = debug
     *
     *
     * @param string $pluginName
     * @param string $createFile
     * @param array $syncOptions
     * @param array $options
     * @throws \Exception
     */
    public function synchronizeByCreateFile(string $pluginName, string $createFile, array $syncOptions = [], array $options = [])
    {

        /**
         * @var $synchronizer LightDbSynchronizerService
         */
        $synchronizer = $this->container->get("db_synchronizer");
        $isSuccess = $synchronizer->synchronize($createFile, $syncOptions);
        if (false === $isSuccess) {
            $errorLevel = $options['errorLevel'] ?? 'debug';

            if ("error" === $errorLevel) {
                $errors = $synchronizer->getLogErrorMessages();
            } else {
                $errors = $synchronizer->getLogDebugMessages();
            }


            $sErrors = $pluginName . ": The following errors occurred while trying to synchronize the database with our create file:" . PHP_EOL . ArrayToStringTool::toPhpArray($errors);
            throw new LightPluginInstallerException($sErrors);
        }
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the path to the plugin install file.
     *
     * @param string $name
     * @return string
     */
    private function getPluginInstallFile(string $name): string
    {
        return $this->rootDir . "/$name.txt";
    }


    /**
     * Dispatches the given event to the registered plugin extensions.
     *
     * @param string $eventName
     * @param $parameter
     */
    private function dispatch(string $eventName, $parameter)
    {
        foreach ($this->pluginExtensions as $pluginExtension) {
            $pluginExtension->trigger($eventName, $parameter);
        }
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