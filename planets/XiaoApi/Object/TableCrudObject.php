<?php


namespace XiaoApi\Object;


use QuickPdo\QuickPdoDbOperationTool;
use QuickPdo\QuickPdoInfoTool;
use XiaoApi\Helper\QuickPdoStmtHelper\QuickPdoStmtHelper;
use QuickPdo\QuickPdo;
use QuickPdo\QuickPdoStmtTool;


/**
 * The create and update methods basically insert/update a row in the database,
 * and then trigger a hook, and that's it.
 *
 * So, only two actions: insert/update and hook.
 *
 * We try to keep it simple like this so that when you create your own CrudObjects,
 * you can reuse the generated objects create/update methods without to think
 * too much of the consequences.
 *
 * Like, if the create method would do 40 things, you would probably
 * stay away from using a generated object (which inherits the TableCrudObject)'s create
 * methods, because you will be afraid of not being able to understand
 * the whole picture and you would do a mistake.
 *
 * So, just two actions is good.
 *
 *
 */
abstract class TableCrudObject extends CrudObject
{

    protected $table;
    /**
     * array containing the primary key.
     * For instance:
     *      - [id]
     *      - [email, shop_id]
     *      - ...
     */
    protected $primaryKey;


    abstract protected function getCreateData(array $data);


    public static function getDefaults(array $unsafe = [])
    {
        $o = new static();
        return $o->getCreateData($unsafe);
    }

    public function create(array $data, $ifNotExistOnly = false)
    {
        $data = $this->getCreateData($data);
        $keyWord = (false === $ifNotExistOnly) ? "" : 'ignore';
        $lastInsertId = QuickPdo::insert($this->table, $data, $keyWord);
        $this->hook("createAfter", [$this->table, $lastInsertId, $data]);
        return $lastInsertId;
    }


    /**
     * Mix of create and update method, and tries to return the primary key.
     *
     * Check whether or not the record exists:
     *      - if it does exist, update the existing record using the update method
     *      - if it does not exist, insert the record using the create method
     *
     *
     * @param $whereValues , simple map containing the key and values to search with.
     *              It generally contains either the auto-incremented field, or
     *              some unique indexes. For instance:
     *                  - [id => 6]
     *                  - [email => johndoe@me.com]
     *                  - [email => johndoe@me.com, shop_id => 9]
     *
     *
     * @data array, the values to insert/update
     *
     * @return mixed:
     *          if create was used:
     *                  return the result of create
     *          if update was used:
     *                  - if the primary key is composed of more than one element (i.e. [email, shop_id]),
     *                          return the primary key array
     *                  - if the primary key is composed only of one element (i.e. [id]),
     *                          the primary key element is returned directly
     *
     *
     * Note: this method is not sql injection safe, because it assumes that the whereValues
     * keys are safe.
     *
     */
    public function push(array $whereValues, array $data)
    {
        $searchKeys = array_keys($whereValues);
        $searchKeys = array_merge($searchKeys, $this->primaryKey);
        $searchKeys = array_unique($searchKeys);


        $searchKeys = array_map(function ($v) {
            return '`' . $v . '`';
        }, $searchKeys);


        $pdoWhere = QuickPdoStmtTool::simpleWhereToPdoWhere($whereValues);
        $q = "select " . implode(',', $searchKeys) . " from " . $this->table;
        $markers = [];
        QuickPdoStmtTool::addWhereSubStmt($pdoWhere, $q, $markers);
        $row = QuickPdo::fetch($q, $markers);


        if (false === $row) {
            return $this->create($data);
        } else {
            $this->update($data, $whereValues);
            $ret = array_intersect_key($row, array_flip($this->primaryKey));
            if (1 === count($this->primaryKey)) {
                return current($ret);
            }
            return $ret;
        }
    }


    /**
     * IMPORTANT NOTE:
     *
     * This is NOT a secure method.
     * It is meant to be used by developers for internal requests.
     * You can totally do sql injection if you want to.
     *
     * ------------------
     *
     *
     *
     * @param $params , an array, or object that can be converted to an array, with the following properties:
     *
     * - fields: null|array
     *                  the fields to return.
     *                  If null, will return all fields.
     *                  If an array, it's an array of key/value pairs.
     *                  Each key/value pair can be one of:
     *                      - (int =>) field
     *                      - field => alias
     *
     *                  The value (from any of those key/value pairs) will be used
     *                  as a column to retrieve (from mysql/yourDbm's perspective).
     *
     *                  Important note: there is no security check,
     *                  so, don't use user data without filtering them.
     *
     *
     *
     *
     * - where: null|array
     *              a quickPdoWhere array (https://github.com/lingtalfi/Quickpdo#the-where-notation),
     *              or null if there is no search criteria.
     *
     * - order: null|array
     *              the sort order.
     *              If null, no particular sort will be used.
     *              If it's an array, it's an array of field => direction.
     *              The direction must be one of asc or desc, case insensitive.
     *
     *
     * - nipp: null|int
     * - page: null|int
     *
     * @return array
     */
    public function read($params = [])
    {

        $params = array_replace([
            "fields" => null,
            "where" => null,
            "order" => null,
            "nipp" => null,
            "page" => 1,
        ], (array)$params);


        $markers = [];
        $q = "SELECT ";


        QuickPdoStmtHelper::addFields($q, $params['fields']);
        $q .= ' FROM ' . $this->table;
        if (null !== $params['where']) {
            QuickPdoStmtTool::addWhereSubStmt($params['where'], $q, $markers);
        }
        QuickPdoStmtHelper::addOrderAndPage($q, $params['order'], $params['page'], $params['nipp']);

        return QuickPdo::fetchAll($q, $markers);
    }


