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

use Komin\Application\ModuleInstaller\Repository\ProtocolHelper\RepositoryProtocolHelper;


/**
 * DebugRepository
 * @author Lingtalfi
 * 2015-05-04
 *
 */
class DebugRepository implements RepositoryInterface
{

    /**
     * @var array of:
     *      canonicalName => array of:
     *              versionId => meta
     */
    private $modules;
    private $cr;
    private $repoProtoHelper;

    public function __construct(array $modules = [], $cr = "\n")
    {
        $this->modules = $modules;
        $this->cr = $cr;
        $this->repoProtoHelper = new RepositoryProtocolHelper();
    }





    //------------------------------------------------------------------------------/
    // IMPLEMENTS RepositoryInterface
    //------------------------------------------------------------------------------/
    /**
     * @return array|false,
     *          the serverMeta array for the given module,
     *          or false if the module couldn't be found.
     */
    public function getModuleMeta($moduleSearchPattern)
    {
        echo "getModuleMeta " . $moduleSearchPattern . $this->cr;
        if (array_key_exists($moduleSearchPattern, $this->modules)) {
            $versions = $this->modules[$moduleSearchPattern];
            if ($versions) {
                list($type, $id, $version) = $this->repoProtoHelper->getTypeAndIdAndVersion($moduleSearchPattern);
                if (null === $version) {
                    return array_pop($versions);
                }
                elseif (array_key_exists($version, $versions)) {
                    return $versions[$version];
                }
            }
        }
        return false;
    }


}
