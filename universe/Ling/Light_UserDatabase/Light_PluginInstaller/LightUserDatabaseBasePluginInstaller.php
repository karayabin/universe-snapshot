<?php


namespace Ling\Light_UserDatabase\Light_PluginInstaller;


use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Database\Service\LightDatabaseService;
use Ling\Light_DbSynchronizer\Helper\LightDbSynchronizerHelper;
use Ling\Light_PluginInstaller\PluginInstaller\PluginInstallerInterface;
use Ling\Light_PluginInstaller\Service\LightPluginInstallerService;
use Ling\Light_PluginInstaller\TableScope\TableScopeAwareInterface;
use Ling\Light_UserDatabase\Service\LightUserDatabaseService;

/**
 * The LightUserDatabaseBasePluginInstaller class.
 *
 * This class provides a default PluginInstallerInterface implementation for plugin which use our service,
 *
 * with methods based around various concepts:
 *
 * - [Light standard permissions](https://github.com/lingtalfi/TheBar/blob/master/discussions/light-standard-permissions.md).
 * - [create file](https://github.com/lingtalfi/TheBar/blob/master/discussions/create-file.md)
 *
 *
 * Here is what the default implementation provided by this class will do:
 *
 * Install
 * ---------
 * So when a plugin is installed, if it has a **create file**, then the tables listed in the create file are installed.
 * Also, we insert the **light standard permissions** for this plugin in the database.
 *
 * Uninstall
 * ---------
 * When the plugin is uninstalled, if it has a **create file**, the tables listed in the create file are removed.
 * Also, we remove the **light standard permissions** for this plugin from the database.
 *
 *
 * IsInstalled
 * ---------
 * We detect whether the plugin is installed by looking at the **light standard permissions**.
 * If those permissions exist for the plugin, then we consider it's installed, otherwise we consider it's not installed.
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 */
class LightUserDatabaseBasePluginInstaller implements PluginInstallerInterface, LightServiceContainerAwareInterface, TableScopeAwareInterface
{

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;


    /**
     * An internal cache for the planet dot name array.
     * @var array|null
     */
    private $dotNameArray;


