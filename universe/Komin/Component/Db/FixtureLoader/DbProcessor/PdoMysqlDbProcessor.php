<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\Db\FixtureLoader\DbProcessor;

use Komin\Component\Db\FixtureLoader\Fixture\FixtureInterface;


/**
 * PdoMysqlDbProcessor
 * @author Lingtalfi
 * 2015-05-30
 *
 */
class PdoMysqlDbProcessor implements DbProcessorInterface
{
    private $pdoInstance;
    /**
     * target => array of rowFormatter
     */
    private $rowFormatters;

    public function __construct()
    {
        $this->rowFormatters = [];
    }

    public static function create()
    {
        return new static();
    }

    //------------------------------------------------------------------------------/
    // IMPLEMENTS DbProcessorInterface
    //------------------------------------------------------------------------------/
    public function loadFixtures(array $fixtures, $deleteDataBeforeInsert = true)
    {
        $pdo = $this->getPdoInstance();


        $deletes = [];
        foreach ($fixtures as $fixture) {
            /**
             * @var FixtureInterface $fixture
             */
            $t = $fixture->getTarget();
            $deletes[] = 'delete from ' . $t . "; ALTER TABLE $t AUTO_INCREMENT = 1";
        }

        try {
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $pdo->beginTransaction();

            $pdo->exec("set foreign_key_checks=0;");
            if (true === $deleteDataBeforeInsert) {
                $pdo->exec(implode('; ', $deletes));
            }

            foreach ($fixtures as $fixture) {
                /**
                 * @var FixtureInterface $fixture
                 */
                $target = $fixture->getTarget();
                $data = $fixture->getData();


                $formatters = (array_key_exists($target, $this->rowFormatters)) ? $this->rowFormatters[$target] : [];


                $sql = null;
                foreach ($data as $row) {

                    // format row
                    foreach ($formatters as $formatter) {
                        call_user_func_array($formatter, [&$row]);
                    }
                    array_walk($row, function (&$v) {
                        if (is_array($v)) {
                            $v = serialize($v);
                        }
                    });


                    if (null === $sql) {
                        $sql = "insert into $target set ";
                        $n = 0;
                        foreach ($row as $k => $v) {
                            if (0 !== $n) {
                                $sql .= ', ';
                            }
                            $sql .= $k . "=?";
                            $n++;
                        }
                        $q = $pdo->prepare($sql);
                    }
                    $q->execute(array_values($row));
                }

            }
            $pdo->exec("set foreign_key_checks=1;");
            $pdo->commit();

        } catch (\Exception $e) {
            $pdo->rollBack();
            throw $e;
        }
    }

    /**
     * @param callable $rowFormatter
     *                  void    rowFormatter ( &row )
     *
     * @return DbProcessorInterface
     */
    public function setRowFormatter($target, callable $rowFormatter)
    {
        $this->rowFormatters[$target][] = $rowFormatter;
    }



    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function setPdoInstance(\PDO $pdoInstance)
    {
        $this->pdoInstance = $pdoInstance;
        return $this;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    /**
     * @return \PDO
     */
    private function getPdoInstance()
    {
        if (null === $this->pdoInstance) {
            throw new \RuntimeException("Please set the pdoInstance first");
        }
        return $this->pdoInstance;
    }
}
