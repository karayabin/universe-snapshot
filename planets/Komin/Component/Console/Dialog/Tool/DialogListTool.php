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

use Komin\Component\Console\Dialog\DialogInterface;
use Komin\Component\Console\Dialog\Util\DialogListQuestionUtil;


/**
 * DialogListTool
 * @author Lingtalfi
 * 2015-05-08
 *
 */
class DialogListTool
{


    public static function listToQuestion($head, array $items, $tail = PHP_EOL, $showKeys = true)
    {
        $u = new DialogListQuestionUtil();
        $u
            ->setHead($head)
            ->setTail($tail)
            ->setList($items);
        if (false === $showKeys) {
            $u->setFormat('- {value}');
        }
        return $u->createQuestion();
    }
}
