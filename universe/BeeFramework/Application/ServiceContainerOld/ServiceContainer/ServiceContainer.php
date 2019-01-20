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

use BeeFramework\Application\ServiceContainer\ServiceContainer\Exception\ServiceContainerException;
use BeeFramework\Application\ServiceContainer\ServicePlainCode\ServicePlainCode;


/**
 * ServiceContainer
 * @author Lingtalfi
 * 2015-03-08
 *
 *
 */
class ServiceContainer implements HotServiceContainerInterface
{

    /**
     * @var $services , cache for instantiated services
     */
    private $services;
    /**
     * @var $codes , array of address => ServicePlainCode
     */
    private $codes;

    public function __construct()
    {
        $this->services = [];
        $this->codes = [];
    }


    public static function create()
    {
        return new static();
    }


    //------------------------------------------------------------------------------/
    // IMPLEMENTS ServiceContainerInterface
    //------------------------------------------------------------------------------/
    /**
     * Returns a service (will instantiate the service if needed).
     * The service instance is kept in memory until the end of the process then.
     *
     * If the service doesn't exist,
     * the $ret arguments is consulted:
     *      - if null, an exception is thrown
     *      - any other value is returned (and no exception is thrown)
     *
     *
     * If $newInstance is true, the service container will deliver a new instance of the service.
     * Otherwise, it will reuse the service reference that it keeps in memory.
     *
     *
     * @return object|mixed
     * @throws ServiceContainerException when ret=null and the service wasn't found
     */
    public function getService($address, $ret = null, $newInstance = false)
    {
        if (false === $newInstance) {
            if (array_key_exists($address, $this->services)) {
                return $this->services[$address];
            }
            return $this->recreateService($address, $ret);
        }
        else {
            return $this->recreateService($address, $ret);
        }
    }


    public function setCode($address, ServicePlainCode $code)
    {
        $this->codes[$address] = $code;
        return $this;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    /**
     * This method should build the service,
     * and store it into the services cache.
     * If it can't, it uses the same logic as getService method for the output.
     *
     * @return mixed
     */
    protected function recreateService($address, $ret = null)
    {
        $methodName = 'get_service_' . str_replace('.', '_', $address);
        if (method_exists($this, $methodName)) {
            $this->services[$address] = $this->$methodName();
            return $this->services[$address];
        }
        if (array_key_exists($address, $this->codes)) {
            $code = $this->codes[$address];
            /**
             * @var ServicePlainCode $code
             */
            $this->services[$address] = eval($code->getCode());
            return $this->services[$address];
        }
        return $this->serviceMissing($address, $ret);
    }


    protected function serviceMissing($address, $ret = null)
    {
        if (null === $ret) {
            throw new ServiceContainerException(sprintf("Service not found: %s", $address));
        }
        return $ret;
    }

    protected function getCodes()
    {
        return $this->codes;
    }

}
