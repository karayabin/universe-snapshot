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

    public static function getInstanceInfo(\SaveOrm\Object\Object $object)
    {
        $class = get_class($object);
        $configClass = substr(str_replace('\\Object\\', '\\Conf\\', $class), 0, -6) . 'Conf';
        if (class_exists($configClass)) {
            return call_user_func([$configClass, 'getConf']);
        }
        throw new SaveException("No info for object $class");
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
    private static function getPascal($word)
    {
        return CaseTool::snakeToFlexiblePascal($word);
    }


    /**
     * I use a separate doSave method to avoid nested transactions problem.
     * This means internally, every save is operated with the doSave method.
     * The save method is just for the first call.
     */
    private function doSave(\SaveOrm\Object\Object $object, $saveType = null)
    {
        $info = self::getInstanceInfo($object);
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

            $pascal = self::getPascal($prop);
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
            $identifiers = $this->getMostRelevantIdentifiers($info, $identifierType, $values, $object);

            $where = array_intersect_key($values, array_flip($identifiers));


            $key = key($where);
            $markers = [];
            $q = "select * from `$table`";
            $pdoWhere = QuickPdoStmtTool::simpleWhereToPdoWhere($where);
            QuickPdoStmtTool::addWhereSubStmt($pdoWhere, $q, $markers);

            $_row = QuickPdo::fetch($q, $markers);

            if (false === $_row) {
                $isCreate = true;
                $whereSuccess = false;
                $managerInfo['_whereValues'] = $values;
            } else {

                /**
                 * updating values.
                 * We need to update values to fill the object with all the values it needs
                 * for the inferring/injection phase.
                 *
                 * Generally, we try to get a record from a minimum set of data (for instance only
                 * from the primary key).
                 * However, with the createUpdateByArray method, the approach is different, more like a brute
                 * force technique where the dev sets the object with all the properties she/he's got,
                 * hoping for a match.
                 * That's why the values are in the second argument of the following array_replace statement:
                 * to ensure that the values set by the dev aren't overridden by a potentially empty record.
                 */
                $managerInfo['_whereValues_'] = array_replace($_row, $values);
                $values = $_row;
                $whereSuccess = true;
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
            $updateValues = array_intersect_key($managerInfo["_whereValues_"], array_flip($changedProps));

            if (true === self::$debugSql) {
                a("[ObjectManagerDebug]: update $table, with values and where:");
                a($values);
                a($pdoWhere);
            }


            QuickPdo::update($table, $updateValues, $pdoWhere);

            /**
             * Need this line to be consistent with the _whereValues_ system tried above.
             */
            $values = array_replace($values, $updateValues);

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
                    $guestInfo = self::getInstanceInfo($guestObject);
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

                    $middleInfo = self::getInstanceInfo($middleObject);
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


    private function getMostRelevantIdentifiers(array $info, $identifierType = null, array $values = [], \SaveOrm\Object\Object $object)
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

            //--------------------------------------------
            // TAKING INTO ACCOUNT THE VALUES SET BY THE USER
            //--------------------------------------------
            // did the user set the ai?
            if (null !== $info['ai'] && array_key_exists($info['ai'], $values) && null !== $values[$info['ai']]) {
                return [$info['ai']];
            } else {

                // did the user set the primary key?
                if (count($info['primaryKey']) > 0) {


                    $class = get_class($object);
                    $newInstance = call_user_func([$class, "create"]);
                    $isSet = self::keysAreChecked($info['primaryKey'], $values, $info, $newInstance);


                    if (true === $isSet) {
                        return $info['primaryKey'];
                    }
                }


                // did the user set a unique index?
                if (count($info['uniqueIndexes']) > 0) {
                    $class = get_class($object);
                    $newInstance = call_user_func([$class, "create"]);

                    foreach ($info['uniqueIndexes'] as $k => $keys) {
                        $isSet = self::keysAreChecked($keys, $values, $info, $newInstance);
                        if (true === $isSet) {
                            return current($info['uniqueIndexes']);
                        }
                    }
                }

            }

            //--------------------------------------------
            // FIND THE IDENTIFIER BASED ON THE TABLE/OBJECT INFO
            //--------------------------------------------
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


    private static function keysAreChecked(array $keys, array $values, array $info, \SaveOrm\Object\Object $newInstance)
    {
        /**
         * We want to access the default values of the object.
         * In this implementation, we do so by using an empty instance.
         */
        $nullables = $info['nullables'];

        $isSet = true;
        foreach ($keys as $key) {

            if (in_array($key, $nullables)) {
                // a nullable key is always considered as set with this algorithm
                continue;
            }
            /**
             * if it's not nullable, we consider it is set if it's different
             * than the default value.
             */
            $method = "get" . self::getPascal($key);
            $defaultVal = $newInstance->$method();

            if (array_key_exists($key, $values) && $values[$key] === $defaultVal) {
                $isSet = false;
                break;
            }
        }
        return $isSet;
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
        return $methodPrefix . self::getPascal($table);
    }

    private function getMethodByProperty($prefix, $property)
    {
        return $prefix . self::getPascal($property);
    }


}