<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Application\ElementInstallerOld\MetaRepository;


/**
 * MetaRepositoryInterface
 * @author Lingtalfi
 * 2015-04-19
 *
 */
interface MetaRepositoryInterface
{


    public function hasMeta($type, $name, $version);

    /**
     * @return false|array of meta
     */
    public function getMeta($type, $name, $version);

    /**
     * @return array of versions number
     */
//    public function getAvailableVersions($type, $name);

}
