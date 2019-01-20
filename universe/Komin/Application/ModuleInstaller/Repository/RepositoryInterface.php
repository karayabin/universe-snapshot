<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Application\ModuleInstaller\Repository;


/**
 * RepositoryInterface
 * @author Lingtalfi
 * 2015-05-04
 *
 */
interface RepositoryInterface
{


    /**
     * @return array|false,
     *          the serverMeta array for the given module,
     *          or false if the module couldn't be found.
     */
    public function getModuleMeta($moduleSearchPattern);

}
