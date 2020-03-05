<?php


namespace Ling\SimplePdoWrapper;


use Ling\SimplePdoWrapper\Exception\NoPdoConnectionException;
use Ling\SimplePdoWrapper\Exception\SimplePdoWrapperException;
use Ling\SimplePdoWrapper\Util\Where;

/**
 * The SimplePdoWrapper is a base class implementing the non-driver-specific methods of the SimplePdoWrapperInterface interface.
 *
 */
class SimplePdoWrapper implements SimplePdoWrapperInterface
{

    /**
     * This property holds the isSystemCall for this instance.
     * See the @page(SimplePdoWrapper conception notes) for more info.
     * @var bool = false
     */
    public static $isSystemCall = false;

    /**
     * This property holds the default fetch style value for the fetch and fetchAll methods.
     * @var int
     */
    protected static $defaultFetchStyle = \PDO::FETCH_ASSOC;


    /**
     * This property holds the \PDO instance.
     * @var \PDO|null
     */
    protected $connexion;


    /**
     * This property holds the last query executed.
     * Note: the concrete class is responsible for updating this value.
     * @var string
     *
     */
    protected $query;


    /**
     * This property holds the queryObject, which is used to return the error info to the user when
     * a "query method" (see class description) is executed.
     * @var \PDO|\PDOStatement
     */
    private $queryObject;


    /**
     * This property holds whether a transaction is active for this instance.
     * @var bool
     */
    private $transactionActive;


    /**
     * Builds the concrete instance.
     */
    public function __construct()
    {
        $this->queryObject = null;
        $this->transactionActive = false;
    }

    /**
     * @implementation
     */
    public function setConnexion(\PDO $connexion)
    {
        $this->connexion = $connexion;
    }

    /**
     * @implementation
     * @throws NoPdoConnectionException
     */
    public function getConnexion()
    {
        if (null === $this->connexion) {
            throw new NoPdoConnectionException("The pdo connection is not set");
        }
        return $this->connexion;
    }

    /**
     * @implementation
     * @throws NoPdoConnectionException
     */
    public function setErrorMode($errorMode)
    {
        $this->getConnexion()->setAttribute(\PDO::ATTR_ERRMODE, $errorMode);
    }


    /**
     * @implementation
     */
    public function getError()
    {
        $qo = $this->queryObject;
        if ($qo instanceof \PDO || $qo instanceof \PDOStatement) {
            $errorInfo = $qo->errorInfo();
            if (0 !== (int)$errorInfo[1]) {
                return $errorInfo;
            }
        }
        return null;
    }


    /**
     * @implementation
     */
    public function transaction(callable $transactionCallback, \Exception &$e = null)
    {
        $hasError = false;

        if (false === $this->transactionActive) {


            $pdo = $this->getConnexion();
            $currentErrorMode = $pdo->getAttribute(\PDO::ATTR_ERRMODE);
            $this->setErrorMode(\PDO::ERRMODE_EXCEPTION);

            try {
                $pdo->beginTransaction();
                $this->transactionActive = true;
                call_user_func($transactionCallback);
                $pdo->commit();
            } catch (\Exception $e) {
                $pdo->rollBack();
                $exception = $e;
                $hasError = true;
            }
            $this->setErrorMode($currentErrorMode);

        } else {
            try {
                call_user_func($transactionCallback);
            } catch (\Exception $e) {
                $exception = $e;
                $hasError = true;
            }
        }
        return (false === $hasError);
    }


    //--------------------------------------------
    // BASE METHODS
    //--------------------------------------------
    /**
     * @implementation
     */
    public function insert($table, array $fields = [], array $options = [])
    {


        // preparing the query
        $query = 'insert into ' . $table . ' ';
        $markers = [];
        self::addAssignmentListSubStmt($query, $markers, $fields, true);

        // setup
        $this->query = $query;
        $pdo = $this->boot();


        // executing the request
        $stmt = $pdo->prepare($query);
        $this->storeQueryObject($stmt);


        if (true === $stmt->execute($markers)) {
            $lastInsertId = $pdo->lastInsertId();
            $this->onSuccess('insert', $table, $query, [$fields, $options], $lastInsertId);
            return $lastInsertId;
        }
        return false;
    }


