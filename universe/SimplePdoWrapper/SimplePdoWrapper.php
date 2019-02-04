<?php


namespace SimplePdoWrapper;


use SimplePdoWrapper\Exception\NoPdoConnectionException;

/**
 * The SimplePdoWrapper is a base class implementing the non-driver-specific methods of the SimplePdoWrapperInterface interface.
 *
 */
class SimplePdoWrapper implements SimplePdoWrapperInterface
{


    /**
     * This property holds the default fetch style value for the fetch and fetchAll methods.
     */
    protected static $defaultFetchStyle = \PDO::FETCH_ASSOC;


    /**
     * This property holds the \PDO instance.
     * @type \PDO|null
     */
    protected $connexion;


    /**
     * This property holds the last query executed.
     * Note: the concrete class is responsible for updating this value.
     *
     */
    protected $query;


    /**
     * This property holds the queryObject, which is used to return the error info to the user when
     * a "query method" (see class description) is executed.
     */
    private $queryObject;


    /**
     * This property holds whether a transaction is active for this instance.
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
    public function transaction(callable $transactionCallback, \Exception &$exception = null)
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
            return $pdo->lastInsertId();
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
            return $pdo->lastInsertId();
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
            return $stmt->rowCount();
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
     */
    protected function storeQueryObject($queryObject)
    {
        $this->queryObject = $queryObject;
    }


    /**
     * Adds the $whereConds to the given statement ($stmt), using the notation
     * defined in the comments of the SimplePdoWrapperInterface->update method.
     *
     *
     *
     * @param $whereConds
     * @param $stmt
     * @param array $markers
     */
    protected static function addWhereSubStmt(&$stmt, array &$markers, $whereConds)
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
        }
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