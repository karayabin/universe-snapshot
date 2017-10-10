<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\Service\Biskotte\ServiceContainer;

use BeeFramework\Application\ServiceContainer\ServiceContainer\HotServiceContainer;
use BeeFramework\Chemical\Parameters\WithReadOnlyParameterBagInterface;
use BeeFramework\Component\Bag\ReadOnlyBagInterface;
use BeeFramework\Component\Bag\ReadOnlyBdotBag;
use BeeFramework\Notation\Service\Biskotte\Exception\BiskotteException;


/**
 * BiscHotServiceContainer
 * @author Lingtalfi
 * 2015-06-09
 *
 */
class BiscHotServiceContainer extends HotServiceContainer implements WithReadOnlyParameterBagInterface
{

    /**
     * @var ReadOnlyBdotBag
     */
    private $params;


    //------------------------------------------------------------------------------/
    // IMPLEMENTS WithReadOnlyParameterBagInterface
    //------------------------------------------------------------------------------/
    /**
     * @return ReadOnlyBagInterface
     */
    public function params()
    {
        return $this->params;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function setParamsOnce(ReadOnlyBdotBag $params)
    {
        if (null === $this->params) {
            $this->params = $params;
        }
        else {
            throw new BiskotteException("Cannot set params more than once");
        }
        return $this;
    }


}