    /**
     * @implementation
     */
    public function replace($table, array $fields = [], array $options = [])
    {

        $keyword = "";


        // preparing the query
        $query = 'replace ' . $keyword . ' into ' . $table . ' ';
        $markers = [];
        self::addAssignmentListSubStmt($query, $markers, $fields, true);


        // setup
        $this->query = $query;
        $pdo = $this->boot();


        // executing the request
        $stmt = $pdo->prepare($query);
        $this->storeQueryObject($stmt);


        if (true === $stmt->execute($markers)) {
            $lastInsertId = $pdo->lastInsertId();
            $this->onSuccess('replace', $table, $query, [$fields, $options], $lastInsertId);
            return $lastInsertId;
        }
        return false;
    }


    /**
     *
     * @implementation
     */
    public function update($table, array $fields, $whereConds = null, array $markers = [])
    {

        // preparing the query
        $query = 'update ' . $table . ' set ';
        $allMarkers = [];
        self::addAssignmentListSubStmt($query, $allMarkers, $fields);
        self::addWhereSubStmt($query, $allMarkers, $whereConds);
        $allMarkers = array_replace($allMarkers, $markers);


        // setup
        $pdo = $this->boot();
        $this->query = $query;


        $stmt = $pdo->prepare($query);
        $this->storeQueryObject($stmt);


        if (true === $stmt->execute($allMarkers)) {
            $this->onSuccess('update', $table, $query, [$fields, $whereConds, $markers], true);
            return true;
        }
        return false;
    }

    /**
     * @implementation
     */
    public function delete($table, $whereConds = null, $markers = [])
    {
        $query = 'delete from ' . $table;
        self::addWhereSubStmt($query, $markers, $whereConds);


        // setup
        $pdo = $this->boot();
        $this->query = $query;


        $stmt = $pdo->prepare($query);
        $this->storeQueryObject($stmt);

        if (true === $stmt->execute($markers)) {
            $rowCount = $stmt->rowCount();
            $this->onSuccess('delete', $table, $query, [$whereConds, $markers], $rowCount);
            return $rowCount;
        }
        return false;
    }


    /**
     * @implementation
     */
    public function fetch($query, array $markers = [], $fetchStyle = null)
    {
        $fetchStyle = $fetchStyle ?? self::$defaultFetchStyle;


        // setup
        $pdo = $this->boot();
        $this->query = $query;


        $stmt = $pdo->prepare($query);
        $this->storeQueryObject($stmt);

        if (true === $stmt->execute($markers)) {
            return $stmt->fetch($fetchStyle);
        }
        return false;
    }


    /**
     * @implementation
     */
    public function fetchAll($query, array $markers = [], $fetchStyle = null, $fetchArg = null, array $ctorArgs = [])
    {

        $fetchStyle = $fetchStyle ?? self::$defaultFetchStyle;


        // setup
        $pdo = $this->boot();
        $this->query = $query;


        $stmt = $pdo->prepare($query);
        $this->storeQueryObject($stmt);

        if (true === $stmt->execute($markers)) {
            if (null === $fetchArg) {
                return $stmt->fetchAll($fetchStyle);
            } else {
                if (\PDO::FETCH_CLASS === $fetchStyle) {
                    return $stmt->fetchAll($fetchStyle, $fetchArg, $ctorArgs);
                }
                return $stmt->fetchAll($fetchStyle, $fetchArg);
            }
        }
        return false;
    }


    /**
     * @implementation
     */
    public function executeStatement($query)
    {

        // setup
        $pdo = $this->boot();
        $this->query = $query;
        $this->storeQueryObject($pdo);
        if (false !== $r = $pdo->exec($query)) {
            return $r;
        }
        return false;
    }





