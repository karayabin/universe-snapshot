<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Application\ModuleInstaller\Repository\ProtocolHelper;


/**
 * RepositoryProtocolHelperInterface
 * @author Lingtalfi
 * 2015-05-06
 *
 */
interface RepositoryProtocolHelperInterface
{


    /**
     * @return array,
     *              0: type
     *              1: id
     *              2: versionId|null (null is convention for last version available)
     */
    public function getTypeAndIdAndVersion($searchPattern);

    /**
     * @return array, the serverMeta
     */
    public function createServerMeta($downloadInfo, array $userMeta);

}
