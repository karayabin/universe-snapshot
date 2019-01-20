<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Abstractive\EventDispatcher;

/**
 * EventDispatcherInterface.
 * @author LingTalfi
 *
 * 2015-05-09
 *
 */
interface EventDispatcherInterface
{

    /**
     * @return int, listener index
     */
    public function addListener($eventName, $listener);

    /**
     * @return bool, false if the listener wasn't found
     */
    public function removeListener($eventName, $listenerIndex);

    /**
     * @return void
     */
    public function dispatch($eventName, Event $event = null);

    /**
     * @return array of indexes
     */
    public function getIndexes();

}
