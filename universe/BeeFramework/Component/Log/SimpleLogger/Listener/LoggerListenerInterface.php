<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Log\SimpleLogger\Listener;


/**
 * LoggerListenerInterface
 * @author Lingtalfi
 * 2015-05-05
 *
 */
interface LoggerListenerInterface
{

    public function listen($msg, array $tags);
}
