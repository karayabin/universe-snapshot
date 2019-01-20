<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Db\PdoConnectionManager;

use BeeFramework\Bat\ArrayTool;
use BeeFramework\Component\Log\SuperLogger\SuperLogger;


/**
 * PdoConnectionManager.
 *
 * @author Lingtalfi
 *
 *
 */
class PdoConnectionManager implements PdoConnectionManagerInterface
{

    protected $nodes;
    protected $options;
    protected $instances;


    /**
     * @param array $nodes , array of:
     *
     * - dsn: string
     * - user: string
     * - pass: string
     * - options: # we can use pdo constants (as strings), like this for instance: PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
     *
     *
     */
    public function __construct(array $nodes, array $options = [])
    {
        $this->nodes = $nodes;
        $this->options = array_replace([
            'defaultId' => 'default',
            /**
             * Options used by all instances upon construction.
             * To use a constant, just use the string version of it
             */
            'commonPdoOptions' => [
                'PDO::ATTR_PERSISTENT' => false,
                'PDO::ATTR_ERRMODE' => 'PDO::ERRMODE_SILENT',
                'PDO::MYSQL_ATTR_INIT_COMMAND' => "SET NAMES UTF8",
            ],
        ], $options);
        $this->instances = [];
    }


    //------------------------------------------------------------------------------/
    // IMPLEMENTS PdoConnectionManagerInterface
    //------------------------------------------------------------------------------/
    /**
     * @see PdoConnectionManagerInterface
     * @inheritDoc
     */
    public function hasPdoInstance($id)
    {
        return (array_key_exists($id, $this->nodes));
    }

    public function getConnectionInfo($id)
    {
        if (array_key_exists($id, $this->nodes)) {
            return $this->nodes[$id];
        }
        return false;
    }


    /**
     * @param null $id
     * @return \Pdo
     */
    public function getPdoInstance($id = null)
    {
        if (null === $id) {
            $id = $this->options['defaultId'];
        }
        if (array_key_exists($id, $this->instances)) {
            return $this->instances[$id];
        }
        if (array_key_exists($id, $this->nodes)) {
            $node = $this->nodes[$id];


            if (true === ArrayTool::hasKeys($node, ['dsn', 'user', 'pass'])) {
                // pdo constructor always throws exception if the connection fails
                try {

                    $options = $this->options['commonPdoOptions'];
                    if (array_key_exists('options', $node)) {
                        $options = array_replace($options, $node['options']);
                    }
                    $options = $this->resolvePdoConstants($options);
                    $dbh = new \PDO(
                        $node['dsn'],
                        $node['user'],
                        $node['pass'],
                        $options
                    );
                    $this->instances[$id] = $dbh;
                    return $dbh;

                } catch (\PDOException $e) {
                    // do not expose sensible info to anyone
                    $this->log('connectionError', $e);
                }
            }
            else {
                $this->log("missingConstructorParameters", sprintf("Missing constructor parameters with id: %s", $id));
            }
        }
        else {
            $this->log("unknownConnectionId", sprintf("Unknown connection with id: %s", $id));
        }
        return false;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function log($id, $msg)
    {
        SuperLogger::getInst()->log("BeeFramework.Db.PdoConnectionManager." . $id, $msg);
    }

    protected function resolvePdoConstants(array $pdoOptions)
    {
        $ret = [];
        foreach ($pdoOptions as $k => $v) {
            if (is_string($k) && 'PDO::' === substr($k, 0, 5)) {
                $k = constant($k);
            }
            if (is_string($v) && 'PDO::' === substr($v, 0, 5)) {
                $v = constant($v);
            }
            $ret[$k] = $v;
        }
        return $ret;
    }

}
