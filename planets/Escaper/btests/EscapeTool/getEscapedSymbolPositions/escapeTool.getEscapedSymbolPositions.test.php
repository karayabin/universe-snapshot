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
    ['a\"bc\\\\\"def', '"', 2],
    ['a\"bc\\\\\"def', '"', 3],
    // utf-8
    ['é\"éé\\\\\"def', '"', 3, true, '\\', true],
    // other escape symbol
    ['a*"bc***"def', '"', 3, true, '*'],
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
    ['abc\\\\\"de\"f', '"', 6, false],
    ['abc\\\\\"de\"f', '"', 7, false],
    // utf-8
    ['ééé\\\\\"éé\"f', '"', 7, false, '\\', true],
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
    false,
    [4],
    false,
    [6],
    [2, 8],
    // offsets
    [2, 8],
    [8],
    // utf-8
    [8],
    // other escape symbol
    [8],
    [3],
    [4],
    false,
    [7],
    [7, 12],
    // simple
    // -----------------
    false,
    false,
    [4],
    [5],
    [6],
    [6, 10],
    // offsets
    [6, 10],
    [10],
    // utf-8
    [10],
    // other escape symbol
    [4],
    [5],
    false,
    [5],
    [6],
    [7],
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
        $res = @EscapeTool::getEscapedSymbolPositions($string, $symbol, $offset, $modeRecursive, $escSymbol);
    }
    else {
        $res = EscapeTool::getEscapedSymbolPositions($string, $symbol, $offset, $modeRecursive, $escSymbol);
    }
    $ret = ($expected === $res);
    if (false === $ret) {
        ComparisonErrorTableTool::collect($testNumber, $expected, $res);
    }
    return $ret;
});


PrettyTestInterpreter::create()->execute($agg);
ComparisonErrorTableTool::display();
