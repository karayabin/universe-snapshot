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

use BeeFramework\Application\ServiceContainer\Exception\ServiceContainerException;


/**
 * ServiceContainerInterface
 * @author Lingtalfi
 * 2015-03-04
 *
 *
 * A service container is an object that knows how to instantiate and deliver services.
 * A service is a configured instance of an object.
 *
 *
 *
 */
interface ServiceContainerInterface
{
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
    public function getService($address, $ret = null, $newInstance = false);

}
