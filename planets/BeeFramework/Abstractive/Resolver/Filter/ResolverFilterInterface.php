<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Abstractive\Resolver\Filter;


/**
 * ResolverFilterInterface
 * @author Lingtalfi
 * 2015-05-15
 *
 */
interface ResolverFilterInterface
{

    /**
     * @return bool, whether or not v has been modified
     */
    public function filter(&$v);
}
