<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ling\BeeFramework\Component\Log\SuperLogger\Listener;
use Ling\BeeFramework\Component\Log\SuperLogger\Message\MessageInterface;


/**
 * ListenerInterface
 * @author Lingtalfi
 * 2014-10-28
 *
 *
 */
interface ListenerInterface {


    public function parse(MessageInterface $message);
}
