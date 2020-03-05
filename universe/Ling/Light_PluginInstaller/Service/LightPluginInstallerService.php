<?php


namespace Ling\Light_PluginInstaller\Service;

use Ling\Bat\FileSystemTool;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Database\Service\LightDatabaseService;
use Ling\Light_PluginInstaller\Exception\LightPluginInstallerException;
use Ling\Light_PluginInstaller\PluginInstaller\PluginInstallerInterface;
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
     * Whether the uninstall method throws exceptions (true) or silently ignore them (false=default).
     * @var bool = false
     */
    protected $uninstallStrictMode;

    /**
     * This property holds a cache for the  mysqlInfoUtil used by this instance.
     * @var MysqlInfoUtil
     */
    private $mysqlInfoUtil;


    /**
     * Builds the LightPluginInstallerService instance.
     */
    public function __construct()
    {
        $this->plugins = [];
        $this->rootDir = "/tmp";
        $this->container = null;
        $this->mysqlInfoUtil = null;
        $this->uninstallStrictMode = false;
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
     * Installs a registered plugin by its name.
     * If the plugin is already installed, this method does nothing.
     *
     * @param string $name
     * @throws \Exception
     */
    public function install(string $name)
    {
        if (false === $this->isInstalled($name)) {

            if (false === array_key_exists($name, $this->plugins)) {
                throw new LightPluginInstallerException("The plugin \"$name\" is not registered.");
            }
            $pluginInstaller = $this->plugins[$name];

            // we install the dependencies first
            $dependencies = $pluginInstaller->getDependencies();
            // note that we don't handle potential cyclic references problem yet (I want to wait to see it before fixing it)
            foreach ($dependencies as $plugin) {
                if (false === $this->isInstalled($plugin)) {
                    $this->install($plugin);
                }
            }
            $pluginInstaller->install();


            // keep track of the installation state
            $file = $this->getPluginInstallFile($name);
            FileSystemTool::mkfile($file);
        }
    }

    /**
     * Uninstalls a registered plugin by its name.
     * @param string $name
     * @throws \Exception
     */
    public function uninstall(string $name)
    {

        if (false === array_key_exists($name, $this->plugins)) {
            throw new LightPluginInstallerException("The plugin \"$name\" is not registered.");
        }


        try {

            // we want to uninstall all the dependent plugins first.
            foreach ($this->plugins as $dependentPluginName => $installer) {
                $dependencies = $installer->getDependencies();
                if (in_array($name, $dependencies, true)) {
                    $this->uninstall($dependentPluginName);
                }
            }


            // now uninstall the plugin
            $pluginInstaller = $this->plugins[$name];
            $pluginInstaller->uninstall();

        } catch (\Exception $e) {
            if (true === $this->uninstallStrictMode) {
                throw $e;
            }
        }

        // keep track of the installation state
        $file = $this->getPluginInstallFile($name);
        FileSystemTool::remove($file);

    }


    /**
     * Returns whether the given plugin is installed.
     *
     * @param string $name
     * @return bool
     */
    public function isInstalled(string $name): bool
    {
        $file = $this->getPluginInstallFile($name);
        return file_exists($file);
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
        foreach ($this->plugins as $name => $installer) {
            if (false === $this->isInstalled($name)) {
                $this->install($name);
            }
        }
    }


    /**
     * This method uninstalls all registered plugins.
     * @throws \Exception
     */
    public function uninstallAll()
    {
        foreach ($this->plugins as $name => $installer) {
            $this->uninstall($name);
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
}