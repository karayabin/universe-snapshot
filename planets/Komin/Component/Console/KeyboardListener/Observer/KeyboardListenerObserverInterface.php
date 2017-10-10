<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\Console\KeyboardListener\Observer;

use Komin\Component\Console\KeyboardListener\KeyboardListenerInterface;


/**
 * KeyboardListenerObserverInterface
 * @author Lingtalfi
 * 2015-05-07
 *
 *
 * observers are notified when:
 *      - input is typed by the user (fromRead=true)
 *      - or when the input is programmatically added, using the write method of the keyboardListener (fromRead=false)
 *
 */
interface KeyboardListenerObserverInterface
{

    public function notify($string, KeyboardListenerInterface $keyboardListener, $fromRead = true);
}
