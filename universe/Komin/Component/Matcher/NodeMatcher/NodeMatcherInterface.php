<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\Matcher\NodeMatcher;


/**
 * NodeMatcherInterface
 * @author Lingtalfi
 * 2015-02-01
 *
 */
interface NodeMatcherInterface
{

    /**
     * @return false|array, the matching node
     */
    public function match(array $props);
}
