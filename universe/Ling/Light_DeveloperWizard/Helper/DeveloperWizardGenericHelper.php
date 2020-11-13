<?php


namespace Ling\Light_DeveloperWizard\Helper;


use Ling\Bat\BDotTool;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Database\Service\LightDatabaseService;
use Ling\Light_DeveloperWizard\Exception\LightDeveloperWizardException;
use Ling\Light_DeveloperWizard\Tool\DeveloperWizardFileTool;
use Ling\SimplePdoWrapper\Util\MysqlInfoUtil;
use Ling\SqlWizard\Util\MysqlStructureReader;

/**
 * The DeveloperWizardGenericHelper class.
 */
class DeveloperWizardGenericHelper
{


    /**
     * Returns a symbolic path, where the given absolute path to the application directory is replaced by the symbol [app].
     *
     * @param string $path
     * @param string $appDir
     * @return string
     */
    public static function getSymbolicPath(string $path, string $appDir): string
    {
        $p = explode($appDir, $path, 2);
        if (2 === count($p)) {
            return '[app]' . array_pop($p);
        }
        return $path;
    }


    /**
     * Returns the name of the tables found in the given create file.
     *
     * @param string $createFile
     * @return array
     */
    public static function getTablesByCreateFile(string $createFile): array
    {
        $reader = new MysqlStructureReader();
        $infos = $reader->readFile($createFile);
        return array_keys($infos);
    }


    /**
     * Returns the table prefix from either the preferences (if found), or guessed from the given createFile otherwise.
     *
     * @param string $planetDir
     * @param string $createFile
     * @return string
     * @throws \Exception
     */
    public static function getTablePrefix(string $planetDir, string $createFile): string
    {
        $preferences = DeveloperWizardFileTool::getPreferences($planetDir);
        $tablePrefix = BDotTool::getDotValue("general.table_prefix", $preferences, null);

        // guessing the table prefix
        //--------------------------------------------
        if (null === $tablePrefix) {
            $reader = new MysqlStructureReader();
            $infos = $reader->readFile($createFile);
            $firstTable = key($infos);
            $p = explode('_', $firstTable, 2);
            if (1 === count($p)) {
                throw new LightDeveloperWizardException("I wasn't able to guess the prefix for table $firstTable.");
            } else {
                $tablePrefix = array_shift($p);
                // memorizing...
                DeveloperWizardFileTool::updateFile($planetDir, [
                    "general" => [
                        "table_prefix" => $tablePrefix,
                    ],
                ]);
            }
        }
        return $tablePrefix;
    }


    /**
     * Returns an array of table prefixes found from the given create file.
     * The first prefix is the main prefix (representing the plugin).
     *
     * The returned array contains at least one entry, or otherwise an exception is thrown.
     *
     *
     * @param string $createFile
     * @param LightServiceContainerInterface $container
     * @return array
     * @throws \Exception
     */
    public static function getTablePrefixes(string $createFile, LightServiceContainerInterface $container): array
    {
        $ret = [];

        /**
         * @var $db LightDatabaseService
         */
        $db = $container->get("database");
        $util = new MysqlInfoUtil();
        $util->setWrapper($db);


        $reader = new MysqlStructureReader();
        $infos = $reader->readFile($createFile);
        $mainPrefix = null;

        $potentialPrefixes = $util->getPotentialTablePrefixes();

        if (empty($infos)) {
            throw new LightDeveloperWizardException("No table found based on this create file: \"$createFile\".");
        }


        foreach ($infos as $table => $tableInfo) {
            if (null === $mainPrefix) {
                $p = explode('_', $table, 2);
                if (1 === count($p)) {
                    throw new LightDeveloperWizardException("I wasn't able to guess the prefix for table $table.");
                }
                $mainPrefix = array_shift($p);
                $ret[] = $mainPrefix;
            }

            $fKeys = $tableInfo['fkeys'];
            foreach ($fKeys as $fkeyInfo) {
                $fkeyTable = $fkeyInfo[1];
                $p = explode('_', $fkeyTable, 2);
                if (count($p) > 1) {
                    $prefix = array_shift($p);
                    if (true === in_array($prefix, $potentialPrefixes, true)) {
                        $ret[] = $prefix;
                    }
                }


            }
        }


        $ret = array_unique($ret);
        return $ret;
    }


}