    /**
     * Builds the LightBasePluginInstaller instance.
     */
    public function __construct()
    {
        $this->container = null;
        $this->dotNameArray = null;
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



    //--------------------------------------------
    // PluginInstallerInterface
    //--------------------------------------------
    /**
     * @implementation
     */
    public function install()
    {

        list($galaxy, $planet) = $this->extractPlanetDotName();

        //--------------------------------------------
        // CREATE FILE SYNCHRONIZATION
        //--------------------------------------------
        $this->synchronizeDatabase();


        //--------------------------------------------
        // LIGHT STANDARD PERMISSIONS
        //--------------------------------------------
        if (true === $this->container->has("user_database")) {
            /**
             * @var $userDb LightUserDatabaseService
             */
            $userDb = $this->container->get('user_database');
            $this->debugMsg("inserting light standard permissions ($planet.admin and $planet.user) if they don't exist." . PHP_EOL);

            $userDb->getFactory()->getPermissionApi()->insertPermissions([
                [
                    'name' => $planet . ".admin",
                ],
                [
                    'name' => $planet . ".user",
                ],
            ]);
        }


    }

    /**
     * @implementation
     */
    public function isInstalled(): bool
    {

        //--------------------------------------------
        // LIGHT STANDARD PERMISSIONS
        //--------------------------------------------
        if (true === $this->container->has("user_database")) {
            if (true === $this->hasTable("lud_permission")) {
                list($galaxy, $planet) = $this->extractPlanetDotName();
                $permissionName = $planet . ".admin";
                /**
                 * @var $userDb LightUserDatabaseService
                 */
                $userDb = $this->container->get('user_database');
                if (null !== $userDb->getFactory()->getPermissionApi()->getPermissionIdByName($permissionName)) {
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * @implementation
     */
    public function uninstall()
    {


        //--------------------------------------------
        // LIGHT STANDARD PERMISSIONS
        //--------------------------------------------
        $this->removeLightStandardPermissions();


        //--------------------------------------------
        // REMOVE SCOPE TABLES
        //--------------------------------------------
        $tables = $this->getTableScope();
        $this->dropTables($tables);


    }

    /**
     * @implementation
     */
    public function getDependencies(): array
    {
        return [
            'Ling.Light_UserDatabase',
        ];
    }


    /**
     * @implementation
     */
    public function getTableScope(): array
    {
        return [];
    }







    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Writes a message to the debug channel of the plugin installer planet.
     * @param string $msg
     * @throws \Exception
     */
    protected function debugMsg(string $msg)
    {
        $this->message($msg, 'debug');
    }

    /**
     * Writes a message to the info channel of the plugin installer planet.
     *
     * @param string $msg
     * @throws \Exception
     */
    protected function infoMsg(string $msg)
    {
        $this->message($msg, 'info');
    }


    /**
     * Writes a message to the warning channel of the plugin installer planet.
     *
     * @param string $msg
     * @throws \Exception
     */
    protected function warningMsg(string $msg)
    {
        $this->message($msg, 'warning');
    }


    /**
     * Writes a message to the channel of the plugin installer planet.
     *
     * @param string $msg
     * @param string|null $type
     * @throws \Exception
     */
    protected function message(string $msg, string $type = null)
    {
        if (null === $type) {
            $type = 'info';
        }
        list($galaxy, $planet) = $this->extractPlanetDotName();
        $planetDotName = $galaxy . "." . $planet;
        /**
         * @var $pi LightPluginInstallerService
         */
        $pi = $this->container->get('plugin_installer');
        $pi->messageFromPlugin($planetDotName, $msg, $type);
    }


    /**
     * Synchronizes the database with the create file (if any) of this planet.
     *
     * @throws \Exception
     */
    protected function synchronizeDatabase()
    {
        list($galaxy, $planet) = $this->extractPlanetDotName();

        $scope = $this->getTableScope();


        $this->debugMsg("synchronizing <b>create file</b>." . PHP_EOL);
        LightDbSynchronizerHelper::synchronizePlanetCreateFile("$galaxy.$planet", $this->container, [
            'scope' => $scope,
        ]);
    }


    /**
     * Returns an array containing the galaxy name and the planet name of the current instance.
     */
    protected function extractPlanetDotName(): array
    {
        if (null === $this->dotNameArray) {
            $className = get_class($this);
            $p = explode('\\', $className);
            $arr[] = array_shift($p); // galaxy
            $arr[] = array_shift($p); // planet
            $this->dotNameArray = $arr;
        }
        return $this->dotNameArray;
    }


    /**
     *
     * Removes the @page(light standard permissions) for this plugin.
     *
     * @throws \Exception
     */
    protected function removeLightStandardPermissions()
    {
        /**
         * @var $userDb LightDatabaseService
         */
        $db = $this->container->get('database');
        $util = $db->getMysqlInfoUtil();


        list($galaxy, $planet) = $this->extractPlanetDotName();
        $this->debugMsg("Remove light standard permissions ($planet.admin, $planet.user) if any." . PHP_EOL);
        if (true === $this->container->has("user_database")) {


            if (true === $util->hasTable("lud_permission")) {

                /**
                 * @var $userDb LightUserDatabaseService
                 */
                $userDb = $this->container->get('user_database');
                $userDb->getFactory()->getPermissionApi()->deletePermissionByNames([
                    $planet . ".admin",
                    $planet . ".user",
                ]);
            }
        }
    }

    /**
     * Drop the given tables, if they exist.
     *
     * @param array $tables
     * @throws \Exception
     */
    protected function dropTables(array $tables)
    {

        /**
         * @var $userDb LightDatabaseService
         */
        $db = $this->container->get('database');


        $stmt = "SET FOREIGN_KEY_CHECKS=0;" . PHP_EOL;

        $this->debugMsg("Removing tables: " . implode(', ', $tables) . PHP_EOL);
        foreach ($tables as $table) {
            $stmt .= "drop table if exists `$table`;" . PHP_EOL;
        }
        $stmt .= "SET FOREIGN_KEY_CHECKS=1;" . PHP_EOL;
        try {
            $db->executeStatement($stmt);
        } catch (\Exception $e) {
            $this->warningMsg($e);
        }

    }


    /**
     * Returns whether the given table exists in the database.
     *
     * @param string $table
     * @return bool
     */
    protected function hasTable(string $table): bool
    {
        /**
         * @var $userDb LightDatabaseService
         */
        $db = $this->container->get('database');
        return $db->getMysqlInfoUtil()->hasTable($table);
    }

}