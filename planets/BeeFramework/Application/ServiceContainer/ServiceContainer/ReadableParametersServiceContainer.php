<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Application\ServiceContainer\ServiceContainer;

use BeeFramework\Application\ParameterBag\BdotParameterBag;
use BeeFramework\Application\ParameterBag\ParameterBagInterface;
use BeeFramework\Application\ServiceContainer\ServiceContainer\Exception\ServiceContainerException;
use BeeFramework\Bat\BdotTool;


/**
 * ReadableParametersServiceContainer
 * @author Lingtalfi
 * 2015-03-08
 *
 *
 */
class ReadableParametersServiceContainer extends HotServiceContainer implements ReadableParametersServiceContainerInterface
{

    private $paramBag;

    public function __construct(ParameterBagInterface $paramBag = null)
    {
        parent::__construct();
        if (null === $paramBag) {
            $paramBag = BdotParameterBag::create();
        }
        $this->paramBag = $paramBag;
    }


    /**
     * This method is intended for plugin authors,
     * so that they can access the parameters of their own plugins to provide
     * working services.
     *
     * @return mixed
     * @throws \Exception
     */
    public function getParameter($name)
    {
        $ret = $this->paramBag->get($name, 42);
        if (42 === $ret && false === $this->paramBag->has($name)) {
            throw new ServiceContainerException(sprintf("Parameter not found: %s", $name));
        }
        return $ret;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    /**
     * This implementation allows for hardcoded services
     */
    protected function recreateService($address, $ret = null, $toMemory = true)
    {
        $methodName = 'get_service_' . str_replace('.', '_', $address);
        if (method_exists($this, $methodName)) {
            $this->services[$address] = $this->$methodName();
            return $this->services[$address];
        }
        return parent::recreateService($address, $ret, $toMemory);
    }

}
