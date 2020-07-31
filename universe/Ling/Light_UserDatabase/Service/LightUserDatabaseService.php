<?php


namespace Ling\Light_UserDatabase\Service;


use Ling\Light_BreezeGenerator\Service\LightBreezeGeneratorService;
use Ling\Light_DbSynchronizer\Service\LightDbSynchronizerService;
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
         * @var $filewatcher LightFileWatcherService
         */
        $filewatcher = $this->container->get("file_watcher");

        /**
         * @var $dbsync LightDbSynchronizerService
         */
        $filewatcher->debugLog("user_database: synchronizing database.");
        $dbsync = $this->container->get("db_synchronizer");
        $dbsync->synchronize(__DIR__ . "/../assets/fixtures/create-structure.sql", [
            "scope" => $this->getScopeTables(),
        ]);
        $filewatcher->debugLog("user_database: re-generating the api.");

        /**
         * @var $gen LightBreezeGeneratorService
         */
        $gen = $this->container->get("breeze_generator");
        $gen->generate('lud');
    }
}