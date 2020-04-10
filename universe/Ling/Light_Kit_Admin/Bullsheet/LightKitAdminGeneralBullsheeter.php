<?php


namespace Ling\Light_Kit_Admin\Bullsheet;


use Ling\Bat\RandomTool;
use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Bullsheet\Bullsheeter\LightBullsheeterInterface;
use Ling\Light_Database\Service\LightDatabaseService;
use Ling\Light_DatabaseInfo\Service\LightDatabaseInfoService;

/**
 * The LightKitAdminGeneralBullsheeter class.
 */
class LightKitAdminGeneralBullsheeter implements LightBullsheeterInterface, LightServiceContainerAwareInterface
{

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;

    /**
     * This property holds the fkCache for this instance.
     * An array of foreign key to possible values. Only used in the context of the generateRow method.
     * @var array
     */
    private $_fkCache;


    /**
     * Builds the LightKitAdminGeneralBullsheeter instance.
     */
    public function __construct()
    {
        $this->container = null;
        $this->_fkCache = [];
    }


    /**
     * @implementation
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }


    /**
     * @implementation
     */
    public function generateRows(int $nbRows, array $options = [])
    {
        $table = $options['table'];
        for ($i = 0; $i < $nbRows; $i++) {
            $this->generateRow($table);
        }
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Generates a random row for the given table.
     *
     * @param string $table
     * @throws \Exception
     */
    protected function generateRow(string $table)
    {


        /**
         * @var $db LightDatabaseService
         */
        $db = $this->container->get("database");
        /**
         * @var $exception \Exception
         */
        $exception = null;
        $res = $db->transaction(function () use ($db, $table) {


            $this->_fkCache = [];

            /**
             * @var $dbInfo LightDatabaseInfoService
             */
            $dbInfo = $this->container->get('database_info');


            $dbInfo->setContainer($this->container);
            $tableInfo = $dbInfo->getTableInfo($table);
            $types = $tableInfo['types'];
            $simpleTypes = $tableInfo['simpleTypes'];
            $aik = $tableInfo['autoIncrementedKey'];
            $fkInfo = $tableInfo['foreignKeysInfo'];


            $row = [];

            foreach ($types as $col => $type) {
                if ($col !== $aik) {

                    if (array_key_exists($col, $fkInfo)) {
                        if (false === array_key_exists($col, $this->_fkCache)) {
                            list($fkDb, $fkTable, $fkCol) = $fkInfo[$col];
                            $fkValues = $db->fetchAll("select `$fkCol` from `$fkDb`.`$fkTable` limit 0, 1000", [], \PDO::FETCH_COLUMN);
                            $this->_fkCache[$col] = $fkValues;
                        }
                        $value = $this->_fkCache[$col][rand(0, count($this->_fkCache[$col]) - 1)];
                    } else {
                        switch ($type) {
                            case "date":
                                $value = RandomTool::randomDate();
                                break;
                            case "datetime":
                                $value = RandomTool::randomDatetime();
                                break;
                            case "char(1)":
                                $value = (string)rand(0, 1);
                                break;
                            default:
                                $simpleType = $simpleTypes[$col];
                                switch ($simpleType) {
                                    case "int":
                                        $value = rand(1, 9999999);
                                        break;
                                    default:
                                        $value = RandomTool::randomString(10);
                                        break;
                                }
                                break;
                        }
                    }
                    $row[$col] = $value;
                }
            }


            $db->insert($table, $row);

        }, $exception);

        if (false === $res) {
            throw $exception;
        }

    }


}