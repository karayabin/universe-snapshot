<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\Log\ExceptionLogger\Controller;
use Komin\Component\Log\ExceptionLogger\ExceptionLoggerInterface;


/**
 * ExceptionLoggerControllerInterface
 * @author Lingtalfi
 * 2015-05-25
 *
 * A bindure is (unless otherwise specified) an array with the following structure:
 *              0: conditions
 *              1: listeners
 * 
 */
interface ExceptionLoggerControllerInterface extends ExceptionLoggerInterface
{

    public function setBindures(array $bindures);

    public function setBindure($conditions, $listeners, $index = null);

    public function unsetBindure($index);

    public function unsetBindures();
    

}
