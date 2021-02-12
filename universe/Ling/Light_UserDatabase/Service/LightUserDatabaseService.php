<?php


namespace Ling\Light_UserDatabase\Service;


use Ling\Light_FileWatcher\Service\LightFileWatcherService;
use Ling\Light_UserDatabase\MysqlLightWebsiteUserDatabase;

/**
 * The LightUserDatabaseService class.
 *
 * Note: we extend the mysql version and not the babyYaml version which was just
 * used only by me when starting up this project.
 *
 */
class LightUserDatabaseService extends MysqlLightWebsiteUserDatabase
{


    /**
     * Whether the installer is currently installing.
     * @var bool
     */
    protected $isInstalling;

    /**
     * Builds the LightUserDatabaseService instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->isInstalling = false;
    }

    /**
     * Returns the isInstalling of this instance.
     *
     * @return bool
     */
    public function isInstalling(): bool
    {
        return $this->isInstalling;
    }

    /**
     * Sets the isInstalling.
     *
     * @param bool $isInstalling
     */
    public function setIsInstalling(bool $isInstalling)
    {
        $this->isInstalling = $isInstalling;
    }


    /**
     *
     * Returns whether both the lud_plugin_option and lud_user_group_has_plugin_option tables are installed.
     *
     * This is to help plugin authors prevent potential problem such as the hook problem:
     * https://github.com/lingtalfi/Light_PluginInstaller/blob/master/doc/pages/conception-notes.md#warning-with-hooks
     *
     * @return bool
     */
    public function pluginOptionTablesAreReady(): bool
    {

        /**
         * @var $filewatcher LightFileWatcherService
         */
        $db = $this->container->get("database");
        if (
            true === $db->getMysqlInfoUtil()->hasTable("lud_plugin_option") &&
            true === $db->getMysqlInfoUtil()->hasTable("lud_user_group_has_plugin_option")
        ) {
            return true;
        }
        return false;
    }


    /**
     *
     *
     *
     * This method is executed when a change is detected in our createFile.
     *
     * We use the @page(Light_FileWatcher plugin) to detect changes.
     *
     *
     * Upon a change, we to the followings:
     *
     * - synchronize the database with the new create file
     * - re-generate the api (using @page(Ling breeze generator 2))
     *
     *
     */
    public function onCreateFileChange()
    {

        /**
         * Note: I commented out this method because I don't think it's necessary,
         * but I keep it here because it's an interesting use of the file watcher (and reminds me that we have
         * a file watcher if we want...).
         */
//        /**
//         * @var $filewatcher LightFileWatcherService
//         */
//        $filewatcher = $this->container->get("file_watcher");
//
//        /**
//         * @var $dbsync LightDbSynchronizerService
//         */
//        $filewatcher->debugLog("user_database: synchronizing database.");
//        PluginInstallerSynchronizerHelper::synchronizeDatabaseByPlanetDotName("Ling.Light_UserDatabase", $this->container);
//
//
//        // generating api
//        $filewatcher->debugLog("user_database: re-generating the api.");
//        /**
//         * @var $gen LightBreezeGeneratorService
//         */
//        $gen = $this->container->get("breeze_generator");
//        $gen->generate('lud');
    }
}