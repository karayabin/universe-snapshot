<?php


use Escaper\EscapeTool;
use PhpBeast\AuthorTestAggregator;
use PhpBeast\Exception\BeastNotApplicableException;
use PhpBeast\PrettyTestInterpreter;
use PhpBeast\Tool\ComparisonErrorTableTool;

require_once "bigbang.php";


$agg = AuthorTestAggregator::create();

$a = [
    // recursive
    // -----------------
    ['', '"'],
    ['abcdef', '"'],
    ['abc"def', '"'],
    ['abc\"def', '"'],
    ['abc\\\"def', '"'],
    ['abc\\\\\"def', '"'],
    ['a\"bc\\\\\"def', '"'],
    // offsets
    ['a"bc\\\"def', '"', 1],
    ['a"bc\\\"def', '"', 2],
    // utf-8
    ['é"éé\\\"def', '"', 2, true, '\\', true],
    // other escape symbol
    ['a"bc"def', '"', 0, true, '*'],
    ['a*"bc"def', '"', 0, true, '*'],
    ['a**"bc"def', '"', 0, true, '*'],
    ['a***"bc"def', '"', 0, true, '*'],
    ['a**"bcdef', '"', 0, true, '**'],
    ['a***"bcdef', '"', 0, true, '**'],
    ['a****"bcdef', '"', 0, true, '**'],
    ['a******"bcdef', '"', 0, true, '**'],
    ['a******"bc**"def', '"', 0, true, '**'],
    // simple
    // -----------------
    ['abcdef', '"', 0, false],
    ['abc"def', '"', 0, false],
    ['abc\"def', '"', 0, false],
    ['abc\\\"def', '"', 0, false],
    ['abc\\\\\"def', '"', 0, false],
    ['abc\\\\\"de\"f', '"', 0, false],
    // offsets
    ['abc"de"f', '"', 3, false],
    ['abc"de"f', '"', 4, false],
    // utf-8
    ['ééé"éé"f', '"', 4, false, '\\', true],
    // other escape symbol
    ['abc*"def', '"', 0, false, '*'],
    ['abc**"def', '"', 0, false, '*'],
    ['abc*"def', '"', 0, false, '**'],
    ['abc**"def', '"', 0, false, '**'],
    ['abc***"def', '"', 0, false, '**'],
    ['abc****"def', '"', 0, false, '**'],

];

$b = [
    // recursive
    // -----------------
    false,
    false,
    [3],
    false,
    [5],
    false,
    false,
    // offsets
    [1, 6],
    [6],
    // utf-8
    [6],
    // other escape symbol
    [1, 4],
    [5],
    [3, 6],
    [7],
    false,
    false,
    [5],
    false,
    false,
    // simple
    // -----------------
    false,
    [3],
    false,
    false,
    false,
    false,
    // offsets
    [3, 6],
    [6],
    // utf-8
    [6],
    // other escape symbol
    false,
    false,
    [4],
    false,
    false,
    false,
];


$agg->addTestsByColumn($a, $b, function ($value, $expected, &$msg, $testNumber) {

    $suppressErrors = false;
    if (false === $value[0]) {
        array_shift($value);
        $suppressErrors = true;
    }


    $modeRecursive = true;
    $escSymbol = '\\';
    $isUtf8Check = false;
    $offset = 0;
    list($string, $symbol) = $value;

    if (array_key_exists('2', $value)) {
        $offset = $value[2];
    }
    if (array_key_exists('3', $value)) {
        $modeRecursive = $value[3];
    }
    if (array_key_exists('4', $value)) {
        $escSymbol = $value[4];
    }
    if (array_key_exists('5', $value)) {
        $isUtf8Check = $value[5];
    }

    if (true === $isUtf8Check) {
        if ('utf-8' !== strtolower(mb_internal_encoding())) {
            throw new BeastNotApplicableException();
        }
    }

    if (true === $suppressErrors) {
        $res = @EscapeTool::getUnescapedSymbolPositions($string, $symbol, $offset, $modeRecursive, $escSymbol);
    }
    else {
        $res = EscapeTool::getUnescapedSymbolPositions($string, $symbol, $offset, $modeRecursive, $escSymbol);
    }
    $ret = ($expected === $res);
    if (false === $ret) {
        ComparisonErrorTableTool::collect($testNumber, $expected, $res);
    }
    return $ret;
});


PrettyTestInterpreter::create()->execute($agg);
ComparisonErrorTableTool::display();
