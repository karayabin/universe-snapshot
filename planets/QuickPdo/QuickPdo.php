<?php

namespace QuickPdo;


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


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    /**
     * Return false|int
     */
    public static function count($table)
    {
        $query = "select count(*) as count from $table";
        $pdo = self::getConnection();
        self::$query = $query;
        $stmt = $pdo->prepare($query);
        if (true === $stmt->execute()) {
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
    public static function insert($table, array $fields, $keyword = '')
    {
        $query = 'insert ' . $keyword . ' into ' . $table . ' set ';
        $first = true;
        $markers = [];
        foreach ($fields as $k => $v) {
            if (true === $first) {
                $first = false;
            } else {
                $query .= ', ';
            }
            $query .= $k . '=:' . $k;
            $markers[':' . $k] = $v;
        }

        $pdo = self::getConnection();
        self::$query = $query;
        $stmt = $pdo->prepare($query);
        if (true === $stmt->execute($markers)) {
            return $pdo->lastInsertId();
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
        $query = 'replace ' . $keyword . ' into ' . $table . ' set ';
        $first = true;
        $markers = [];
        foreach ($fields as $k => $v) {
            if (true === $first) {
                $first = false;
            } else {
                $query .= ', ';
            }
            $query .= $k . '=:' . $k;
            $markers[':' . $k] = $v;
        }

        $pdo = self::getConnection();
        self::$query = $query;
        $stmt = $pdo->prepare($query);
        if (true === $stmt->execute($markers)) {
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
        $pdo = self::getConnection();
        $query = 'update ' . $table . ' set ';
        $markers = [];
        $first = true;
        foreach ($fields as $k => $v) {
            if (true === $first) {
                $first = false;
            } else {
                $query .= ',';
            }

            if (!is_array($v)) {
                $query .= $k . '=:' . $k;
                $markers[':' . $k] = $v;
            } else {
                $v = array_shift($v);
                $query .= "$k=$v";
            }
        }

        self::addWhereSubStmt($whereConds, $query, $markers);
        $markers = array_replace($markers, $extraMarkers);
        self::$query = $query;
        $stmt = $pdo->prepare($query);
        if (true === $stmt->execute($markers)) {
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

        $pdo = self::getConnection();
        $query = 'delete from ' . $table;
        $markers = [];
        self::addWhereSubStmt($whereConds, $query, $markers);
        self::$query = $query;
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
        $stmt = $pdo->prepare($query);
        if (true === $stmt->execute($markers)) {
            return $stmt->rowCount();
        }
        self::handleStatementErrors($stmt, 'freeStmt');
        return false;
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
}