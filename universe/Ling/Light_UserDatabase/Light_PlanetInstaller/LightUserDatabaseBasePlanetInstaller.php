<?php


namespace Ling\Light_UserDatabase\Light_PlanetInstaller;


use Ling\CliTools\Output\OutputInterface;
use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Database\Service\LightDatabaseService;
use Ling\Light_DbSynchronizer\Helper\LightDbSynchronizerHelper;
use Ling\Light_PlanetInstaller\PlanetInstaller\LightPlanetInstallerInit3HookInterface;
use Ling\Light_UserDatabase\Exception\LightUserDatabaseException;
use Ling\Light_UserDatabase\Service\LightUserDatabaseService;
use Ling\UniverseTools\PlanetTool;

/**
 * The LightUserDatabaseBasePlanetInstaller class.
 *
 * This class provides a default LightPlanetInstallerInit3HookInterface.init3 implementation for planets which use our service.
 *
 * Our methods are based around various concepts:
 *
 * - [Light standard permissions](https://github.com/lingtalfi/TheBar/blob/master/discussions/light-standard-permissions.md).
 * - [create file](https://github.com/lingtalfi/TheBar/blob/master/discussions/create-file.md)
 *
 *
 *
 * Basically, our default implementation automatically installs the tables of the client planet (via create file system).
 * It also inserts the **light standard permissions** automatically.
 *
 *
 *
 */
class LightUserDatabaseBasePlanetInstaller implements LightPlanetInstallerInit3HookInterface, LightServiceContainerAwareInterface
{

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected LightServiceContainerInterface $container;


    /**
     * An internal cache for the planet dot name array.
     * @var array|null
     */
    private array|null $planetInfo;


    /**
     * Builds the LightUserDatabaseBasePlanetInstaller instance.
     */
    public function __construct()
    {
        $this->planetInfo = null;
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
    // LightPlanetInstallerInit3HookInterface
    //--------------------------------------------
    /**
     * @implementation
     */
    public function init3(string $appDir, OutputInterface $output): void
    {

        list($galaxy, $planet) = $this->extractPlanetInfo();


        //--------------------------------------------
        // LIGHT STANDARD PERMISSIONS
        //--------------------------------------------
        /**
         * @var $userDb LightUserDatabaseService
         */
        $userDb = $this->container->get('user_database');
        $output->write("inserting <blue>light standard permissions</blue> (<b>$planet.admin</b> and <b>$planet.user</b>) if they don't exist." . PHP_EOL);

        $userDb->getFactory()->getPermissionApi()->insertPermissions([
            [
                'name' => $planet . ".admin",
            ],
            [
                'name' => $planet . ".user",
            ],
        ]);


        //--------------------------------------------
        // CREATE FILE SYNCHRONIZATION
        //--------------------------------------------
        $this->synchronizeDatabase($output);


    }


    /**
     * @implementation
     */
    public function undoInit3(string $appDir, OutputInterface $output): void
    {
        list($galaxy, $planet) = $this->extractPlanetInfo();
        $planetDotName = "$galaxy.$planet";


        //--------------------------------------------
        // LIGHT STANDARD PERMISSIONS
        //--------------------------------------------
        $this->removeLightStandardPermissions($output);


        //--------------------------------------------
        // REMOVE SCOPE TABLES
        //--------------------------------------------
        $tables = $this->getTableScope();
        if (null === $tables) {
            $createFile = $this->container->getApplicationDir() . "/universe/" . PlanetTool::getPlanetSlashNameByDotName($planetDotName) . "/assets/fixtures/create-structure.sql";
            if (true === file_exists($createFile)) {
                $tables = LightDbSynchronizerHelper::guessScopeByCreateFile($createFile, $this->container);
            }
        }
        if (null !== $tables) {
            $output->write("Removing tables for planet <b>$galaxy.$planet</b>." . PHP_EOL);
            $this->dropTables($tables, $output);
        } else {
            throw new LightUserDatabaseException("$galaxy.$planet->LightUserDatabaseBasePlanetInstaller->undoInit3: The given \"tables\" is null, and there is no \"create file\". Please provide at least one of those. Aborting.");
        }


    }











    //--------------------------------------------
    //
    //--------------------------------------------

    /**
     * Returns the table scope to use with the Light_DbSynchronizer tool.
     * The table scope is basically all the tables you use.
     * If you aren't sure what you are doing, don't override this method, our default
     * guessing (when this method returns null) is generally correct.
     *
     * @return array|null
     * @overrideMe
     */
    protected function getTableScope(): array|null
    {
        return null;
    }



    //--------------------------------------------
    //
    //--------------------------------------------

    /**
     * Synchronizes the database with the create file (if any) of this planet.
     *
     * @param OutputInterface $output
     * @throws \Exception
     */
    private function synchronizeDatabase(OutputInterface $output)
    {
        list($galaxy, $planet) = $this->extractPlanetInfo();

        $scope = $this->getTableScope();


        $planetDotName = "$galaxy.$planet";
        $createFile = $this->container->getApplicationDir() . "/universe/" . PlanetTool::getPlanetSlashNameByDotName($planetDotName) . "/assets/fixtures/create-structure.sql";
        if (true === $createFile) {
            $output->write("synchronizing <b>create file</b>." . PHP_EOL);
            LightDbSynchronizerHelper::synchronizePlanetCreateFile("$galaxy.$planet", $this->container, [
                'scope' => $scope,
            ]);
        }
    }


    /**
     *
     * Removes the @page(light standard permissions) for this plugin.
     *
     * @param OutputInterface $output
     * @throws \Exception
     */
    private function removeLightStandardPermissions(OutputInterface $output)
    {
        /**
         * @var $userDb LightDatabaseService
         */
        $db = $this->container->get('database');
        $util = $db->getMysqlInfoUtil();


        list($galaxy, $planet) = $this->extractPlanetInfo();
        $output->write("Remove light standard permissions ($planet.admin, $planet.user) if any." . PHP_EOL);
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
     * @param OutputInterface $output
     * @throws \Exception
     */
    private function dropTables(array $tables, OutputInterface $output)
    {

        /**
         * @var $userDb LightDatabaseService
         */
        $db = $this->container->get('database');


        $stmt = "SET FOREIGN_KEY_CHECKS=0;" . PHP_EOL;

        $output->write("Removing tables: " . implode(', ', $tables) . PHP_EOL);
        foreach ($tables as $table) {
            $stmt .= "drop table if exists `$table`;" . PHP_EOL;
        }
        $stmt .= "SET FOREIGN_KEY_CHECKS=1;" . PHP_EOL;
        try {
            $db->executeStatement($stmt);
        } catch (\Exception $e) {
            $output->write("<warning>An exception occurred: $e</warning>" . PHP_EOL);
            $output->write("The executed statement was: <b>$stmt</b>" . PHP_EOL);
        }

    }


    /**
     * Returns whether the given table exists in the database.
     *
     * @param string $table
     * @return bool
     * @throws \Exception
     */
    private function hasTable(string $table): bool
    {
        /**
         * @var $userDb LightDatabaseService
         */
        $db = $this->container->get('database');
        return $db->getMysqlInfoUtil()->hasTable($table);
    }

    /**
     * Returns an array containing the galaxy name and the planet name of the current instance.
     */
    private function extractPlanetInfo(): array
    {
        if (null === $this->planetInfo) {
            $className = get_class($this);
            $p = explode('\\', $className);
            $arr[] = array_shift($p); // galaxy
            $arr[] = array_shift($p); // planet
            $this->planetInfo = $arr;
        }
        return $this->planetInfo;
    }

}