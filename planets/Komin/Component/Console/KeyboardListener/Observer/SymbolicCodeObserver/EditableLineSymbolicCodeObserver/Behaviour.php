<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\Console\KeyboardListener\Observer\SymbolicCodeObserver\EditableLineSymbolicCodeObserver;


/**
 * Behaviour
 * @author Lingtalfi
 * 2015-05-09
 *
 */
class Behaviour
{

    private $propagationStopped;

    public function __construct()
    {
        $this->propagationStopped = false;
    }

    public function stopPropagation()
    {
        $this->propagationStopped = true;
    }

    public function isPropagationStopped()
    {
        return $this->propagationStopped;
    }


}
