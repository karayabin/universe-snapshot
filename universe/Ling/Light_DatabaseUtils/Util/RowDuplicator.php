<?php


namespace Ling\Light_DatabaseUtils\Util;

use Ling\ArrayToString\ArrayToStringTool;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Database\Service\LightDatabaseService;
use Ling\Light_DatabaseUtils\Exception\LightDatabaseUtilsException;
use Ling\SimplePdoWrapper\SimplePdoWrapper;
use Ling\SimplePdoWrapper\Util\MysqlInfoUtil;

/**
 * The RowDuplicator class.
 */
class RowDuplicator
{


    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;

    /**
     * This property holds the mainTable for this instance.
     * @var string
     */
    private $mainTable;


    /**
     * Builds the LkaBaseRowDuplicator instance.
     */
    public function __construct()
    {
        $this->container = null;
        $this->mainTable = null;
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
     *
     * Duplicates the rows identified by the given rics, of the given table.
     *
     * Available options are:
     *
     * - deep: bool=false, whether to perform a deep duplicate
     *
     *
     *
     * @param string $table
     * @param array $rics
     * @param array $options
     * @throws \Exception
     */
    public function duplicate(string $table, array $rics, array $options = [])
    {
        $this->mainTable = $table;
        $deep = $options['deep'] ?? false;
        $this->doDuplicate($table, $rics, [
            'deep' => $deep,
        ]);
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     *
     * Duplicates the rows identified by the given rics, of the given table.
     *
     * Available options are:
     *
     * - deep: bool=false, whether to perform a deep duplicate
     * - forceValues: array. If set, will be merged with the data used to create the duplicated row.
     * - allowMany: bool=false. Whether to allow duplication of a table if it's a "many to many" relationship table. By default, it's not allowed.
     *
     *
     *
     * @param string $table
     * @param array $rics
     * @param array $options
     * @throws \Exception
     */
    protected function doDuplicate(string $table, array $rics, array $options = [])
    {


        $deep = $options['deep'] ?? false;
        $allowMany = $options['allowMany'] ?? false;
        $forceValues = $options['forceValues'] ?? null;


        /**
         * @var $db LightDatabaseService
         */
        $db = $this->container->get("database");
        $util = $db->getMysqlInfoUtil();


        $isMany = $util->isManyToManyTable($table);
        if (false === $allowMany && true === $isMany) {
            $this->error("Cannot duplicate a table with \"many to many\" relationships ($table).");
        }

        $ukeys = $util->getUniqueIndexColumnsOnly($table);
        $fkeysInfo = $util->getForeignKeysInfo($table);
        $fkeys = array_keys($fkeysInfo);
        $ai = $util->getAutoIncrementedKey($table);
        $types = $util->getColumnTypes($table);


//        az($rics, $ai, $fkeys, $fkeysInfo, $ukeys, $types);

        $textTypesTriggerChange = [
            // we don't include char here, for now, because it' often char 1, which shouldn't trigger a value change
            'varchar',
            'tinytext',
            'text',
            'mediumtext',
            'longtext',
        ];

        //--------------------------------------------
        // SIMPLE DUPLICATE
        //--------------------------------------------

        $q1 = "select * from `$table`";

        foreach ($rics as $ric) {


            //--------------------------------------------
            // GATHER THE NEW ROW
            //--------------------------------------------
            $q = $q1;
            $markers = [];
            SimplePdoWrapper::addWhereSubStmt($q, $markers, $ric);
            $row = $db->fetch($q, $markers);
            if (false !== $row) {
                $newRow = [];
                foreach ($row as $column => $value) {


                    if (null !== $forceValues && array_key_exists($column, $forceValues)) {
                        $newVal = $forceValues[$column];
                    } elseif ($ai === $column) {
                        $newVal = null;
                    } else {

                        if (false === array_key_exists($column, $types)) {
                            $this->error("Cannot find the type for column $column, with ric=" . ArrayToStringTool::toInlinePhpArray($ric));
                        }
                        $type = $types[$column];


                        if (
                            true === in_array($column, $ukeys, true) &&
                            false === in_array($column, $fkeys, true)
                        ) {
                            if (true === in_array($type, $textTypesTriggerChange, true)) {

                                // testing if the new record would exist,
                                // and changing the value until it doesn't
                                do {


                                    /**
                                     * Note that here we blindly add 8 chars to the value, without
                                     * consideration of whether the storage would allow it.
                                     * But for now that's our approach.
                                     *
                                     * When this fails because of a concrete case requires so,
                                     * this code needs to be updated...
                                     *
                                     */
                                    $testNewVal = $value;
                                    $tail = "-" . sprintf("%'.07d", rand(0, 9999999));


                                    if (strlen($testNewVal) > 8) {
                                        $end = substr($testNewVal, -8);
                                        if (preg_match('!-[0-9]{7}!', $end, $match)) {
                                            $testNewVal = substr($value, 0, -8) . $tail;
                                        } else {
                                            $testNewVal .= $tail;
                                        }
                                    } else {
                                        $testNewVal .= $tail;
                                    }

                                    $q2 = $q1;
                                    $markers2 = [];
                                    $newRic = $ric;
                                    $newRic[$column] = $testNewVal;
                                    SimplePdoWrapper::addWhereSubStmt($q2, $markers2, $newRic);
                                } while (false !== $db->fetch($q2, $markers2));

                                $newVal = $testNewVal;
                            } else {
                                $newVal = $value;
                            }
                        } else {
                            $newVal = $value;
                        }
                    }

                    $newRow[$column] = $newVal;
                }

                //--------------------------------------------
                // INSERT THE NEW ROW
                //--------------------------------------------
                if (false === ($lastInsertId = $db->insert($table, $newRow))) {
                    $this->error("Unable to insert the duplicate row in the database, with ric=" . ArrayToStringTool::toInlinePhpArray($ric));
                }
                $this->onInsertAfter($this->mainTable, $table, $row, $newRow, $lastInsertId);


                //--------------------------------------------
                // DEEP DUPLICATION
                //--------------------------------------------
                if (true === $deep) {


                    //--------------------------------------------
                    // PREPARE THE NEW RIC
                    //--------------------------------------------
                    /**
                     * Here we want to access the ric.
                     * Usually a table has an auto-incremented key which is also the primary column.
                     * But that's not always the case.
                     * Some tables don't have an ai, some even don't have a primary key.
                     * So we rely on the (extended) ric to identify a row.
                     *
                     * Our trick here is that if the table doesn't have an auto-incremented key which is also primary,
                     * then the caller already knows the given ric.
                     *
                     * In any case, if an auto-incremented value is found in the ric, it should be replaced by the lastInserted value returned
                     * when we inserted the row
                     */
                    $newRic = $ric;
                    foreach ($newRic as $col => $value) {
                        if ($ai === $col) {
                            $newRic[$col] = $lastInsertId;
                            break;
                        }
                    }

                    // so now we have the old and new ric


                    // do we have any dependent tables?
                    $dependentTables = $this->getDependentTables($table, $util);
                    if ($dependentTables) {
                        foreach ($dependentTables as $dependentTable) {


                            $dependentIsMany = $util->isManyToManyTable($dependentTable);


                            //--------------------------------------------
                            // SELECT THE OWNED ROWS
                            //--------------------------------------------
                            // first find the foreign keys referencing the main table
                            $dependentFkeysInfo = $util->getForeignKeysInfo($dependentTable);
                            $dric = $util->getRic($dependentTable);
                            $ric2Fk = [];
                            foreach ($dependentFkeysInfo as $col => $dInfo) {
                                if ($table === $dInfo[1]) {
                                    $ric2Fk[$dInfo[2]] = $col;
                                }
                            }
                            if (count($ric2Fk) !== count($ric)) {
                                /**
                                 * Not sure if it's a real error, but for now, I'm in doubt...
                                 * If you find a concrete case where this is an error, please remove this error triggering.
                                 */
                                $this->error("Couldn't find all the foreign keys from table $dependentTable to table $table, with ric=" . ArrayToStringTool::toInlinePhpArray($ric));
                            }


                            // then prepare the ric used to fetch the owned rows
                            $fetchRic = [];
                            foreach ($ric as $k => $v) {
                                if (array_key_exists($k, $ric2Fk)) {
                                    $k = $ric2Fk[$k];
                                }
                                $fetchRic[$k] = $v;
                            }

                            // and prepare the foreign key values for the duplicate rows, with the new owner
                            $fetchRicNew = [];
                            foreach ($newRic as $k => $v) {
                                if (array_key_exists($k, $ric2Fk)) {
                                    $k = $ric2Fk[$k];
                                }
                                $fetchRicNew[$k] = $v;
                            }


                            // now collect the rows
                            $dq = "select * from `$dependentTable`";
                            $dmarkers = [];
                            SimplePdoWrapper::addWhereSubStmt($dq, $dmarkers, $fetchRic);
                            $drows = $db->fetchAll($dq, $dmarkers);


                            // gather all rics for the dependent table
                            $drics = [];
                            foreach ($drows as $drow) {
                                $dricConcrete = [];
                                foreach ($dric as $col) {
                                    if (array_key_exists($col, $drow)) {
                                        $dricConcrete[$col] = $drow[$col];
                                    }
                                }
                                $drics[] = $dricConcrete;
                            }


                            //--------------------------------------------
                            // DUPLICATE THE OWNED ROWS
                            //--------------------------------------------
                            // now call duplicate recursively
                            $this->doDuplicate($dependentTable, $drics, [
                                'deep' => true,
                                'forceValues' => $fetchRicNew,
                                'allowMany' => $dependentIsMany,
                            ]);


                        }
                    }


                }

            } else {
                $this->error("Cannot access the row to duplicate, with ric: " . ArrayToStringTool::toInlinePhpArray($ric));
            }
        }

    }


    /**
     * Hook method called whenever a new row is inserted in the database via the duplicate method.
     *
     *
     * @param string $mainTable
     * @param string $table
     * @param array $oldRow
     * @param array $newRow
     * @param null $lastInsertId
     */
    protected function onInsertAfter(string $mainTable, string $table, array $oldRow, array $newRow, $lastInsertId = null)
    {

    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns an array of dependent tables.
     *
     * A dependent table is a table that contains rows owned by the entity represented by the given main table.
     * The concept of owning is described in more details in @page(the deep duplication section of the duplicate rows conception notes) document.
     *
     * @param string $table
     * @param MysqlInfoUtil $util
     * @return array
     */
    private function getDependentTables(string $table, MysqlInfoUtil $util): array
    {
        $ret = [];
        $tables = $util->getReferencedByTables($table);
        foreach ($tables as $_table) {
            // removing the db prefix.
            $p = explode('.', $_table, 2);
            $ret[] = array_pop($p);
        }
        return $ret;
    }


    /**
     * Throws an exception.
     *
     * @param string $msg
     * @param int|null $code
     * @throws \Exception
     */
    private function error(string $msg, int $code = null)
    {
        throw new LightDatabaseUtilsException($msg, $code);
    }
}