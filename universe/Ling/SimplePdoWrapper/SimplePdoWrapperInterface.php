<?php


namespace Ling\SimplePdoWrapper;


use Ling\SimplePdoWrapper\Exception\NoPdoConnectionException;

/**
 * The SimplePdoWrapperInterface is the interface for all SimplePdoWrapper instances.
 *
 *
 * It is composed of the following methods:
 *
 * -------query methods:
 * - insert
 * - replace
 * - update
 * - delete
 * - fetchAll
 * - fetch
 * - executeStatement
 * - transaction
 *
 * -------other methods:
 * - getConnection
 * - getError
 * - getQuery
 * - setErrorMode
 *
 *
 *
 *
 * Error handling
 * -----------------
 *
 * All the methods in the "query methods" section (see structure above) behave the same when error handling is concerned:
 *
 * - If the pdo connection is not defined, a NoPdoConnectionException is thrown.
 * - If the query fails, a native php **\PDOException** exception is thrown if the error mode is set to exception,
 *      or false is returned otherwise.
 *      In both cases, the error info array is accessible via the getError method.
 * - For all "query methods" using a table argument (insert, replace, update, delete), the table argument must be
 *      escaped properly by the caller (client).
 *      For instance, all possible values are possible table values:
 *          - my_table
 *          - `my_table`
 *          - my_db.my_table
 *          - `my_db`.`my_table`
 *          - my_db.`my.table`
 *          - ...
 *
 *
 *
 *
 *
 *
 */
interface SimplePdoWrapperInterface
{

    /**
     * Executes the insert statement and returns the lastInsertId.
     * See more info in the class description.
     *
     * Options: not used at the moment.
     *
     *
     *
     * @param $table
     * @param array $fields
     * @param array $options
     * @return false|string
     * @throws \PDOException
     * @throws NoPdoConnectionException
     */
    public function insert($table, array $fields = [], array $options = []);

    /**
     * Executes the replace statement and returns the lastInsertId.
     *
     * Note: at least in mysql a replace statement always create a new record,
     * and potentially delete the old record (based on primary key or unique index detection)
     * if it gets in the way.
     *
     *
     *
     * @param $table
     * @param array $fields
     * @param array $options
     * @return false|string
     * @throws \PDOException
     * @throws NoPdoConnectionException
     */
    public function replace($table, array $fields = [], array $options = []);

    /**
     * Executes the update statement and returns whether the statement was executed successfully.
     *
     * @param $table
     * @param array $fields
     * @param mixed $whereConds : the where conditions. This has two possible forms:
     *
     *      - string: the where statement (not including the leading where keyword) directly.
     *                  The user is then responsible for using prepared statement markers if she needs them.
     *      - array of key => value: will concatenate a where statement using the AND operator, like this:
     *
     *                          WHERE
     *                              key = :marker_for_value
     *                              (AND key2 = :marker_for_value2)*
     *                          Note that in this case the markers are set automatically (sql injection safe).
     *
     *
     *
     * @param array $markers
     * @return bool
     * @throws \PDOException
     * @throws NoPdoConnectionException
     */
    public function update($table, array $fields, $whereConds = null, array $markers = []);


    /**
     * Executes the delete statement and returns the number of deleted rows.
     *
     * Note: by default whereConds is null, and this will erase all the records of the given $table.
     *
     *
     * @param $table
     * @param mixed $whereConds , same as update method (see update method for more info)
     * @param array $markers
     * @return mixed
     * @throws \PDOException
     * @throws NoPdoConnectionException
     * @see update
     */
    public function delete($table, $whereConds = null, $markers = []);


    /**
     * Executes the prepared statement and returns the fetched row, or false in case of failure.
     *
     *
     * @param $query
     * @param array $markers
     * @param null $fetchStyle
     * @return false|array
     */
    public function fetch($query, array $markers = [], $fetchStyle = null);

    /**
     * Executes the prepared statement and return an array containing all of the result set rows.
     *
     * The default fetch style is PDO::FETCH_ASSOC.
     *
     * The last three arguments of this method are described in greater details in the php documentation:
     * http://php.net/manual/en/pdostatement.fetchall.php
     *
     *
     * @param $query
     * @param array $markers
     * @param int $fetchStyle
     * @param mixed $fetchArg
     * @param array $ctorArgs
     * @return false|array
     * @throws \PDOException
     * @throws NoPdoConnectionException
     */
    public function fetchAll($query, array $markers = [], $fetchStyle = null, $fetchArg = null, array $ctorArgs = []);


    /**
     * Executes an SQL statement and returns the number of affected rows.
     *
     * Note: PDO->exec is used under the hood.
     *
     * @param $query
     * @return false|int
     */
    public function executeStatement($query);


    /**
     * Executes a transaction, and returns whether it was successful.
     * If an error occurred during the transaction, the error will be available in the form
     * of an exception passed to the second argument ($e).
     *
     *
     * @param callable $transactionCallback
     * @param \Exception|null $e
     * @return bool
     * @throws NoPdoConnectionException
     * When the connexion is not set
     */
    public function transaction(callable $transactionCallback, \Exception &$e = null);


    /**
     * Sets the pdo connexion.
     *
     * @param \PDO $connexion
     * @return void
     */
    public function setConnexion(\PDO $connexion);

    /**
     * Returns the current pdo connexion.
     *
     * @return \PDO
     * @throws NoPdoConnectionException
     * When the connexion is not set
     */
    public function getConnexion();


    /**
     * Sets the error mode.
     * See php pdo error handling for more details: http://php.net/manual/en/pdo.error-handling.php
     *
     *
     * @param $errorMode , one of
     *      - \PDO::ERRMODE_SILENT
     *      - \PDO::ERRMODE_WARNING
     *      - \PDO::ERRMODE_EXCEPTION
     * @return mixed
     * @throws NoPdoConnectionException
     * When the connection is not defined.
     */
    public function setErrorMode($errorMode);


    /**
     * Returns the error info of the last statement executed, or null if there was no error.
     * Note: the value is reinitialized to null on every method that queries a statement.
     *
     *
     * @return null|array. The pdo error info objects (http://php.net/manual/en/pdo.errorinfo.php)
     *      - 0: SQLSTATE error code (5 chars alphanumeric)
     *      - 1: Driver specific error code
     *      - 2: Driver specific error message
     */
    public function getError();
}














