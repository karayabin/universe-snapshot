<?php

namespace Ling\IndentedLines\Tool;

/*
 * LingTalfi 2015-12-15
 */
use Ling\IndentedLines\NodeToArrayConvertor\NodeToArrayConvertor;
use Ling\IndentedLines\NodeTreeBuilder\NodeTreeBuilder;

class IndentedLinesTool
{


    public static function parseFlatList($s)
    {
        $node = NodeTreeBuilder::create()->buildNode($s);
        return NodeToArrayConvertor::create()->convert($node);
    }

    public static function parseDashList($s)
    {
        $node = NodeTreeBuilder::create()
            ->setHasLeadingIndentChar(true)
            ->setIndentChar('-')
            ->buildNode($s);
        return NodeToArrayConvertor::create()->convert($node);
    }
}
