<?php

namespace BabyYaml\Reader\StringParser\ExpressionFinder;



/**
 * CleanStartExpressionFinder
 * @author Lingtalfi
 * 2015-06-04
 *
 * This finder will discard the expression if it is preceded
 * by a non blank char.
 *
 */
class CleanStartExpressionFinder extends ExpressionFinder
{
    public function __construct()
    {
        parent::__construct();
        /**
         * The expression is valid only if it not preceded by
         * a non blank char.
         */
        $this->setValidator(function ($s, $spos) {
            $spos -= 1;
            if ($spos < 0) {
                return;
            }
            $beforeChar = substr($s, $spos, 1);
            if ('' !== trim($beforeChar)) {
                return false;
            }
        });
    }


}
