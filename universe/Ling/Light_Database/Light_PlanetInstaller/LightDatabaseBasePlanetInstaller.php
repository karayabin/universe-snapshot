<?php


namespace Ling\Light_Database\Light_PlanetInstaller;


use Ling\CliTools\Output\OutputInterface;
use Ling\Light_Database\Exception\LightDatabaseException;
use Ling\Light_Database\Service\LightDatabaseService;
use Ling\Light_DbSynchronizer\Helper\LightDbSynchronizerHelper;
use Ling\Light_PlanetInstaller\PlanetInstaller\LightBasePlanetInstaller;
use Ling\Light_PlanetInstaller\PlanetInstaller\LightPlanetInstallerInit3HookInterface;
use Ling\UniverseTools\PlanetTool;


/**
 * The LightDatabaseBasePlanetInstaller class.
 */
class LightDatabaseBasePlanetInstaller extends LightBasePlanetInstaller implements LightPlanetInstallerInit3HookInterface
{

    /**
     * An internal cache for the planet dot name array.
     * @var array|null
     */
    private array|null $planetInfo;


    /**
     * Builds the LightDatabaseBasePlanetInstaller instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->planetInfo = null;
    }


    //--------------------------------------------
    // LightPlanetInstallerInit3HookInterface
    //--------------------------------------------
    /**
     * @implementation
     */
    public function init3(string $appDir, OutputInterface $output, array $options = []): void
    {

        list($galaxy, $planet) = $this->extractPlanetInfo();

        //--------------------------------------------
        // CREATE FILE SYNCHRONIZATION
        //--------------------------------------------
        $this->synchronizeDatabaseIfCreateFileByPlanetDotName($output, "$galaxy.$planet", $appDir);


    }


    /**
     * @implementation
     */
    public function undoInit3(string $appDir, OutputInterface $output, array $options = []): void
    {
        list($galaxy, $planet) = $this->extractPlanetInfo();


        $isUpgrade = $options["isUpgrade"] ?? false;


        /**
         * For now we consider that when upgrading, the tables shouldn't be dropped.
         */
        if (false === $isUpgrade) {

            //--------------------------------------------
            // REMOVE SCOPE TABLES
            //--------------------------------------------
            $tables = null;
            $createFile = $this->container->getApplicationDir() . "/universe/$galaxy/$planet/assets/fixtures/create-structure.sql";
            if (true === file_exists($createFile)) {
                $tables = LightDbSynchronizerHelper::guessScopeByCreateFile($createFile, $this->container);
            }

            if (null !== $tables) {
                $output->write("Removing tables for planet <b>$galaxy.$planet</b>." . PHP_EOL);
                $this->dropTables($tables, $output);
            } else {
                throw new LightDatabaseException("$galaxy.$planet->LightDatabaseBasePlanetInstaller->undoInit3: The given \"tables\" is null, and there is no \"create file\". Please provide at least one of those. Aborting.");
            }
        }


    }



    //--------------------------------------------
    //
    //--------------------------------------------


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


    /**
     * Synchronizes the planet's schema with the existing database.
     *
     * @param OutputInterface $output
     * @param string $planetDotName
     * @param string $appDir
     */
    private function synchronizeDatabaseIfCreateFileByPlanetDotName(OutputInterface $output, string $planetDotName, string $appDir)
    {

        $createFile = $appDir . "/universe/" . PlanetTool::getPlanetSlashNameByDotName($planetDotName) . "/assets/fixtures/create-structure.sql";
        if (true === file_exists($createFile)) {
            $output->write("synchronizing <b>create file</b> for planet <red>$planetDotName</red>." . PHP_EOL);
            LightDbSynchronizerHelper::synchronizePlanetCreateFile($planetDotName, $this->container, [
                'scope' => null, // for now, we rely on guessing which does a good job so far
            ]);
        }
    }


}