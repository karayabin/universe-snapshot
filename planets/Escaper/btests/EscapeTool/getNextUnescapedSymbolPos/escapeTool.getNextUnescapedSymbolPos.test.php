<?php


use Escaper\EscapeTool;
use PhpBeast\AuthorTestAggregator;
use PhpBeast\Exception\BeastNotApplicableException;
use PhpBeast\PrettyTestInterpreter;

require_once "bigbang.php";



$agg = AuthorTestAggregator::create();

$a = [
    // recursive
    // ----------------------------------
    ['', '"', 0],
    ['abc"def', '"', 0],
    ['abc\"def', '"', 0],
    ['abc\\\"def', '"', 0],
    ['abc\\\\\"def', '"', 0],
    // utf-8
    ['été"def', '"', 0, true, '\\', true],
    ['été\"def', '"', 0, true, '\\', true],
    // other symbol
    ['abc"def', '"', 0, true, '*'],
    ['abc\"def', '"', 0, true, '*'],    
    ['abc*"def', '"', 0, true, '*'],    
    ['abc**"def', '"', 0, true, '*'],    
    ['abc***"def', '"', 0, true, '*'],    
    // symbol of length 2
    ['abc"def', '"', 0, true, '**'],
    ['abc*"def', '"', 0, true, '**'],
    ['abc**"def', '"', 0, true, '**'],
    ['abc***"def', '"', 0, true, '**'],
    ['abc****"def', '"', 0, true, '**'],
    ['abc*****"def', '"', 0, true, '**'],
    ['abc******"def', '"', 0, true, '**'],
    // simple
    // ----------------------------------    
    ['abc"def', '"', 0, false],
    ['abc\"def', '"', 0, false],
    ['abc\\\"def', '"', 0, false],
    ['abc\\\\\"def', '"', 0, false],
    // utf-8
    ['été"def', '"', 0, false, '\\', true],
    ['été\"def', '"', 0, false, '\\', true],
    // other symbol
    ['abc"def', '"', 0, false, '*'],
    ['abc\"def', '"', 0, false, '*'],
    ['abc*"def', '"', 0, false, '*'],
    ['abc**"def', '"', 0, false, '*'],
    ['abc***"def', '"', 0, false, '*'],
    // symbol of length 2
    ['abc"def', '"', 0, false, '**'],
    ['abc*"def', '"', 0, false, '**'],
    ['abc**"def', '"', 0, false, '**'],
    ['abc***"def', '"', 0, false, '**'],
    ['abc****"def', '"', 0, false, '**'],
    ['abc*****"def', '"', 0, false, '**'],
    ['abc******"def', '"', 0, false, '**'],    


];

$b = [
    // recursive
    // ----------------------------------
    false,
    3,
    false,
    5,
    false,
    // utf-8
    3,
    false,
    // other symbol
    3,
    4,
    false,    
    5,    
    false,    
    // symbol of length 2
    3,
    4,
    false,
    false,
    7,
    8,
    false,
    // simple
    // ----------------------------------   
    3,
    false,
    false,
    false,
    // utf-8
    3,
    false,
    // other symbol
    3,
    4,
    false,
    false,
    false,
    // symbol of length 2
    3,
    4,
    false,
    false,
    false,
    false,
    false,
];


$agg->addTestsByColumn($a, $b, function ($value, $expected, &$msg) {

    $modeRecursive = true;
    $escSymbol = '\\';
    $isUtf8Check = false;
    list($string, $symbol, $startPos) = $value;

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

    $res = EscapeTool::getNextUnescapedSymbolPos($string, $symbol, $startPos, $modeRecursive, $escSymbol);
    return ($expected === $res);
});


PrettyTestInterpreter::create()->execute($agg);