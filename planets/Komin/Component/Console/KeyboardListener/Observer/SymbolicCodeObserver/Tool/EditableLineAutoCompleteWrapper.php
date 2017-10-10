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

use Komin\Component\Console\Dialog\Tool\BooleanDialogTool;
use Komin\Component\Console\KeyboardListener\KeyboardListenerInterface;
use Komin\Component\Console\KeyboardListener\Observer\SymbolicCodeObserver\EditableLine\EditableLine;
use Komin\Component\Console\KeyboardListener\Observer\SymbolicCodeObserver\EditableLineSymbolicCodeObserver;
use Komin\Component\Console\KeyboardListener\Observer\SymbolicCodeObserver\EditableLineSymbolicCodeObserver\PreBehaviour;
use Komin\Component\Console\Tool\ColumnsTool;
use Komin\Component\Console\Tool\TerminalCodesTool;


/**
 * EditableLineAutoCompleteWrapper
 * @author Lingtalfi
 * 2015-05-08
 *
 *
 * A simple autocomplete implementation for editableLine.
 *
 */
class EditableLineAutoCompleteWrapper
{

    public static function wrap(EditableLineSymbolicCodeObserver $observer, array $allSuggestions, array $options = [])
    {

        $options = array_replace([
            'tooMuchSuggestionsThreshold' => 100,
            'caseSensitive' => false,
            'ignoreAccents' => true,
        ], $options);

        $keyCodes = null;
        $observer->setPreEvent(function ($code, EditableLine $editableLine, KeyboardListenerInterface $keyboardListener, $fromRead, PreBehaviour $behaviour) use ($allSuggestions, $options) {

            $tooMuchSuggestionsThreshold = $options['tooMuchSuggestionsThreshold'];
            if ('tab' === $code) {


                $caseSensitive = $options['caseSensitive'];
                $ignoreAccents = $options['ignoreAccents'];

                $suggestions = AutocompleteTool::getMatchingSuggestions($editableLine->getText(), $allSuggestions, $caseSensitive, $ignoreAccents);
                $n = count($suggestions);


                if ($n > 0) {
                    $behaviour->bypassDefaultBehaviour();
                    TerminalCodesTool::bell();

                    if (1 === $n) {
                        $s = current($suggestions);
                        $editableLine->reset()->insertAt($s);
                    }
                    elseif ($n > 1) {
                        echo PHP_EOL;
                        if ($n > $tooMuchSuggestionsThreshold) {
                            if (true === BooleanDialogTool::getBoolean("Display all $n possibilities? (y or n)")) {
                                echo ColumnsTool::renderInColumns($suggestions);
                            }
                            $editableLine->refreshBeginPosition()->refreshLine();
                        }
                        else {
                            echo ColumnsTool::renderInColumns($suggestions);
                            $editableLine->refreshBeginPosition()->refreshLine();
                        }
                    }
                }
            }
        }, $keyCodes);

        return $observer;
    }
}
