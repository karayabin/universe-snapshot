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
 * 3ThreeMVersionSorter
 * @author Lingtalfi
 * 2015-05-06
 *
 */
class ThreeMVersionSorter implements VersionSorterInterface
{

    //------------------------------------------------------------------------------/
    // IMPLEMENTS VersionSorterInterface
    //------------------------------------------------------------------------------/
    public function getLastVersion(array $versions)
    {
        natcasesort($versions);
        return array_pop($versions);
    }
}
