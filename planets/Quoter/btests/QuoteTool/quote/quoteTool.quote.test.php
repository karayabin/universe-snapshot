<?php

use PhpBeast\AuthorTestAggregator;
use PhpBeast\PrettyTestInterpreter;
use PhpBeast\Tool\ComparisonErrorTableTool;
use Quoter\QuoteTool;


require_once "bigbang.php";


$agg = AuthorTestAggregator::create();

$a = [
    ['abcdef', '"', true],
    ['abc"def', '"', true],
    ['abé"éef', '"', true],
    ['abc\"def', '"', true],
    ['abc\\\"def', '"', true],
    ['abc\\\\\"def', '"', true],
    ['abc\\\\\"def', '"', false],
    ['abc\\\"def', '"', false],
    ['abc\"def', '"', false],
    ['abc"def', '"', false],
    ['abc""def', '"', false],
    ['abc"\"\def', '"', false],
    ['"abc"', '"', false],
    ['abc\\', '"', false, true],
    ['abc\\\\', '"', false, true],
    ['abc\\', '"', true],
    ['abc\\\\', '"', true],
    ['abc\\\\\\', '"', true],
    
];

$b = [
    '"abcdef"',
    '"abc\"def"',
    '"abé\"éef"',
    '"abc\"def"',
    '"abc\\\\\"def"',
    '"abc\\\\\"def"',
    '"abc\\\\\"def"',
    '"abc\\\"def"',
    '"abc\"def"',
    '"abc\"def"',
    '"abc\"\"def"',
    '"abc\"\"\def"',
    '"\"abc\""',
    false,
    false,
    '"abc\\\"',
    '"abc\\\"',
    '"abc\\\\\\\"',
];


$agg->addTestsByColumn($a, $b, function ($value, $expected, &$msg, $testNumber) {

    list($string, $quoteType, $escapeRecursiveMode) = $value;

    $noWarning = false;
    if (array_key_exists(3, $value) && true === $value[3]) {
        $noWarning = true;
    }


    if (false === $noWarning) {
        $res = QuoteTool::quote($string, $quoteType, $escapeRecursiveMode);
    }
    else {
        $res = @QuoteTool::quote($string, $quoteType, $escapeRecursiveMode);
    }
    if ($expected !== $res) {
        ComparisonErrorTableTool::collect($testNumber, $expected, $res);
    }
    return ($expected === $res);
});


PrettyTestInterpreter::create()->execute($agg);
ComparisonErrorTableTool::display();