    /**
     *
     * Like read, but:
     *
     * - returns a one dimensional array, the keys being natural (set by php), and the values
     *          being the values of the given $valueColumn.
     * - the params does not have the fields key
     *
     *
     * @param $valueColumn
     * @param array $params
     * @return array|false
     */
    public function readValues($valueColumn, $params = [])
    {
        $params = array_replace([
            "where" => null,
            "order" => null,
            "nipp" => null,
            "page" => 1,
        ], (array)$params);

        $markers = [];
        $q = "SELECT $valueColumn FROM " . $this->table;
        if (null !== $params['where']) {
            QuickPdoStmtTool::addWhereSubStmt($params['where'], $q, $markers);
        }
        QuickPdoStmtHelper::addOrderAndPage($q, $params['order'], $params['page'], $params['nipp']);

        return QuickPdo::fetchAll($q, $markers, \PDO::FETCH_COLUMN);
    }


    /**
     *
     * Like readValues, but return an array of key => value
     *
     */
    public function readKeyValues($keyColumn, $valueColumn, $params = [])
    {
        $params = array_replace([
            "where" => null,
            "order" => null,
            "nipp" => null,
            "page" => 1,
        ], (array)$params);

        $markers = [];
        $q = "SELECT $keyColumn, $valueColumn FROM " . $this->table;
        if (null !== $params['where']) {
            QuickPdoStmtTool::addWhereSubStmt($params['where'], $q, $markers);
        }
        QuickPdoStmtHelper::addOrderAndPage($q, $params['order'], $params['page'], $params['nipp']);

        return QuickPdo::fetchAll($q, $markers, \PDO::FETCH_COLUMN | \PDO::FETCH_UNIQUE);
    }


    /**
     * Same as read, but fetches ONE result instead of ALL the result (fetch instead of fetchAll)
     */
    public function readOne($params = [])
    {

        $params = array_replace([
            "fields" => null,
            "where" => null,
        ], (array)$params);


        $markers = [];
        $q = "SELECT ";


        QuickPdoStmtHelper::addFields($q, $params['fields']);
        $q .= ' FROM ' . $this->table;
        if (null !== $params['where']) {
            QuickPdoStmtTool::addWhereSubStmt($params['where'], $q, $markers);
        }
        return QuickPdo::fetch($q, $markers);
    }


    /**
     * Fetches the value for ONE column of a particular row.
     *
     * @param $column , the name of the column
     * @param array $where , the pdoWhere object, see read method for more info.
     * @return false|mixed, the value of the column matching the request, or false if an error occurred
     */
    public function readColumn($column, array $where = [])
    {
        $markers = [];
        $q = "SELECT $column FROM " . $this->table;
        QuickPdoStmtTool::addWhereSubStmt($where, $q, $markers);
        if (false !== ($ret = QuickPdo::fetch($q, $markers))) {
            return $ret[$column];
        }
        return false;
    }


    /**
     * @param array $where , simple where array (key => value)
     */
    public function update(array $data, array $where)
    {
        $createData = $this->getCreateData($data);

        // allowing devs to put more data in data, while ensuring only relevant data are being applied
        $data = array_intersect_key($data, $createData);


        $pdoWhere = QuickPdoStmtTool::simpleWhereToPdoWhere($where);
        QuickPdo::update($this->table, $data, $pdoWhere);
        $this->hook("updateAfter", [$this->table, $data, $where]);
    }


    /**
     * @param array $where , simple where array (key => value)
     */
    public function delete(array $where)
    {
        $pdoWhere = QuickPdoStmtTool::simpleWhereToPdoWhere($where);
        QuickPdo::delete($this->table, $pdoWhere);
        $this->hook("deleteAfter", [$this->table, $where]);
    }

    public function deleteAll($resetAutoIncrement = true)
    {
        QuickPdo::delete($this->table);

        if (true === $resetAutoIncrement) {
            $p = explode('.', $this->table);
            if (2 === count($p)) {
                $db = $p[0];
                $table = $p[1];
            } else {
                $table = $p[0];
                $db = null;
            }
            if (false !== ($ai = QuickPdoInfoTool::getAutoIncrementedField($table, $db))) {
                QuickPdoDbOperationTool::rebaseAutoIncrement($this->table, $ai);
            }
        }

        $this->hook("deleteAllAfter", [$this->table]);
    }


    public function drop()
    {
        return QuickPdo::freeExec("drop table if exists " . $this->table);
    }

}