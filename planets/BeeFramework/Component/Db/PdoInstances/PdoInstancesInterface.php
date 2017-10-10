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

use BeeFramework\Component\Db\PdoInstances\Exception\PdoInstancesException;


/**
 * PdoInstancesInterface.
 * @author Lingtalfi
 * 2015-05-29
 *
 */
interface PdoInstancesInterface
{


    /**
     * @param $id , if null, the default connexion, if defined, will be returned
     * @return \Pdo, or throws an exception
     * @throws PdoInstancesException
     */
    public function get($id = null);

    public function has($id);

    /**
     * @return PdoInstancesInterface
     */
    public function set($id, \PDO $pdo, $setAsDefault = false);

}
