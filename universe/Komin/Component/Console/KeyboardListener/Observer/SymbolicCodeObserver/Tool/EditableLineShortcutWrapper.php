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
 * EditableLineShortcutWrapper
 * @author Lingtalfi
 * 2015-05-08
 *
 */
class EditableLineShortcutWrapper
{

    public static function wrap(EditableLineSymbolicCodeObserver $observer)
    {
        $observer->setPostEvent(function ($code, EditableLine $line, KeyboardListenerInterface $kb) {
            /**
             * shortcuts
             */
            if ('c+a' === $code) {
                $line->cursorAtPos(0);
            }
            elseif ('c+e' === $code) {
                $line->cursorRight(1000);
            }
            elseif ('c+l' === $code) {
                $line->reset();
            }
            
            $line->refreshLine();
            
        }, null);
        return $observer;
    }
}
