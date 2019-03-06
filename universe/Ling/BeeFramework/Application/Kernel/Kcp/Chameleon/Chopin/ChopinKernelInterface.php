<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ling\BeeFramework\Application\Kernel\Kcp\Chameleon\Chopin;

use Ling\BeeFramework\Application\Kernel\Kcp\Chameleon\ChameleonKernelInterface;


/**
 * ChopinKernelInterface
 * @author Lingtalfi
 * 2014-08-22
 *
 */
interface ChopinKernelInterface extends ChameleonKernelInterface
{


    public function setConfigDir($dir);

    public function getConfigDir();

}