    //--------------------------------------------
    // HELPER METHODS
    //--------------------------------------------
    /**
     * Adds the $whereConds to the given statement ($stmt), using the notation
     * defined in the comments of the SimplePdoWrapperInterface->update method.
     *
     *
     *
     * @param $whereConds
     * @param $stmt
     * @param array $markers
     * @throws \Exception
     */
    public static function addWhereSubStmt(&$stmt, array &$markers, $whereConds)
    {
        if (is_array($whereConds)) {
            if ($whereConds) {

                $mkCpt = 0;
                $mk = 'spw_';
                $stmt .= ' WHERE ';
                $first = true;


                foreach ($whereConds as $field => $value) {
                    if (true === $first) {
                        $first = false;
                    } else {
                        $stmt .= ' AND ';
                    }

                    if (null !== $value) {
                        $stmt .= '`' . $field . '` = :' . $mk . $mkCpt;
                        $markers[':' . $mk . $mkCpt] = $value;
                        $mkCpt++;
                    } else {
                        $stmt .= '`' . $field . '` IS NULL';
                    }
                }
            }
        } elseif (is_string($whereConds)) {
            $stmt .= ' WHERE ' . $whereConds;
        } elseif ($whereConds instanceof Where) {
            $stmt .= " WHERE (";
            $whereConds->apply($stmt, $markers);
            $stmt .= " )";
        } else {
            throw new SimplePdoWrapperException("Unknown case of where.");
        }
    }



    //--------------------------------------------
    // HELPER METHODS FOR CHILDREN
    //--------------------------------------------
    /**
     * You can use this method to initialize a "query method" (see SimplePdoWrapperInterface for more details).
     * It basically resets the current error to null, and returns the pdo connection instance.
     *
     *
     * @return \PDO|null
     * @throws NoPdoConnectionException
     */
    protected function boot()
    {
        $this->queryObject = null;
        return $this->getConnexion();
    }

    /**
     * Stores the query object so that we can get the errors out of it.
     * The query object is one of:
     *
     * - \PDO
     * - \PDOStatement
     *
     *
     * This query object will be used to return the current error for any query method.
     *
     * @param \PDO|\PDOStatement $queryObject
     *
     */
    protected function storeQueryObject($queryObject)
    {
        $this->queryObject = $queryObject;
    }

    /**
     * A hook for other classes to use.
     * This hook is triggered every time one of the following operation is triggered (basically an operation that
     * changes the state of the database):
     *
     * - insert
     * - replace
     * - update
     * - delete
     *
     *
     * Beware that if you use the executeStatement method to perform an insert for instance, this will not trigger
     * this onSuccess method (i.e. you need to call the insert method directly).
     *
     *
     * @param string $type
     * @param string $table
     * @param string $query
     * @param array $arguments
     * @param bool $return
     *
     * @overrideMe
     */
    protected function onSuccess(string $type, string $table, string $query, array $arguments, $return = true)
    {

    }


    /**
     *
     * Adds a helper string to the given $stmt,
     * for INSERT or UPDATE like statements.
     *
     * The string depends on the given $firstForm.
     *
     *
     * - With firstForm = true, the string looks like this:
     *
     *          (a, b, c) VALUES (:a, :b, :c)
     *
     *
     * - With firstForm = false, the string looks like this:
     *
     *          a=:a, b=:b, c=:c
     *
     *
     *
     *
     * @param $stmt
     * @param array $markers
     * @param array $fields , an array of key => value
     * @param bool $firstForm
     */
    protected static function addAssignmentListSubStmt(&$stmt, array &$markers, array $fields, $firstForm = false)
    {
        if (false === $firstForm) {

            $first = true;
            foreach ($fields as $k => $v) {
                if (true === $first) {
                    $first = false;
                } else {
                    $stmt .= ', ';
                }

                // I don't remember why this (backtick escaping) was needed, but I probably had the use case
                // Maybe with reserved keywords?
                $stmt .= '`' . $k . '`' . '=:' . $k;
                $markers[':' . $k] = $v;
            }
        } else {
            $first = true;
            $stmt .= '(' . implode(', ', array_keys($fields)) . ') VALUES (';
            foreach ($fields as $k => $v) {
                if (true === $first) {
                    $first = false;
                } else {
                    $stmt .= ', ';
                }
                $marker = ":" . $k;
                $stmt .= $marker;
                $markers[$marker] = $v;
            }
            $stmt .= ')';
        }
    }


}