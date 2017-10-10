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
 * 2015-05-27
 *
 *
 */
abstract class ServiceContainer implements ServiceContainerInterface
{

    /**
     * @var $services , cache for instantiated services
     */
    protected $services;

    public function __construct()
    {
        $this->services = [];
    }


    public static function create()
    {
        return new static();
    }


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
    abstract protected function recreateService($address, $ret = null, $toMemory = true);



    //------------------------------------------------------------------------------/
    // IMPLEMENTS ServiceContainerInterface
    //------------------------------------------------------------------------------/
    /**
     * Returns a service (will instantiate the service if needed).
     * The first service instance created is then kept in memory until the end of the process.
     *
     * If the service doesn't exist,
     * the $ret argument is consulted:
     *      - if null, an exception is thrown (this is the default)
     *      - any other value is returned (and no exception is thrown)
     *
     *
     * If $newInstance is true, the service container will deliver a new instance of the service.
     * Otherwise, it will reuse the service reference that is kept in memory (and create a new one
     * if necessary).
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
            return $this->recreateService($address, $ret, true);
        }
        else {
            return $this->recreateService($address, $ret, false);
        }
    }


}
