<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Application\Kernel\Kcp;

use BeeFramework\Application\Kernel\KernelInterface;
use BeeFramework\Application\ServiceContainer\ServiceContainer\ContainerInterface;


/**
 * KcpKernelInterface
 * @author Lingtalfi
 * 2014-08-21
 *
 */
interface KcpKernelInterface extends KernelInterface
{


    /**
     * @return ContainerInterface
     */
    public function getContainer();

    public function setContainer(ContainerInterface $container);
}
