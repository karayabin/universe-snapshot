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

use Komin\Component\Console\KeyboardListener\Observer\SymbolicCodeObserver\EditableLineSymbolicCodeObserver;
use Komin\Component\Console\Tool\TerminalCodesTool;


/**
 * EditableLineBellWrapper
 * @author Lingtalfi
 * 2015-05-08
 *
 */
class EditableLineBellWrapper
{

    public static function wrap(EditableLineSymbolicCodeObserver $observer, $keyCodes = null)
    {

        if (null === $keyCodes) {
            $keyCodes = ['up', 'down'];
        }
        $observer->setPostEvent(function () {
            TerminalCodesTool::bell();
        }, $keyCodes);
        return $observer;
    }
}
