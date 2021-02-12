<?php


namespace Ling\Light_DbSynchronizer\Helper;


use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Database\Service\LightDatabaseService;
use Ling\Light_DbSynchronizer\Exception\LightDbSynchronizerException;
use Ling\Light_DbSynchronizer\Service\LightDbSynchronizerService;
use Ling\SimplePdoWrapper\Util\MysqlInfoUtil;
use Ling\SqlWizard\Util\MysqlStructureReader;
use Ling\UniverseTools\PlanetTool;

/**
 * The LightDbSynchronizerHelper class.
 */
class LightDbSynchronizerHelper
{


    /**
     * Guess the scope from the given create file, and returns it.
     *
     *
     * @param string $createFile
     * @param LightServiceContainerInterface $container
     * @return array
     * @throws \Exception
     */
    public static function guessScopeByCreateFile(string $createFile, LightServiceContainerInterface $container): array
    {
        $reader = new MysqlStructureReader();
        $infos = $reader->readFile($createFile);
        $tables = array_keys($infos);
        if (count($tables) < 1) {
            throw new LightDbSynchronizerException("I cannot guess the table prefix, because there was no table defined in the create file.");
        }
        $anyTable = current($tables);
        $p = explode("_", $anyTable, 2);
        if (2 !== count($p)) {
            throw new LightDbSynchronizerException("I assumed that every tables had a prefix, but this one doesn't: $anyTable. Aborting process...");
        }
        $prefix = array_shift($p);
        /**
         * @var $db LightDatabaseService
         */
        $db = $container->get("database");
        $util = new MysqlInfoUtil();
        $util->setWrapper($db);
        return $util->getTables($prefix);
    }


    /**
     * Synchronizes the database with the create file of the planet which dot name is given.
     *
     * The delete/update scope used is all the tables which start with the first defined table's prefix found in the create file.
     *
     * So for instance if your create file's first defined table is lud_user, then the scope will be all tables in the current database
     * which starts with the prefix "lud_".
     *
     * Available options are:
     * - scope: array=null, the scope to use
     *
     *
     *
     *
     * @param string $planetDotName
     * @param LightServiceContainerInterface $container
     * @param array $options
     */
    public static function synchronizePlanetCreateFile(string $planetDotName, LightServiceContainerInterface $container, array $options = [])
    {

        $createFile = $container->getApplicationDir() . "/universe/" . PlanetTool::getPlanetSlashNameByDotName($planetDotName) . "/assets/fixtures/create-structure.sql";
        if (true === file_exists($createFile)) {
            $scope = $options['scope'] ?? null;
            if (null === $scope) {
                $scope = self::guessScopeByCreateFile($createFile, $container);
            }
            /**
             * @var $sy LightDbSynchronizerService
             */
            $sy = $container->get("db_synchronizer");
            $sy->synchronize($createFile, [
                'scope' => $scope,
            ]);
        }
    }

}