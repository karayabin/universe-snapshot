<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\Log\ExceptionLogger\Listener;


/**
 * ExceptionListenerInterface
 * @author Lingtalfi
 * 2015-25-05
 *
 */
interface ExceptionListenerInterface
{

    public function listen(\Exception $e, &$stopPropagation = false);
}
