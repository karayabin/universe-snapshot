<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\Log\ExceptionLogger;
use Komin\Component\Log\ExceptionLogger\Listener\ExceptionListenerInterface;


/**
 * ExceptionLoggerInterface
 * @author Lingtalfi
 * 2015-05-25
 *
 */
interface ExceptionLoggerInterface
{

    public function log(\Exception $e);

    public function setListener(ExceptionListenerInterface $listener, $index = null);

    public function setListeners(array $listeners);

    public function unsetListeners();

    public function unsetListener($index);
}
