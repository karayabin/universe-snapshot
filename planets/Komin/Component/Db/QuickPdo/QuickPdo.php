<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\Db\QuickPdo;

use BeeFramework\Component\Log\Logger\LoggerInterface;
use BeeFramework\Component\Log\SimpleLogger\SimpleLoggerInterface;
use Komin\Component\Log\ProcessLogger\ProcessLoggerInterface;


/**
 * QuickPdo
 * @author Lingtalfi
 * 2015-05-29
 *
 */
class QuickPdo
{

    /**
     * @var \PDO $pdoInstance , the working pdo instance
     */
    private $pdoInstance;
    /**
     * If true (default), exceptions are thrown when something goes wrong
     */
    private $strictMode;

    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct()
    {
        $this->pdoInstance = null;
        $this->strictMode = true;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
        return $this;
    }

    public function setPdoInstance(\PDO $pdoInstance)
    {
        $this->pdoInstance = $pdoInstance;
        return $this;
    }

    public function setStrictMode($strictMode)
    {
        $this->strictMode = $strictMode;
        return $this;
    }






    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    /**
     * @return false|int, last insert id
     * Errors are accessible via a getError method
     *
     */
    public static function insert($table, array $fields, array $options = [])
    {
        $stmt = 'insert into ' . $table . ' set ';
        $first = true;
        $markers = [];
        foreach ($fields as $k => $v) {
            if (true === $first) {
                $first = false;
            }
            else {
                $stmt .= ',';
            }
            $stmt .= $k . '=:' . $k;
            $markers[':' . $k] = $v;
        }


        if (false !== $pdo = self::getPdo($options['id'])) {
            $query = $pdo->prepare($stmt);
            if (true === $query->execute($markers)) {
                return $pdo->lastInsertId();
            }
            self::handleErrorFromPdoStmt($query, $options['errorMode']);
        }
        return false;
    }


    /**
     * Returns true|false
     *
     * - whereConds: array of whereCond|glue
     * with:
     *
     * - whereCond:
     * ----- 0: field
     * ----- 1: operator (<, =, >, <=, >=, like, between)
     * ----- 2: operand (the value to compare the field with)
     * ----- ?3: operand 2, only if between operator is used
     *
     *          Note: for mysql users, if the like operator is used, the operand can contain the wildcards chars:
     *
     *          - %: matches any number of characters, even zero characters
     *          - _: matches exactly one character
     *
     *          To use the literal version of a wildcard char, prefix it with backslash (\%, \_).
     *          See mysql docs for more info.
     *
     *
     * - glue: string directly injected in the statement, it is meant
     *              to create the logical AND and OR and parenthesis operators.
     *              We can also use it with the IN keyword, for instance:
     *                      - in ( 6, 8, 9 )
     *                      - in ( :doo, :foo, :koo )
     *              In the latter case, we will also pass corresponding markers manually using the $extraMarkers argument.
     *                      doo => 6,
     *                      koo => 'something',
     *                      ...
     *
     *
     *
     */
    public static function update($table, array $fields, array $whereConds = [], array $extraMarkers = [], array $options = [])
    {
        $options = array_replace([
            'id' => null,
            'errorMode' => 0,
        ], $options);

        if (false !== $pdo = self::getPdo($options['id'])) {
            $stmt = 'update ' . $table . ' set ';
            $markers = [];
            $first = true;
            foreach ($fields as $k => $v) {
                if (true === $first) {
                    $first = false;
                }
                else {
                    $stmt .= ',';
                }
                $stmt .= $k . '=:' . $k;
                $markers[':' . $k] = $v;
            }

            self::addWhereSubStmt($whereConds, $stmt, $markers);
            $markers = array_replace($markers, $extraMarkers);
            $query = $pdo->prepare($stmt);
            if (true === $query->execute($markers)) {
                return true;
            }
            self::handleErrorFromPdoStmt($query, $options['errorMode']);
        }
        return false;
    }


    /**
     * Returns false|int, the number of deleted rows
     * For whereConds format, see update method.
     */
    public static function delete($table, array $whereConds = [], array $options = [])
    {
        $options = array_replace([
            'id' => null,
            'errorMode' => 0,
        ], $options);
        if (false !== $pdo = self::getPdo($options['id'])) {
            $stmt = 'delete from ' . $table;
            $markers = [];
            self::addWhereSubStmt($whereConds, $stmt, $markers);
            $query = $pdo->prepare($stmt);
            if (true === $query->execute($markers)) {
                return $query->rowCount();
            }
            self::handleErrorFromPdoStmt($query, $options['errorMode']);
        }
        return false;
    }


    /**
     * Returns false|array
     */
    public static function fetchAll($stmt, array $markers = [], array $options = [])
    {
        $options = array_replace([
            'id' => null,
            'errorMode' => 0,
        ], $options);
        if (false !== $pdo = self::getPdo($options['id'])) {
            $query = $pdo->prepare($stmt);
            if (true === $query->execute($markers)) {
                return $query->fetchAll(\PDO::FETCH_ASSOC);
            }
            self::handleErrorFromPdoStmt($query, $options['errorMode']);
        }
        return false;
    }


