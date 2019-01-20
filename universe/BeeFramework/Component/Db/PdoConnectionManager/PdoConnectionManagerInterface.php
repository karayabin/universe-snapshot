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


/**
 * PdoConnectionManagerInterface.
 * @author Lingtalfi
 *
 *
 */
interface PdoConnectionManagerInterface
{


    /**
     * @return \Pdo|false
     */
    public function getPdoInstance($id = null);

    public function hasPdoInstance($id);


    /**
     * @return array|false
     *
     * - dsn: string
     * - user: string
     * - pass: string
     * - options: []
     *
     */
    public function getConnectionInfo($id);
}
