<?php

namespace BabyDash;

/*
 * LingTalfi 2015-12-19
 */
use IndentedLines\KeyFinder\KeyFinder;
use IndentedLines\NodeToArrayConvertor\NodeToArrayConvertor;
use IndentedLines\NodeTreeBuilder\NodeTreeBuilder;
use IndentedLines\ValueInterpreter\QuotableValueInterpreter;

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
