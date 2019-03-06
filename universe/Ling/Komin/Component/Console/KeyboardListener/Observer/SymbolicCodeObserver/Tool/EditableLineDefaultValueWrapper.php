<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ling\Komin\Component\Console\KeyboardListener\Observer\SymbolicCodeObserver\Tool;

use Ling\Komin\Component\Console\KeyboardListener\KeyboardListenerInterface;
use Ling\Komin\Component\Console\KeyboardListener\Observer\SymbolicCodeObserver\EditableLine\EditableLine;
use Ling\Komin\Component\Console\KeyboardListener\Observer\SymbolicCodeObserver\EditableLineSymbolicCodeObserver;


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
