<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Abstractive\CallableProvider;


/**
 * CallableProviderInterface
 * @author Lingtalfi
 *
 *
 */
interface CallableProviderInterface
{

    /**
     * @return callable
     */
    public function getCallable();
}
