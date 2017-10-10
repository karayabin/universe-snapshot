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

use BeeFramework\Application\ServiceContainer\ServiceContainer\Exception\FrozenHotServiceContainerException;
use BeeFramework\Application\ServiceContainer\ServiceContainer\Exception\ServiceContainerException;
use BeeFramework\Application\ServiceContainer\ServicePlainCode\ServicePlainCode;


/**
 * HotServiceContainer
 * @author Lingtalfi
 * 2015-05-27
 *
 *
 */
class HotServiceContainer extends ServiceContainer implements HotServiceContainerInterface
{

    private $codes;
    private $isFrozen;


    public function __construct()
    {
        parent::__construct();
        $this->codes = [];
        $this->isFrozen = false;
    }

    //------------------------------------------------------------------------------/
    // IMPLEMENTS HotServiceContainerInterface
    //------------------------------------------------------------------------------/
    public function setCode($address, ServicePlainCode $code)
    {
        if (true === $this->isFrozen) {
            throw new FrozenHotServiceContainerException("Cannot add service with address $address because the serviceContainer is frozen");
        }
        $this->codes[$address] = $code;
        return $this;
    }

    public function freeze()
    {
        $this->isFrozen = true;
        return $this;
    }

    public function isFrozen()
    {
        return $this->isFrozen;
    }


    //------------------------------------------------------------------------------/
    // DEFINES ServiceContainer
    //------------------------------------------------------------------------------/
    /**
     * This method should build and return the service pointed by the given address.
     * If the $toMemory argument is true, it should also be kept in memory for later reuse.
     *
     * @return object|mixed,
     *              returns the service in case of success.
     *              In case of failure,
     *                      with ret=null, it throws an exception
     *                      with ret!=null, it returns whatever the ret value is
     *
     */
    protected function recreateService($address, $ret = null, $toMemory = true)
    {
        if (array_key_exists($address, $this->codes)) {
            $code = $this->codes[$address];
            /**
             * @var ServicePlainCode $code
             */
            $service = eval($code->getCode());
            if (true === $toMemory) {
                $this->services[$address] = $service;
                return $this->services[$address];
            }
            else {
                return $service;
            }
        }
        return $this->serviceMissing($address, $ret);
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function serviceMissing($address, $ret = null)
    {
        if (null === $ret) {
            throw new ServiceContainerException(sprintf("Service not found: %s", $address));
        }
        return $ret;
    }

}
