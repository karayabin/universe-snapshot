<?php


namespace Ling\SqlWizard;


use Ling\SimplePdoWrapper\Exception\InvalidTableNameException;
use Ling\SqlWizard\Exception\NoConnectionException;

/**
 * The MysqlWizard class is a helper class to work with mysql databases.
 *
 * It provides various info about the tables, and was designed to serve as the helper tool of choice for creating
 * any kind of mysql based generator.
 *
 *
 *
 * Definitions
 * ==============
 *
 *
 *
 * fullTable
 * --------------
 * The name of a table.
 * It can be either a simple table name if the database is obvious,
 * or a full name prefixed with the database if necessary.
 *
 * You are responsible for quoting the table name if necessary (with backticks).
 *
 *
 * Examples:
 *
 * - my_table
 * - `my_table`
 * - my_db.my_table
 * - `my_db`.`my_table`
 * - `my_db`.my_table
 * - my_db.`my_table`
 *
 *
 *
 *
 * ric
 * -----------
 *
 * The row identifying columns.
 *
 * An array of column names, representing the set of column identifying a any row uniquely.
 *
 * Generally, this array equals the primary key array.
 * But if no primary key is defined, then the ric contains all the columns of the table.
 *
 * Example:
 * In a table with an auto-incremented field named id which is also the primary key, the ric is the following array:
 *
 * - 0: id
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 */
class MysqlWizard
{


    /**
     * This property holds the connection (php's \PDO instance) to the mysql database.
     *
     * Note: the error mode will always be set to exception.
     * @var \PDO
     *
     */
    private $connection;


    /**
     * Builds the MysqlWizard instance.
     */
    public function __construct()
    {
        $this->connection = null;
    }

    /**
     * Sets the connection instance (a php \PDO instance).
     *
     * Important note: this class will always set the error mode to exception,
     * using the setAttribute method.
     *
     *
     *
     *      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     *
     *
     *
     *
     * @param \PDO $connection
     */
    public function setConnection(\PDO $connection)
    {
        $connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $this->connection = $connection;
    }


    /**
     * Returns the list of database names in alphabetical order.
     *
     *
     * @param bool $filterMysqlDb , whether to strip out the
     *          built-in mysql databases (mysql, sys, performance_schema and information_schema).
     *          True to filter them out.
     *          False to keep them.
     *
     * @return array
     * @throws NoConnectionException
     * @throws \PDOException
     */
    public function getDatabases($filterMysqlDb = true)
    {
        $query = $this->query('show databases');
        $dbs = $query->fetchAll(\PDO::FETCH_COLUMN);


        if (true === $filterMysqlDb) {
            $filter = function ($v) {
                if (
                    'mysql' === $v ||
                    'sys' === $v ||
                    'performance_schema' === $v ||
                    'information_schema' === $v
                ) {
                    return false;
                }
                return true;
            };
            $dbs = array_merge(array_filter($dbs, $filter)); // array_merge to restore indexes...
        }
        return $dbs;
    }


    /**
     * Returns the list of table names in alphabetical order for the given database.
     *
     *
     * @param null $db , the database to use. If null, the current database will be used.
     * @param string=null $prefix, if defined, keeps only the table names starting with
     *              the $prefix.
     * @return array
     *
     * @throws NoConnectionException
     */
    public function getTables($db = null, $prefix = null)
    {
        if (null !== $db) {
            $this->exec("use $db;");
        }


        $query = $this->query('show tables');
        $tables = $query->fetchAll(\PDO::FETCH_COLUMN);


        if (null !== $prefix) {
            $tables = array_filter($tables, function ($v) use ($prefix) {
                if (0 === strpos($v, $prefix)) {
                    return true;
                }
                return false;
            });
        }
        return $tables;
    }


