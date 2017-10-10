<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\Console\KeyboardListener;

use Komin\Component\Console\KeyboardListener\Observer\KeyboardListenerObserverInterface;


/**
 * KeyboardListenerInterface
 * @author Lingtalfi
 * 2015-05-07
 *
 */
interface KeyboardListenerInterface
{

    public function listen();

    public function write($expression);

    /**
     * @param $observer ,
     *          either a KeyboardListenerObserverInterface
     *          or a callback ( string, KeyboardListenerInterface instance )
     */
    public function setObserver($observer, $index = null);

    public function stopListening();
}
