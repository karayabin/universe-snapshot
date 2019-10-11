<?php


namespace Ling\Light_DatabaseUtils\Util;


use Ling\Bat\FileSystemTool;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Database\LightDatabasePdoWrapper;
use Ling\Light_DatabaseInfo\Service\LightDatabaseInfoService;

/**
 * The Light_DatabaseDumpUtility class.
 */
class Light_DatabaseDumpUtility
{

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;

    /**
     * Builds the Light_DatabaseDumpUtility instance.
     */
    public function __construct()
    {
        $this->container = null;
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
     * Creates a dump (aka backup) of the given table, and writes it to the filesystem,
     * in the targetDir.
     * By default, the file name is the name of the table with the sql extension.
     *
     * We can change the file name using the fileName option.
     *
     *
     *
     * The available options are:
     *
     * - fileName: string=null, the file name (the extension should be included too)
     * - useNullForAutoIncrementedKey: bool=false.
     *      If true, the generated insert statements will use the null value if the column is an auto-incremented column.
     * - returnAsString: bool=false.
     *      If true, the method will not write the file to the filesystem, but instead return it
     *      as a string.
     *
     *
     *
     *
     * @param string $table
     * @param string $targetDir
     * @param array $options
     * @return mixed
     * @throws \Exception
     */
    public function dumpTable(string $table, string $targetDir, array $options = [])
    {


        $fileName = $options['fileName'] ?? null;
        $useNullForAutoIncrementedKey = $options['useNullForAutoIncrementedKey'] ?? false;
        $returnAsString = $options['returnAsString'] ?? false;

        if (null === $fileName) {
            $fileName = $table . ".sql";
        }


        /**
         * @var $databaseInfo LightDatabaseInfoService
         */
        $databaseInfo = $this->container->get("database_info");
        $tableInfo = $databaseInfo->getTableInfo($table);
        $aik = $tableInfo['autoIncrementedKey'];
        $columns = $tableInfo['columns'];

        $s = '';
        $s .= 'INSERT INTO `' . $table . '` (';
        $c = 0;
        foreach ($columns as $col) {
            if (0 !== $c++) {
                $s .= ', ';
            }
            $s .= '`' . $col . '`';
        }
        $s .= ') VALUES ' . PHP_EOL;


        /**
         * @var $database LightDatabasePdoWrapper
         */
        $database = $this->container->get("database");
        $rows = $database->fetchAll("select * from `$table`");
        $n = count($rows);
        $c = 1;
        foreach ($rows as $row) {
            $s .= '(';
            $d = 0;
            foreach ($row as $col => $val) {
                if (0 !== $d++) {
                    $s .= ', ';
                }
                $replaced = false;
                if (true === $useNullForAutoIncrementedKey) {
                    if ($aik === $col) {
                        $val = 'NULL';
                        $replaced = true;
                    }
                }

                if (false === $replaced) {
                    $s .= "'" . $val . "'";
                } else {
                    $s .= $val;
                }

            }
            $s .= ')';
            if ($n !== $c++) {
                $s .= ',' . PHP_EOL;
            }
        }

        $s .= PHP_EOL;
        $s .= ';' . PHP_EOL;


        if (true === $returnAsString) {
            return $s;
        }
        $file = $targetDir . "/$fileName";
        FileSystemTool::mkfile($file, $s);
    }


}

