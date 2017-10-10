<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Notation\String\MiniMl\Formatter;

use Komin\Component\String\ParentsAwareMarkupParser\ParentsAwareMarkupParser;
use Komin\Notation\String\MiniMl\Formatter\ParentsAwareMarkupParser\MiniMlConsoleParentsAwareMarkupParserAdaptor;


/**
 * ConsoleMiniMlFormatter
 * @author Lingtalfi
 * 2015-05-21
 *
 *
 */
class ConsoleMiniMlFormatter implements MiniMlFormatterInterface
{

    private $pamParser;

    public function __construct()
    {
        $this->pamParser = ParentsAwareMarkupParser::create()->setAdaptor(MiniMlConsoleParentsAwareMarkupParserAdaptor::create());
    }


    public function format($string)
    {
        return str_replace('\n', PHP_EOL, $this->pamParser->parse($string));
    }
}
