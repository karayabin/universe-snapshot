<?php


namespace SaveOrm\ObjectManager;


use Bat\CaseTool;
use OrmTools\Helper\OrmToolsHelper;
use QuickPdo\QuickPdo;
use QuickPdo\QuickPdoStmtTool;
use SaveOrm\Exception\SaveException;

class ObjectManager
{

    public static $debugSql = false;


    // contextual
    private $_savedObject;
    private $_saveResults;


    public function __construct()
    {
        $this->_saveResults = [];
    }


    public static function create()
    {
        return new static();
    }

    /**
     * see save.md for details about this method
     */
    public function save(\SaveOrm\Object\Object $object)
    {
        $ret = null;
        $this->_saveResults = [];
        $this->_savedObject = $object;
        QuickPdo::transaction(function () use ($object, &$ret) {
            $ret = $this->doSave($object);
        }, function (\Exception $e) {
//            a($this->_saveResults);
            throw $e;
        });
        return $ret;
    }


    /**
     * @return array
     */
    public function getSaveResults()
    {
        return $this->_saveResults;
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @return array
     */
    protected function getGeneralConfig()
    {
        return [];
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * I use a separate doSave method to avoid nested transactions problem.
     * This means internally, every save is operated with the doSave method.
     * The save method is just for the first call.
     */
    private function doSave(\SaveOrm\Object\Object $object, $saveType = null)
    {
        $info = $this->getInstanceInfo($object);
        $generalConfig = $this->getGeneralConfig();
        $table = $info['table'];
        $properties = $info['properties'];
        $nullables = $info['nullables'];
        $foreignKeys = $info['fks'];
        $ai = $info['ai'];
        $uniqueIndexes = $info['uniqueIndexes'];
        $primaryKey = $info['primaryKey'];
        $ric = (array_key_exists('ric', $info)) ? $info['ric'] : [];
        $bindings = (array_key_exists('bindings', $info)) ? $info['bindings'] : [];
        $childrenTables = (array_key_exists('childrenTables', $info)) ? $info['childrenTables'] : [];
        $allPrefixes = (array_key_exists('tablePrefixes', $generalConfig)) ? $generalConfig['tablePrefixes'] : [];
        $managerInfo = $object->_getManagerInfo();


        //--------------------------------------------
        // SIBLINGS FIRST
        //--------------------------------------------
        foreach ($foreignKeys as $foreignKey => $fkInfo) {
            $siblingTable = $fkInfo[0];
            $siblingColumn = $fkInfo[1];
            $siblingGetMethod = $this->getMethodByTable('get', $siblingTable, $allPrefixes);

            if (method_exists($object, $siblingGetMethod)) {
                $siblingObject = $object->$siblingGetMethod();
                if (null !== $siblingObject) {
                    $this->doSave($siblingObject);

                    // setting back the sibling value into the source object
                    $getter = $this->getMethodByProperty('get', $siblingColumn);
                    $setter = $this->getMethodByProperty('set', $foreignKey);

                    $siblingValue = $siblingObject->$getter();
                    $object->$setter($siblingValue);

                }
            }
        }


        //--------------------------------------------
        // CHECKING VALUES
        //--------------------------------------------
        $values = [];
        foreach ($properties as $prop) {

            $pascal = $this->getPascal($prop);
            $method = 'get' . $pascal;
            $value = $object->$method();

            // unresolved foreign keys?
            if (true === $this->isForeignKey($prop, $foreignKeys) && null === $value && false === in_array($prop, $nullables)) {
                $this->saveError("Unresolved foreign key for table $table, column $prop");
            }
            $values[$prop] = $value;
        }


        /**
         * At this point, values has been resolved and verified,
         * we can now safely record to the database
         */
        //--------------------------------------------
        // CREATE OR UPDATE?
        //--------------------------------------------
        $isCreate = ('insert' === $managerInfo['mode']);
        $whereSuccess = $managerInfo['whereSuccess'];


        //--------------------------------------------
        // NOW SAVE
        //--------------------------------------------
        if (null === $managerInfo['where']) { // createUpdate
            /**
             * We need to check whether or not the record exist first,
             * alike the createByXXX equivalent methods.
             */
            $identifierType = $managerInfo['identifierType'];
            $identifiers = $this->getMostRelevantIdentifiers($info, $identifierType);
            $where = array_intersect_key($values, array_flip($identifiers));


            $key = key($where);
            $markers = [];
            $q = "select * from `$table`";
            $pdoWhere = QuickPdoStmtTool::simpleWhereToPdoWhere($where);
            QuickPdoStmtTool::addWhereSubStmt($pdoWhere, $q, $markers);
            $_row = QuickPdo::fetch($q, $markers);

            if (false === $_row) {
                $isCreate = true;
            } else {

                /**
                 * updating values.
                 * We need to update values to fill the object with all the values it needs
                 * for the inferring/injection phase.
                 */
                $values = $_row;

                $isCreate = false;
                $managerInfo['where'] = $where; // updating where
            }
        }


        if (
            true === $isCreate ||
            (false === $isCreate && false === $whereSuccess)
        ) {
            if (true === self::$debugSql) {
                a("[ObjectManagerDebug]: insert in $table, with values:");
                a($values);
            }

            $ret = QuickPdo::insert($table, $values);
            if (null !== $ai && false !== $ret) {
                $values[$ai] = (int)$ret;
            }
        } else {
            $where = $managerInfo['where'];
            $pdoWhere = QuickPdoStmtTool::simpleWhereToPdoWhere($where);

            // filtering values, we only update the properties that the user set manually
            $changedProps = $managerInfo['changedProperties'];
            $updateValues = array_intersect_key($values, array_flip($changedProps));
            if (true === self::$debugSql) {
                a("[ObjectManagerDebug]: update $table, with values and where:");
                a($values);
                a($pdoWhere);
            }

            QuickPdo::update($table, $updateValues, $pdoWhere);

        }

        //--------------------------------------------
        // RETURN VALUE
        //--------------------------------------------
        $ret = $values;


        $this->_saveResults[$table][] = $ret;


        //--------------------------------------------
        // INJECTION (I don't remember why this is necessary)
        //--------------------------------------------
        foreach ($values as $k => $v) {
            $setter = $this->getMethodByProperty('set', $k);
            $object->$setter($v);
        }


        //--------------------------------------------
        // BINDINGS
        //--------------------------------------------
        if ($bindings) {
            foreach ($bindings as $guestLink) {
                list($guestDb, $guestLink) = explode('.', $guestLink);
                list($guestTable, $guestColumn) = $this->getLinkInfo($guestLink);
                $method = $this->getMethodByTable('get', $guestTable, $allPrefixes);


                $guestObject = $object->$method();
                if (null !== $guestObject) {

                    // pass the newly created host data to the guest object
                    $guestInfo = $this->getInstanceInfo($guestObject);
                    $fks = $guestInfo['fks'];
                    $fksInfo = $this->getForeignKeysInfoPointingTo($table, $fks, $guestTable, $guestColumn);
                    /**
                     * Injection, only if the value hasn't been set manually (or by using a createByXXX method)
                     */
                    $guestInfo = $guestObject->_getManagerInfo();

                    $guestChangedProps = $guestInfo['changedProperties'];

                    foreach ($fksInfo as $fkInfo) {


                        list($foreignKey, $referencedKey) = $fkInfo;


                        if (!in_array($foreignKey, $guestChangedProps)) {
                            $getMethod = $this->getMethodByProperty('get', $referencedKey);
                            $setMethod = $this->getMethodByProperty('set', $foreignKey);
                            $value = $object->$getMethod();
                            $guestObject->$setMethod($value);
                        }
                    }

                    $this->doSave($guestObject);
                }
            }
        }


        //--------------------------------------------
        // CHILDREN RELATIONSHIP
        //--------------------------------------------
        // right table
        //--------------------------------------------
        foreach ($childrenTables as $childrenItem) {
            list($rightTable, $middleLeftForeignKey, $middleRightForeignKey) = $childrenItem;

            $rightTablePlural = OrmToolsHelper::getPlural($rightTable);
            $accessor = $this->getMethodByTable("get", $rightTablePlural, $allPrefixes);
            if (method_exists($object, $accessor)) {
                $rightObjects = $object->$accessor();


                foreach ($rightObjects as $rightObject) {

                    $this->doSave($rightObject, 'children');


                    $middleObject = $rightObject->_has_;

                    $middleInfo = $this->getInstanceInfo($middleObject);
                    $middleFKeys = $middleInfo['fks'];


                    // left injection on middle object
                    if (array_key_exists($middleLeftForeignKey, $middleFKeys)) {
                        $col = $middleFKeys[$middleLeftForeignKey][1];
                        $getMethod = $this->getMethodByProperty('get', $col);
                        $setMethod = $this->getMethodByProperty('set', $middleLeftForeignKey);
                        $value = $object->$getMethod();
                        $middleObject->$setMethod($value);
                    } else {
                        $this->saveError("Invalid middleLeftForeignKey: $middleLeftForeignKey");
                    }


                    // right injection on middle object
                    if (array_key_exists($middleRightForeignKey, $middleFKeys)) {
                        $col = $middleFKeys[$middleRightForeignKey][1];
                        $getMethod = $this->getMethodByProperty('get', $col);
                        $setMethod = $this->getMethodByProperty('set', $middleRightForeignKey);
                        $value = $rightObject->$getMethod();
                        $middleObject->$setMethod($value);
                    } else {
                        $this->saveError("Invalid middleLeftForeignKey: $middleRightForeignKey");
                    }

                    $this->doSave($middleObject, 'children');

                }
            }

        }


        return $ret;
    }


    private function getLinkInfo($link)
    {
        $p = explode(".", $link, 2);
        if (false === array_key_exists(1, $p)) {
            $p[1] = null;
        }
        return $p;
    }


    private function getMostRelevantIdentifiers(array $info, $identifierType = null)
    {
        if (null !== $identifierType) {
            switch ($identifierType) {
                case "ai":
                    return [$info['ai']];
                    break;
                case "pk":
                    return $info['primaryKey'];
                    break;
                case "uq":
                    return current($info['uniqueIndexes']);
                    break;
                case "ric":
                    return $info['ric'];
                    break;
                case "pr":
                    return $info['properties'];
                    break;
                case "prm":
                    return array_diff($info['properties'], $info['primaryKey']);
                    break;
                default:
                    $this->saveError("Unknown identifierType $identifierType");
                    break;
            }
        } else {
            if (null !== $info['ai']) {
                return [$info['ai']];
            } elseif (count($info['primaryKey']) > 0) {
                return $info['primaryKey'];
            } elseif (count($info['uniqueIndexes']) > 0) {
                return current($info['uniqueIndexes']);
            }
            return $info['properties'];
        }
    }


    /**
     * @param $referencedTable
     * @param array $sourceForeignKeys
     * @param $sourceTable
     * @param $sourceColumn
     * @return array [sourceColumn, referencedColumn]
     */
    private function getForeignKeysInfoPointingTo($referencedTable, array $sourceForeignKeys, $sourceTable, $sourceColumn)
    {
        $tableFKeys = [];
        foreach ($sourceForeignKeys as $column => $fkInfo) {
            list($refTable, $refColumn) = $fkInfo;

            $ret = [$column, $refColumn];

            if ($sourceColumn === $column) {
                return $ret;
            }

            if ($refTable === $referencedTable) {
                $tableFKeys[] = $ret;
            }
        }

        return $tableFKeys;
    }


    private function isForeignKey($key, $foreignKeys)
    {
        return array_key_exists($key, $foreignKeys);
    }

    private function saveError($msg)
    {
        $class = get_class($this->_savedObject);
        throw new SaveException("Problem with saving $class: $msg");
    }

    private function getPascal($word)
    {
        return CaseTool::snakeToFlexiblePascal($word);
    }

    /**
     * @param array $cols , array of columnName
     * @param array $values , pool of available values (k => v)
     * @param $table
     * @param $where , collects the where info for later use
     * @return bool
     */
    private function existByColumns(array $cols, array $values, $table, array &$where = [])
    {
        $where = [];
        foreach ($values as $k => $v) {
            if (in_array($k, $cols)) {
                $where[$k] = $v;
            }
        }
        $anyField = current($cols);
        $q = "select `$anyField` from " . $table;
        $markers = [];
        $pdoWhere = QuickPdoStmtTool::simpleWhereToPdoWhere($where);
        QuickPdoStmtTool::addWhereSubStmt($pdoWhere, $q, $markers);
        $row = QuickPdo::fetch($q, $markers);
        if (false !== $row) {
            return true;
        }
        return false;
    }

    private function isCreate(array $options, array &$where = [])
    {
        $ai = $options['ai'];
        $values = $options['values'];
        $primaryKey = $options['pk'];
        $table = $options['table'];
        $ric = $options['ric'];
        $uniqueIndexes = $options['uniqueIndexes'];
        $changedProps = $options['changedProps'];


        $isCreate = true;
        if (null !== $ai) {
            if (null === $values[$ai]) {
                $isCreate = true;
                $this->registerIsCreate("ai=null", $table, $isCreate);
            } else {
                $isCreate = (false === $this->existByColumns([$ai], $values, $table, $where));
                $this->registerIsCreate("ai found", $table, $isCreate);
            }
        }

        if (true === $isCreate) {
            if (count($primaryKey) > 0) {
                $isCreate = (false === $this->existByColumns($primaryKey, $values, $table, $where));
                $this->registerIsCreate("pk found", $table, $isCreate);
            }
            if (true === $isCreate) {
                if (count($uniqueIndexes) > 0) {
                    foreach ($uniqueIndexes as $uniqueIndex) {
                        $isCreate = (false === $this->existByColumns($uniqueIndex, $values, $table, $where));
                        if (false === $isCreate) {
                            $this->registerIsCreate("uk found", $table, $isCreate);
                            break;
                        }
                    }
                }
                if (true === $isCreate) {
                    if (count($ric) > 0) {
                        $isCreate = (false === $this->existByColumns($ric, $values, $table, $where));
                        $this->registerIsCreate("ric found", $table, $isCreate);
                    }
                    if (true === $isCreate) {
                        $isCreate = (false === $this->existByColumns(array_keys($values), $values, $table, $where));
                        $this->registerIsCreate("wild record found", $table, $isCreate);
                    }
                }
            }
        }
        return $isCreate;
    }


    private function getMethodByTable($methodPrefix, $table, $tablePrefix)
    {
        if (!empty($tablePrefix)) {

            if (!is_array($tablePrefix)) {
                $tablePrefix = [$tablePrefix];
            }
            foreach ($tablePrefix as $prefix) {
                if (0 === strpos($table, $prefix)) {
                    $table = substr($table, strlen($prefix));
                    break; // only one suffix can apply
                }
            }
        }
        return $methodPrefix . $this->getPascal($table);
    }

    private function getMethodByProperty($prefix, $property)
    {
        return $prefix . $this->getPascal($property);
    }

    private function getInstanceInfo(\SaveOrm\Object\Object $object)
    {
        $class = get_class($object);
        $configClass = substr(str_replace('\\Object\\', '\\Conf\\', $class), 0, -6) . 'Conf';
        if (class_exists($configClass)) {
            return call_user_func([$configClass, 'getConf']);
        }
        throw new SaveException("No info for object $class");
    }

}