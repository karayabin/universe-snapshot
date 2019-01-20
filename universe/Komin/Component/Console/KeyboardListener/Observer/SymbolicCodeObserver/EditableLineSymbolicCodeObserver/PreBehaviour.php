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
 * PreBehaviour
 * @author Lingtalfi
 * 2015-05-09
 *
 */
class PreBehaviour extends Behaviour
{

    private $bypass;
    private $preventRefresh;


    public function __construct()
    {
        parent::__construct();
        $this->bypass = false;
        $this->preventRefresh = false;
    }

    public function bypassDefaultBehaviour()
    {
        $this->bypass = true;
        return $this;
    }

    public function isDefaultBehaviourBypassed()
    {
        return $this->bypass;
    }


    public function preventRefresh()
    {
        $this->preventRefresh = true;
        return $this;
    }


    public function isRefreshPrevented()
    {
        return $this->preventRefresh;
    }


}
