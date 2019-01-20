<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Application\ModuleInstaller\Vns\VersionSorter;


/**
 * VersionSorterInterface
 * @author Lingtalfi
 * 2015-05-06
 *
 */
interface VersionSorterInterface
{

    public function getLastVersion(array $versions);
}
