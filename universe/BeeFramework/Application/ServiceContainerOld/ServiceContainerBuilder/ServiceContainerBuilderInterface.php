<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Application\ServiceContainer\ServiceContainerBuilder;

use BeeFramework\Application\ServiceContainer\ServiceContainer\ServiceContainerInterface;


/**
 * ServiceContainerBuilderInterface
 * @author Lingtalfi
 * 2015-03-07
 *
 */
interface ServiceContainerBuilderInterface
{

    /**
     * Creates the service container, and returns it.
     *
     * @return ServiceContainerInterface
     */
    public function build(array $appTags = []);
}
