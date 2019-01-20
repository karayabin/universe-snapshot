<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\Console\Dialog\Tool;

use Komin\Component\Console\Dialog\Dialog;
use Komin\Component\Console\Dialog\DialogInterface;
use Komin\Component\Console\Dialog\Util\DialogListQuestionUtil;
use Komin\Component\Console\KeyboardListener\Observer\SymbolicCodeObserver\EditableLineSymbolicCodeObserver\PreBehaviour;
use Komin\Component\Console\Tool\TerminalCodesTool;


/**
 * BooleanDialogTool
 * @author Lingtalfi
 * 2015-05-08
 *
 */
class BooleanDialogTool
{


    public static function getBoolean($question, $yesLetter = 'y', $noLetter = 'n', $returnBool = true, array $userCodes = null)
    {
        if ($userCodes) {
            $codes = $userCodes;
        }
        else {
            $codes = [$yesLetter, $noLetter];
        }
        $o = new Dialog();
        $o
            ->setQuestion($question)
            ->setSubmitCodes($codes);

        // prevent any other letter to be accepted
        $o->getDialogKeyboardListener()->getEditableLineObserver()->setPreEvent(function ($code, $l, $k, $f, PreBehaviour $b) use ($codes) {
            if (!in_array($code, $codes)) {
                $b->bypassDefaultBehaviour();
                TerminalCodesTool::bell();
            }
        }, null);


        $r = $o->execute();

        if (true === $returnBool) {
            if ($yesLetter === $r) {
                return true;
            }
            return false;
        }
        return $r;
    }


}
