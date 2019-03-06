<?php

namespace Ling\BabyDash;

/*
 * LingTalfi 2015-12-19
 */
use Ling\IndentedLines\KeyFinder\KeyFinder;
use Ling\IndentedLines\NodeToArrayConvertor\NodeToArrayConvertor;
use Ling\IndentedLines\NodeTreeBuilder\NodeTreeBuilder;
use Ling\IndentedLines\ValueInterpreter\QuotableValueInterpreter;

class BabyDashTool
{


    public static function parse($s, $acceptQuotableValue = false)
    {
        $node = NodeTreeBuilder::create()
            ->setKeyFinder(KeyFinder::create()->setKvSep(':'))
            //
            ->setUseMultiLine(false)
            ->setUseComment(true)
            ->setCommentSymbol('#')
            //
            ->setHasLeadingIndentChar(true)
            ->setIndentChar('-')
            ->buildNode($s);
        if (true === $acceptQuotableValue) {
            return NodeToArrayConvertor::create()->setInterpreter(QuotableValueInterpreter::create()->setQuotedValueIsAlwaysString(true))->convert($node);
        }
        return NodeToArrayConvertor::create()->convert($node);
    }

}
