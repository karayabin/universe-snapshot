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
 * RepositoryProtocolHelper
 * @author Lingtalfi
 * 2015-05-06
 *
 */
class RepositoryProtocolHelper implements RepositoryProtocolHelperInterface
{


    //------------------------------------------------------------------------------/
    // IMPLEMENTS RepositoryProtocolHelperInterface
    //------------------------------------------------------------------------------/
    /**
     * @return array,
     *              0: type
     *              1: id
     *              2: versionId|null (null is convention for last version available)
     */
    public function getTypeAndIdAndVersion($searchPattern)
    {
        $ret = false;
        if (is_string($searchPattern)) {
            $p = explode(':', $searchPattern, 3);
            $n = count($p);
            if (2 === $n) {
                $version = null;
                list($type, $id) = $p;
                $ret = [$type, $id, $version];
            }
            elseif (3 === $n) {
                $ret = $p;
            }
            else {
                throw new \InvalidArgumentException("Invalid searchPattern, it must contains 2 OR 3 components, $n components were found");
            }
        }
        else {
            throw new \InvalidArgumentException(sprintf("searchPattern argument must be of type string, %s given", gettype($searchPattern)));
        }
        return $ret;
    }

    public function createServerMeta($downloadInfo, array $userMeta)
    {
        $userMeta['download'] = $downloadInfo;
        return $userMeta;
    }
    
}
