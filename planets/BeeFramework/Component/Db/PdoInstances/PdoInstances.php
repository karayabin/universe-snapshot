<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Db\PdoInstances;

use BeeFramework\Bat\ArrayTool;
use BeeFramework\Component\Db\PdoInstances\Exception\PdoInstancesException;
use BeeFramework\Component\Db\PdoInstances\PdoInstancesInterface;
use BeeFramework\Component\Log\SuperLogger\SuperLogger;


/**
 * PdoInstances
 * @author Lingtalfi
 * 2015-05-29
 *
 */
class PdoInstances implements PdoInstancesInterface
{

    private $instances;
    private $defaultId;

    public function __construct()
    {
        $this->instances = [];
    }
    
    //------------------------------------------------------------------------------/
    // IMPLEMENTS PdoInstancesInterface
    //------------------------------------------------------------------------------/
    public function get($id = null)
    {
        if (null === $id) {
            $id = $this->defaultId;
        }
        if (array_key_exists($id, $this->instances)) {
            return $this->instances[$id];
        }
        throw new PdoInstancesException("pdo instance not found: $id");
    }

    public function has($id)
    {
        return (array_key_exists($id, $this->instances));
    }

    public function set($id, \PDO $pdo, $setAsDefault = false)
    {
        $this->instances[$id] = $pdo;
        if (true === $setAsDefault) {
            $this->defaultId = $id;
        }
        return $this;
    }


}
