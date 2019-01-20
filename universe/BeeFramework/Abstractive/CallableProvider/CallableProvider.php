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
 * CallableProvider
 * @author Lingtalfi
 */
class CallableProvider implements CallableProviderInterface
{

    private $callable;

    public function __construct()
    {
        $this->callable = null;
    }


    //------------------------------------------------------------------------------/
    // IMPLEMENTS CallableProviderInterface
    //------------------------------------------------------------------------------/
    /**
     * @return callable
     */
    public function getCallable()
    {
        if (null === $this->callable) {
            throw new \RuntimeException("Please set the callable first");
        }
        return $this->callable;
    }

    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    public function setCallable(callable $callable)
    {
        $this->callable = $callable;
        return $this;
    }
}
