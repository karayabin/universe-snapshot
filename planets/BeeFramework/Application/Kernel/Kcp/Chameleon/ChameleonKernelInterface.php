<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Application\Kernel\Kcp\Chameleon;

use BeeFramework\Application\Kernel\Kcp\KcpKernelInterface;


/**
 * ChameleonKernelInterface
 * @author Lingtalfi
 * 2014-08-21
 *
 */
interface ChameleonKernelInterface extends KcpKernelInterface
{


    /**
     * @return ChameleonKernelInterface|null
     */
    public function setTagSoup(array $tagSoup);

    public function getTagSoup();

}
