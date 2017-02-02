<?php


namespace BabyYaml\Reader\MiniMl\Formatter;


use BabyYaml\Reader\MiniMl\Formatter\ParentsAwareMarkupParser\MiniMlConsoleParentsAwareMarkupParserAdaptor;
use BabyYaml\Reader\ParentsAwareMarkupParser\ParentsAwareMarkupParser;


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
