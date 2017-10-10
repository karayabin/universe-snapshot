<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\FileSystem\Finder\Filter;

use BeeFramework\Component\FileSystem\Finder\FileInfo\FinderFileInfo;


/**
 * FinderFilterInterface
 * @author Lingtalfi
 * 2015-04-27
 *
 */
interface FinderFilterInterface
{

    /**
     * Decides whether or not the given file should be incorporated into the matching results of the finder.
     * If the stopRecursion flag is set to true and the given resource is a dir, the finder will not dive
     * into that dir.
     *
     *
     * @return bool, whether or not the given file is accepted
     */
    public function filter(FinderFileInfo $f, &$stopRecursion = false);
}