    /**
     * Returns false|array
     */
    public static function fetch($stmt, array $markers = [], array $options = [])
    {
        $options = array_replace([
            'id' => null,
            'errorMode' => 0,
        ], $options);
        if (false !== $pdo = self::getPdo($options['id'])) {
            $query = $pdo->prepare($stmt);
            if (true === $query->execute($markers)) {
                return $query->fetch(\PDO::FETCH_ASSOC);
            }
            self::handleErrorFromPdoStmt($query, $options['errorMode']);
        }
        return false;
    }


    /**
     * Executes a PDO->exec and returns the number of affected lines.
     *
     * @return false|int, the number of affected rows
     */
    public static function freeExec($stmt, array $options = [])
    {
        $options = array_replace([
            'id' => null,
            'errorMode' => 0,
        ], $options);
        if (false !== $pdo = self::getPdo($options['id'])) {
            if (false !== $r = $pdo->exec($stmt)) {
                return $r;
            }
            self::handleErrorFromPdo($pdo, $options['errorMode']);
        }
        return false;
    }


    /**
     * Execute a PDOStatement->execute and returns the number of affected rows.
     *
     *
     * @return false|int, the number of affected rows
     */
    public static function freeStmt($stmt, array $markers = [], array $options = [])
    {
        $options = array_replace([
            'id' => null,
            'errorMode' => 0,
        ], $options);
        if (false !== $pdo = self::getPdo($options['id'])) {
            $query = $pdo->prepare($stmt);
            if (true === $query->execute($markers)) {
                return $query->rowCount();
            }
            self::handleErrorFromPdoStmt($query, $options['errorMode']);
        }
        return false;
    }


    /**
     * @return null|pdoErrorInfo (http://php.net/manual/en/pdo.errorinfo.php)
     */
    public static function getLastError()
    {
        if (self::$errors) {
            return self::$errors[count(self::$errors) - 1];
        }
    }

    /**
     * @return pdoErrorInfo[] (http://php.net/manual/en/pdo.errorinfo.php)
     */
    public static function getErrors()
    {
        return self::$errors;
    }



    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    private static function handleErrorFromPdoStmt(\PDOStatement $pdoStmt, $errorMode)
    {
        self::$errors[] = $pdoStmt->errorInfo();
        if (0 === $errorMode) {
            $errorInfo = $pdoStmt->errorInfo();
            SuperLogger::getInst()->log('komin.base.quickMysql.failedStmt', sprintf("[%s, %s]: %s ..... (%s)", $errorInfo[0], $errorInfo[1], $errorInfo[2], $pdoStmt->queryString));
        }
        elseif (1 === $errorMode) {
            self::throwExByErrorInfo($pdoStmt->errorInfo());
        }
    }

    private static function handleErrorFromPdo(\PDO $pdo, $errorMode)
    {
        self::$errors[] = $pdo->errorInfo();
        if (0 === $errorMode) {
            $errorInfo = $pdo->errorInfo();
            SuperLogger::getInst()->log('komin.base.quickMysql.failedStmt', sprintf("[%s, %s]: %s", $errorInfo[0], $errorInfo[1], $errorInfo[2]));
        }
        elseif (1 === $errorMode) {
            self::throwExByErrorInfo($pdo->errorInfo());
        }
    }

    private static function throwExByErrorInfo(array $errorInfo)
    {
        throw new \Exception(sprintf("[%s, %s]: %s", $errorInfo[0], $errorInfo[1], $errorInfo[2]));
    }


    private static function addWhereSubStmt(array $whereConds, &$stmt, array &$markers)
    {
        if ($whereConds) {
            $mkCpt = 0;
            $mk = 'bzz_';
            $stmt .= ' where ';
            $first = true;
            foreach ($whereConds as $cond) {
                if (is_array($cond)) {
                    list($field, $op, $val) = $cond;
                    $val2 = (isset($cond[3])) ? $cond[3] : null;
                    if (true === $first) {
                        $first = false;
                    }
                    else {
                        $stmt .= ',';
                    }
                    $stmt .= $field . ' ' . $op . ' :' . $mk . $mkCpt;
                    $markers[':' . $mk . $mkCpt] = $val;
                    $mkCpt++;
                    if ('between' === $op) {
                        $stmt .= ' and ' . ' :' . $mk . $mkCpt;
                        $markers[':' . $mk . $mkCpt] = $val2;
                        $mkCpt++;
                    }
                }
                elseif (is_string($cond)) {
                    $stmt .= $cond;
                }
            }
        }
    }

    /**
     * @return \Pdo
     */
    private static function getPdo($id = null)
    {
        return StazyPdoConnectionManager::getInst()->getPdoInstance($id);
    }
}
