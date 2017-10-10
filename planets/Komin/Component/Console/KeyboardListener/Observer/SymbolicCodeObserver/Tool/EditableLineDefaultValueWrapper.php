<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\Console\KeyboardListener\Observer\SymbolicCodeObserver\Tool;

use Komin\Component\Console\KeyboardListener\KeyboardListenerInterface;
use Komin\Component\Console\KeyboardListener\Observer\SymbolicCodeObserver\EditableLine\EditableLine;
use Komin\Component\Console\KeyboardListener\Observer\SymbolicCodeObserver\EditableLineSymbolicCodeObserver;


/**
 * EditableLineDefaultValueWrapper
 * @author Lingtalfi
 * 2015-05-09
 *
 */
class EditableLineDefaultValueWrapper
{

    public static function wrap(EditableLineSymbolicCodeObserver $observer, $value)
    {
        $observer->setBurstEvent(function ($code, EditableLine $line, KeyboardListenerInterface $kb, $fromRead) use ($value) {
            $line->insertAt($value);
        }, null);
        return $observer;
    }
}
