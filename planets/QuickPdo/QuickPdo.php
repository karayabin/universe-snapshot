<?php

namespace QuickPdo;

use QuickPdo\Exception\QuickPdoException;


/**
 * QuickPdo
 * @author Lingtalfi
 * 2015-09-25
 *
 */
class QuickPdo
{


    public static $fetchStyle = \PDO::FETCH_ASSOC;

    /**
     * @var \PDO
     */
    private static $conn;
    private static $query;
    /**
     * @var array containing statement/connection errors
     * The format is:
     *      - 0: SQLSTATE error code
     *      - 1: Driver-specific error code
     *      - 2: Driver-specific error message
     *      - 3: this class' method name
     *
     */
    private static $errors = [];

    /**
     * callback:
     *
     *          fn (method, query, markers=null, table=null)
     *
     * - method: string, the name of the method called
     * - query: string, the query being executed
     * - markers: array|null, the markers being used if any, or null otherwise
     * - table: string|null, the table name, or null if not provided.
     *                      The table name is provided by the following methods:
     *                      - update
     *                      - delete
     *                      - insert
     *                      - replace
     *
     *
     *
     */
    private static $onQueryReadyCallback;
    /**
     * same as $onQueryReadyCallback, but only for methods that alter the data in the
     * database (insert, update, replace, delete), and only if the method was executed properly.
     */
    private static $onDataAlterAfterCallback;

    private static $transactionActive = false;

    public static function setConnection($dsn, $user, $pass, array $options)
    {
        self::$conn = new \PDO(
            $dsn,
            $user,
            $pass,
            $options
        );
    }

    /**
     * @return bool
     */
    public static function hasConnection()
    {
        return (null !== self::$conn);
    }

    /**
     * @return \PDO
     * @throws \Exception
     */
    public static function getConnection()
    {
        if (null === self::$conn) {
            throw new \Exception("Connection not set");
        }
        return self::$conn;
    }


    /**
     * @param $fn ( query, array markers=[] )
     */
    public static function setOnQueryReadyCallback($fn)
    {
        self::$onQueryReadyCallback = $fn;
    }