    /**
     * Returns the name of the auto-incremented field, or false if there is none.
     *
     *
     * @param string $table , the fullTable name (see class description for more info).
     * @return false|string
     * @throws NoConnectionException
     * @throws \PDOException
     */
    public function getAutoIncrementedField($table)
    {

        $q = "show columns from $table where extra='auto_increment'";
        if (false !== ($stmt = $this->query($q))) {
            $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            if (array_key_exists(0, $rows)) {
                return $rows[0]['Field'];
            }
        }
        return false;
    }


    /**
     * Returns an array of column_name => column_data_type.
     *
     * With type being the mysql data type for the column, in lower case.
     * https://dev.mysql.com/doc/refman/8.0/en/data-types.html
     *
     *
     *
     * @param $table , the fullTable name (see class description for more info).
     * @param bool $precision , whether to include the part with the parenthesis if any.
     *              Defaults to false, which means that the part with the parenthesis is stripped out by default.
     *              For instance,
     *                  - without precision (by default):   varchar
     *                  - with precision:                   varchar(64)
     *
     *
     *
     * @return array
     * @throws NoConnectionException
     * @throws \PDOException
     */
    public function getColumnDataTypes($table, $precision = false)
    {
        $types = [];
        $info = $this->query("SHOW COLUMNS FROM $table")->fetchAll(\PDO::FETCH_ASSOC);
        foreach ($info as $_info) {
            $type = $_info['Type'];
            if (false === $precision) {
                $type = explode('(', $type, 2)[0];
            }
            $types[$_info['Field']] = $type;
        }
        return $types;
    }


    /**
     * Returns an array of column_name => default_value.
     *
     *
     * The default value for the column is NULL if the column has an explicit default of NULL, or if the column definition includes no DEFAULT clause.
     *
     *
     * @param $table , the fullTable name (see class description for more info).
     * @return array
     * @throws NoConnectionException
     * @throws \PDOException
     */
    public function getColumnDefaultValues($table)
    {
        $defaults = [];
        $info = $this->query("SHOW COLUMNS FROM $table")->fetchAll(\PDO::FETCH_ASSOC);
        foreach ($info as $_info) {
            $defaults[$_info['Field']] = $_info['Default'];
        }
        return $defaults;
    }


    /**
     *
     * Returns the list of column names for the given $table.
     *
     *
     * @param $table , the fullTable name (see class description for more info).
     * @return array
     * @throws NoConnectionException
     * @throws \PDOException
     */
    public function getColumnNames($table)
    {
        $defaults = [];
        $info = $this->query("SHOW COLUMNS FROM $table")->fetchAll(\PDO::FETCH_ASSOC);
        foreach ($info as $_info) {
            $defaults[] = $_info['Field'];
        }
        return $defaults;
    }


    /**
     * Returns an array of column_name => is_nullable.
     *
     * - is_nullable: represents the column nullability.
     *          The value is true if values can be stored in the column, false if not.
     *
     *
     * @param $table , the fullTable name (see class description for more info).
     * @return array
     * @throws NoConnectionException
     * @throws \PDOException
     */
    public function getColumnNullabilities($table)
    {
        $defaults = [];
        $info = $this->query("SHOW COLUMNS FROM $table")->fetchAll(\PDO::FETCH_ASSOC);
        foreach ($info as $_info) {
            $defaults[$_info['Field']] = ('YES' === $_info['Null']) ? true : false;
        }
        return $defaults;
    }


    /**
     * Returns an array of index_name => indexes.
     *
     * With indexes: an array of column names ordered by ascending index sequence.
     *
     *
     * @param $table , the fullTable name (see class description for more info).
     * @return array
     * @throws NoConnectionException
     * @throws \PDOException
     */
    public function getUniqueIndexes($table)
    {
        $ret = [];
        $info = $this->query("SHOW INDEX FROM $table")->fetchAll();
        if (false !== $info) {
            $indexes = [];
            foreach ($info as $_info) {
                if (
                    '0' === $_info['Non_unique'] &&
                    'PRIMARY' !== $_info['Key_name']
                ) {
                    $indexes[$_info['Key_name']][$_info['Seq_in_index']] = $_info['Column_name'];
                }
            }
            foreach ($indexes as $name => $keys) {
                $keys = array_merge($keys);
                $ret[$name] = $keys;
            };
        }
        return $ret;
    }


