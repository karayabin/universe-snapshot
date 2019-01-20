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



/**
 * ComponentPathFinderFilter
 * @author Lingtalfi
 * 2015-04-29
 *
 */
class ComponentsPathFinderFilter extends AbstractPatternFinderFilter
{
    protected function getMethodName()
    {
        return 'getComponentsPath';
    }


}
