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


/**
 * ReadableParametersServiceContainerInterface
 * @author Lingtalfi
 * 2015-03-08
 *  
 */
interface ReadableParametersServiceContainerInterface extends ServiceContainerInterface
{
    /**
     * This method is intended for plugin authors,
     * so that they can access the parameters of their own plugins to provide
     * working services.
     *
     * @return mixed
     * @throws \Exception
     */
    public function getParameter($name);
}