    /**
     * Returns an array of $foreignKey => array (
     *      referenced_schema => $referencedDb,
     *      referenced_table => $referencedTable,
     *      referenced_column => $referencedColumn,
     * ).
     *
     *
     *
     *
     *
     * @return array
     * @param $table , the fullTable name (see class description for more info).
     * @throws NoConnectionException
     * @throws \PDOException
     * @throws InvalidTableNameException
     *
     */
    public function getForeignKeysInfo($table)
    {
        list($db, $_table) = $this->explodeTable($table);

        $db = addcslashes($db, "'");
        $_table = addcslashes($_table, "'");


        $ret = [];

        $rows = $this->query("
select 
COLUMN_NAME,
REFERENCED_TABLE_SCHEMA, 
REFERENCED_TABLE_NAME,
REFERENCED_COLUMN_NAME
 
from information_schema.KEY_COLUMN_USAGE k 
inner join information_schema.TABLE_CONSTRAINTS t on t.CONSTRAINT_NAME=k.CONSTRAINT_NAME
where k.TABLE_SCHEMA = '$db'
and k.TABLE_NAME = '$_table'
and CONSTRAINT_TYPE = 'FOREIGN KEY'

")->fetchAll(\PDO::FETCH_ASSOC);


        foreach ($rows as $row) {
            $ret[$row['COLUMN_NAME']] = [
                "referenced_schema" => $row['REFERENCED_TABLE_SCHEMA'],
                "referenced_table" => $row['REFERENCED_TABLE_NAME'],
                "referenced_column" => $row['REFERENCED_COLUMN_NAME'],
            ];
        }

        return $ret;
    }


    /**
     * Returns the primary key of the given $table.
     *
     *
     * @param $table , the fullTable name (see class description for more info).
     * @return array|false. False is returned if there is no primary key defined on this table.
     * @throws NoConnectionException
     */
    public function getPrimaryKey($table)
    {
        $rows = $this->query("SHOW KEYS FROM $table WHERE Key_name = 'PRIMARY'")->fetchAll(\PDO::FETCH_ASSOC);
        $ret = [];
        if (false !== $rows) {
            foreach ($rows as $info) {
                $ret[] = $info['Column_name'];
            }
        }
        if (0 === count($ret)) {
            return false;
        }
        return $ret;
    }


    /**
     *
     * Returns the ric for the given $table.
     * See the class description for more details about ric.
     *
     *
     * @param $table , the fullTable name (see class description for more info).
     * @return array|false
     * @throws NoConnectionException
     */
    public function getRic($table)
    {
        $ric = $this->getPrimaryKey($table);
        if (false === $ric) {
            $columnNames = $this->getColumnNames($table);
            $ric = $columnNames;
        }
        return $ric;
    }


    /**
     * Return an array of entries referencing the given $table.
     *
     *
     * Each entry has the following structure:
     * - referencing_schema: string, the referencing database
     * - referencing_table: string, the referencing table
     * - referencing_column: string, the referencing column
     * - referenced_schema: string, the referenced database
     * - referenced_table: string, the referenced table
     * - referenced_columns: array of referenced column => referencing column
     * @param $table
     * @return array
     * @throws \Exception
     *
     */
    public function getReferencedKeysInfo($table)
    {
        $ret = [];

        $ric = $this->getRic($table);
        list($db, $_table) = $this->explodeTable($table);


        $safeDb = addcslashes($db, "'");
        $safeTable = addcslashes($_table, "'");

        foreach ($ric as $col) {

            $all = $this->query("
SELECT TABLE_SCHEMA, TABLE_NAME, COLUMN_NAME 
FROM information_schema.`KEY_COLUMN_USAGE` WHERE 
`REFERENCED_TABLE_SCHEMA` LIKE '$safeDb' 
AND `REFERENCED_TABLE_NAME` LIKE '$safeTable' 
AND `REFERENCED_COLUMN_NAME` LIKE '$col'            
            ")->fetchAll(\PDO::FETCH_ASSOC);


            foreach ($all as $info) {
                $info = array_values($info);
                $id = $info[0] . '.' . $info[1];


                if (!array_key_exists($id, $ret)) {


                    $ret[$id] = [
                        "referencing_schema" => $info[0],
                        "referencing_table" => $info[1],
                        "referencing_column" => $info[2],
                        "referenced_schema" => $db,
                        "referenced_table" => $_table,
                        "referenced_columns" => [$col => $info[2]],
                    ];
                } else {
                    $ret[$id]["referenced_columns"][$col] = $info[2];
                }
            }
        }
        return $ret;

    }






    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the name of the current database being used.
     *
     * @return string
     * @throws NoConnectionException
     * @throws \PDOException
     */
    protected function getCurrentDatabase()
    {
        // http://stackoverflow.com/questions/9322302/how-to-get-database-name-in-pdo
        return $this->query("select database()")->fetchColumn();
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Calls the php \PDO's query method and returns the resulting \PDOStatement.
     *
     *
     * @param $query
     * @return \PDOStatement
     * @throws NoConnectionException
     * @throws \PDOException
     */
    protected function query($query)
    {
        if (null === $this->connection) {
            throw new NoConnectionException("No connection found, use the setConnection method to set the PDO instance.");
        }
        return $this->connection->query($query);
    }


    /**
     * Calls the php \PDO's exec method and returns the result.
     *
     *
     * @param $query
     * @return mixed
     *
     * @throws NoConnectionException
     * @throws \PDOException
     */
    protected function exec($query)
    {
        if (null === $this->connection) {
            throw new NoConnectionException("No connection found, use the setConnection method to set the PDO instance.");
        }
        return $this->connection->exec($query);
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Takes a fullTable identifier and returns an array containing two entries:
     *      - database_name         (unescaped)
     *      - table_name            (unescaped)
     *
     *
     *
     *
     *
     * @param $fullTable , the fullTable identifier (see class description for more details).
     * @return array
     * @throws InvalidTableNameException
     * @throws NoConnectionException
     */
    private function explodeTable($fullTable)
    {


        $invalid = false;

        $count = substr_count($fullTable, '`');
        if (4 === $count) { // `my_db`.`my_table`
            $p = explode('`.`', $fullTable);
            if (2 === count($p)) {
                $db = trim($p[0], '`');
                $table = trim($p[1], '`');
            } else {
                $invalid = true;
            }
        }
        // one of:
        // - `my_db`.my_table
        // - my_db.`my_table`
        // - `my_table`
        elseif (2 === $count) {
            if (
                '`' === substr($fullTable, 0, 1) &&
                '`' === substr($fullTable, -1)
            ) {
                $db = $this->getCurrentDatabase();
                $table = trim($fullTable, '`');
            } elseif (false !== strpos($fullTable, '`.')) {
                $p = explode('`.', $fullTable);
                if (2 === count($p)) {
                    $db = trim($p[0], '`');
                    $table = $p[1];
                } else {
                    $invalid = true;
                }
            } elseif (false !== strpos($fullTable, '.`')) {
                $p = explode('.`', $fullTable);
                if (2 === count($p)) {
                    $db = $p[0];
                    $table = trim($p[1], '`');
                } else {
                    $invalid = true;
                }
            } else {
                $invalid = true;
            }
        }
        // one of:
        // - my_db.my_table
        // - my_table
        elseif (0 === $count) {
            $p = explode('.', $fullTable);
            $n = count($p);
            if (2 === $n) {
                $db = $p[0];
                $table = $p[1];
            } elseif (1 === $n) {
                $db = $this->getCurrentDatabase();
                $table = $p[0];
            } else {
                $invalid = true;
            }
        } else {
            $invalid = true;
        }

        if (true === $invalid) {
            throw new InvalidTableNameException("Invalid table name $fullTable. See documentation for more info.");
        }


        return [
            $db,
            $table,
        ];
    }

}