    /**
     * @param $fn ( query, array markers=[] )
     */
    public static function setOnDataAlterAfterCallback($fn)
    {
        self::$onDataAlterAfterCallback = $fn;
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public static function changeErrorMode($newErrorMode)
    {
        self::getConnection()->setAttribute(\PDO::ATTR_ERRMODE, $newErrorMode);
    }

    /**
     * @param $whereConds , see update method
     * @return false|int
     */
    public static function count($table, $whereConds = [])
    {
        $pdo = self::getConnection();


        $markers = [];
        $query = "select count(*) as count from $table";
        self::addWhereSubStmt($whereConds, $query, $markers);


        self::$query = $query;
        self::onQueryReady("count", $query, null, $table);

        $stmt = $pdo->prepare($query);
        if (true === $stmt->execute($markers)) {
            $res = $stmt->fetch(\PDO::FETCH_ASSOC);
            return (int)$res['count'];
        }
        self::handleStatementErrors($stmt, 'count');
        return false;
    }

    /**
     * @return false|int, last insert id
     * Errors are accessible via a getError method
     *
     * Common errors are:
     * - SQLSTATE[42S22]: Column not found: 1054 Unknown column 'dddescription'
     * - SQLSTATE[42S02]: Base table or view not found: 1146 Table 'calendar.the_ev' doesn't exist
     * - SQLSTATE[HY000]: General error: 1364 Field 'end_date' doesn't have a default value
     *
     *
     */
    public static function insert($table, array $fields, $keyword = '', $returnRic = false)
    {

        $protectTable = self::protectTable($table);
        $query = 'insert ' . $keyword . ' into ' . $protectTable . ' set ';
        $first = true;
        $markers = [];
        foreach ($fields as $k => $v) {
            if (true === $first) {
                $first = false;
            } else {
                $query .= ', ';
            }
            $query .= '`' . $k . '`' . '=:' . $k;
            $markers[':' . $k] = $v;
        }

        $pdo = self::getConnection();
        self::$query = $query;
        self::onQueryReady('insert', $query, $markers, $table);
        $stmt = $pdo->prepare($query);
        if (true === $stmt->execute($markers)) {
            self::onDataAlterAfter('insert', $query, $markers, $table);
            if (false === $returnRic) {
                return $pdo->lastInsertId();
            } else {
                $lastInsertId = $pdo->lastInsertId();
                $ai = QuickPdoInfoTool::getAutoIncrementedField($table);
                if (false !== $ai) {
                    return [
                        $ai => $lastInsertId,
                    ];
                } else {
                    $ric = QuickPdoInfoTool::getPrimaryKey($table, null, true);
                    $ret = [];
                    foreach ($ric as $col) {
                        $ret[$col] = $fields[$col];
                    }
                    return $ret;
                }
            }
        }
        self::handleStatementErrors($stmt, 'insert');
        return false;
    }


    /**
     * @return bool, whether or not the replacement was successful.
     * Errors are accessible via a getError method
     *
     */
    public static function replace($table, array $fields, $keyword = '')
    {
        $protectTable = self::protectTable($table);
        $query = 'replace ' . $keyword . ' into ' . $protectTable . ' set ';
        $first = true;
        $markers = [];
        foreach ($fields as $k => $v) {
            if (true === $first) {
                $first = false;
            } else {
                $query .= ', ';
            }

            $query .= '`' . $k . '`' . '=:' . $k;
            $markers[':' . $k] = $v;
        }

        $pdo = self::getConnection();
        self::$query = $query;
        self::onQueryReady('replace', $query, $markers, $table);
        $stmt = $pdo->prepare($query);
        if (true === $stmt->execute($markers)) {
            self::onDataAlterAfter('replace', $query, $markers, $table);
            return true;
        }
        self::handleStatementErrors($stmt, 'replace');
        return false;
    }


    /**
     * Returns true|false
     *
     *
     * - fields: array of key => fieldEntry.
     *      A fieldEntry is either a string or an array.
     *      If it's a string, it represents the value of the key.
     *
     *      If it's an array, then its first key is an expression injected directly into the mysql statement (without the
     *          usual mysql secured preparation).
     *
     *      This helps for the case where you want to perform an increment or decrement of a value.
     *      For instance:
     *                  update users set nb_points=nb_points+1 where id=6
     *
     *      In this case, the fields array should look like this:
     *              [
     *                  'nb_points' => ['nb_points+1'],
     *              ]
     *
     *
     *
     *
     * - whereConds: glue | array of (whereCond | glue)
     *              see QuickPdoStmtTool::addWhereSubStmt comments for more details,
     *              or on the web at https://github.com/lingtalfi/QuickPdo#the-where-notation
     *
     *
     * Common errors are:
     * - SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax;
     * - SQLSTATE[42S02]: Base table or view not found: 1146 Table 'calendar.the_ev' doesn't exist
     * - SQLSTATE[42S22]: Column not found: 1054 Unknown column 'dddescription'
     *
     *
     *
     */
    public static function update($table, array $fields, $whereConds = [], array $extraMarkers = [])
    {
        $protectTable = self::protectTable($table);
        $pdo = self::getConnection();
        $query = 'update ' . $protectTable . ' set ';
        $markers = [];
        $first = true;
        foreach ($fields as $k => $v) {
            if (true === $first) {
                $first = false;
            } else {
                $query .= ',';
            }

            if (!is_array($v)) {
                $query .= '`' . $k . '`' . '=:' . $k;
                $markers[':' . $k] = $v;
            } else {
                $v = array_shift($v);
                $query .= "$k=$v";
            }
        }
        self::addWhereSubStmt($whereConds, $query, $markers);
        $markers = array_replace($markers, $extraMarkers);
        self::$query = $query;
        self::onQueryReady('update', $query, $markers, $table, $whereConds);

        $stmt = $pdo->prepare($query);
        if (true === $stmt->execute($markers)) {
            /**
             * @todo-ling, maybe return $stmt->rowCount() instead of true?
             * However, it only works if PDO::MYSQL_ATTR_FOUND_ROWS is set at the connection:
             *
             * https://stackoverflow.com/questions/10522520/pdo-were-rows-affected-during-execute-statement
             * $p = new PDO($dsn, $user, $pass, array(PDO::MYSQL_ATTR_FOUND_ROWS => true));
             */
            self::onDataAlterAfter('update', $query, $markers, $table);
            return true;
        }
        self::handleStatementErrors($stmt, 'update');
        return false;
    }


    /**
     * Returns false|int, the number of deleted rows
     * For whereConds format, see update method.
     *
     * Common errors are:
     * - SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax;
     * - SQLSTATE[42S02]: Base table or view not found: 1146 Table 'calendar.the_ev' doesn't exist
     * - SQLSTATE[42S22]: Column not found: 1054 Unknown column 'dddescription'
     */
    public static function delete($table, $whereConds = [])
    {

        $protectTable = self::protectTable($table);
        $pdo = self::getConnection();
        $query = 'delete from ' . $protectTable;
        $markers = [];
        self::addWhereSubStmt($whereConds, $query, $markers);
        self::$query = $query;
        self::onQueryReady('delete', $query, $markers, $table, $whereConds);

        $stmt = $pdo->prepare($query);
        if (true === $stmt->execute($markers)) {
            return $stmt->rowCount();
        }
        self::handleStatementErrors($stmt, 'delete');
        return false;
    }


    /**
     * Returns false|array
     *
     * Common errors are:
     * - SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax;
     * - SQLSTATE[42S02]: Base table or view not found: 1146 Table 'calendar.the_ev' doesn't exist
     * - SQLSTATE[42S22]: Column not found: 1054 Unknown column 'dddescription'
     */
    public static function fetchAll($query, array $markers = [], $fetchStyle = null)
    {
        $pdo = self::getConnection();
        self::$query = $query;
        self::onQueryReady("fetchAll", $query, $markers);

        $stmt = $pdo->prepare($query);
        if (true === $stmt->execute($markers)) {
            return $stmt->fetchAll((null !== $fetchStyle) ? $fetchStyle : self::$fetchStyle);
        }
        self::handleStatementErrors($stmt, 'fetchAll');
        return false;
    }


    /**
     * Returns false|array
     *
     * Common errors are:
     * - SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax;
     * - SQLSTATE[42S02]: Base table or view not found: 1146 Table 'calendar.the_ev' doesn't exist
     * - SQLSTATE[42S22]: Column not found: 1054 Unknown column 'dddescription'
     */
    public static function fetch($query, array $markers = [], $fetchStyle = null)
    {
        $pdo = self::getConnection();
        self::$query = $query;
        self::onQueryReady("fetch", $query, $markers);

        $stmt = $pdo->prepare($query);
        if (true === $stmt->execute($markers)) {
            return $stmt->fetch((null !== $fetchStyle) ? $fetchStyle : self::$fetchStyle);
        }
        self::handleStatementErrors($stmt, 'fetch');
        return false;
    }


    /**
     * Executes a PDO->exec and returns the number of affected lines.
     *
     * @return false|int, the number of affected rows
     *
     *
     * Common errors:
     * - SQLSTATE[42000]: Syntax error or access violation: 1049 Unknown database 'pou'
     *
     */
    public static function freeExec($query)
    {
        $pdo = self::getConnection();
        self::$query = $query;
        self::onQueryReady("freeExec", $query);
        if (false !== $r = $pdo->exec($query)) {
            return $r;
        }
        self::handleConnectionErrors($pdo, 'freeExec');
        return false;
    }


    /**
     * Execute a PDOStatement->execute and returns it.
     * @return false|\PDOStatement
     */
    public static function freeQuery($query, array $markers = [])
    {
        $pdo = self::getConnection();
        self::$query = $query;
        self::onQueryReady("freeQuery", $query, $markers);
        $stmt = $pdo->prepare($query);
        if (true === $stmt->execute($markers)) {
            return $stmt;
        }
        self::handleStatementErrors($stmt, 'freeStmt');
        return false;
    }

    /**
     * Execute a PDOStatement->execute and returns the number of affected rows.
     *
     *
     * @return false|int, the number of affected rows
     */
    public static function freeStmt($query, array $markers = [])
    {
        $pdo = self::getConnection();
        self::$query = $query;
        self::onQueryReady("freeStmt", $query, $markers);
        $stmt = $pdo->prepare($query);
        if (true === $stmt->execute($markers)) {
            return $stmt->rowCount();
        }
        self::handleStatementErrors($stmt, 'freeStmt');
        return false;
    }


    /**
     * Execute a transaction.
     *
     * Note: pdo temporarily switches to the exception error mode during the transaction.
     *
     * Note: if you are already inside a transaction, this will just execute the callback
     * (it will not begin a new transaction)
     *
     * By default, if the transaction fails, an exception will be thrown (onException=null).
     * If you set onException to a callable, then your callable will be executed.
     * With any other value for onException, the transaction will silently fail.
     *
     *
     *
     * @param callable $transactionCallback , a callback containing all the statements of the transaction
     * @param callable $onException , a callback executed if an exception occurred (and the transaction failed).
     *                              It receives the exception as its sole argument.
     * @return bool, whether or not the transaction was successful.
     * @throws \Exception
     */
    public static function transaction(callable $transactionCallback, callable $onException = null)
    {
        if (false === self::$transactionActive) {


            $noError = true;
            $conn = QuickPdo::getConnection();
            $currentMode = $conn->getAttribute(\PDO::ATTR_ERRMODE);
            QuickPdo::changeErrorMode(\PDO::ERRMODE_EXCEPTION);
            try {
                $conn->beginTransaction();
                self::$transactionActive = true;

                call_user_func($transactionCallback);
                $conn->commit();
            } catch (\Exception $e) {
                $conn->rollBack();
                $noError = false;
                if (null !== $onException) {
                    call_user_func($onException, $e);
                }
            }
            QuickPdo::changeErrorMode($currentMode);
            return $noError;

        } else {
            try {
                call_user_func($transactionCallback);
            } catch (\Exception $e) {
                if (null !== $onException) {
                    if (is_callable($onException)) {
                        call_user_func($onException, $e);
                    }
                } else {
                    throw $e;
                }
            }
        }
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public static function getErrors()
    {
        return self::$errors;
    }

    public static function getLastError()
    {
        return self::$errors[count(self::$errors) - 1];
    }


    public static function getQuery()
    {
        return self::$query;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    protected static function onQueryReady($method, $query, array $markers = null, $table = null, array $whereConds = null)
    {
        if (null !== self::$onQueryReadyCallback) {
            call_user_func(self::$onQueryReadyCallback, $method, $query, $markers, $table, $whereConds);
        }
    }

    protected static function onDataAlterAfter($method, $query, array $markers = null, $table = null, array $whereConds = null)
    {
        if (null !== self::$onDataAlterAfterCallback) {
            call_user_func(self::$onDataAlterAfterCallback, $method, $query, $markers, $table, $whereConds);
        }
    }


    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    private static function addWhereSubStmt($whereConds, &$query, array &$markers)
    {
        QuickPdoStmtTool::addWhereSubStmt($whereConds, $query, $markers);
    }

    private static function handleStatementErrors(\PDOStatement $stmt, $methodName)
    {
        if (0 !== (int)$stmt->errorInfo()[1]) {
            self::$errors[] = array_merge($stmt->errorInfo(), [$methodName]);
        }
    }

    private static function handleConnectionErrors(\PDO $conn, $methodName)
    {
        if (0 !== (int)$conn->errorInfo()[1]) {
            self::$errors[] = array_merge($conn->errorInfo(), [$methodName]);
        }
    }

    private static function protectTable($table)
    {
        return '`' . $table . '`';
    }
}