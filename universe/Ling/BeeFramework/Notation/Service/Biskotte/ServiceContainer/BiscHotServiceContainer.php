<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ling\BeeFramework\Notation\Service\Biskotte\ServiceContainer;

use Ling\BeeFramework\Application\ServiceContainer\ServiceContainer\HotServiceContainer;
use Ling\BeeFramework\Chemical\Parameters\WithReadOnlyParameterBagInterface;
use Ling\BeeFramework\Component\Bag\ReadOnlyBagInterface;
use Ling\BeeFramework\Component\Bag\ReadOnlyBdotBag;
use Ling\BeeFramework\Notation\Service\Biskotte\Exception\BiskotteException;


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
