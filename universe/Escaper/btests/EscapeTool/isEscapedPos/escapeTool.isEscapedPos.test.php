<?php


use Escaper\EscapeTool;
use PhpBeast\AuthorTestAggregator;
use PhpBeast\Exception\BeastNotApplicableException;
use PhpBeast\PrettyTestInterpreter;

require_once "bigbang.php";


$agg = AuthorTestAggregator::create();

$a = [
    // ascii
    // basic
    ['', 0],
    ['abcdef', 0],
    ['\abcdef', 0],
    ['\abcdef', 1],
    ['\abcdef', 4],
    ['\ab\cdef', 4],
    // recursive mode (backslash)
    ['\\\abcdef', 2], // is letter a escaped
    ['\\\\\abcdef', 3],
    ['\\\\\\\abcdef', 4],
    ['\\\\\\\\\abcdef', 5],
    ['ab\\\cdef', 4], // is letter c escaped
    ['ab\\\\\cdef', 5],
    // simple mode (backslash)
    ['\\\abcdef', 2, false], // is letter a escaped
    ['\\\\\abcdef', 3, false],
    ['\\\\\\\abcdef', 4, false],
    ['ab\\\cdef', 4, false], // is letter a escaped
    ['ab\\\\\cdef', 5, false],
    // recursive mode (one char custom escape symbol)
    ['ab\cdef', 3, true, '*'],
    ['ab*cdef', 3, true, '*'],
    ['ab**cdef', 4, true, '*'],
    ['ab***cdef', 5, true, '*'],
    // simple mode (one char custom escape symbol)
    ['ab\cdef', 3, false, '*'],
    ['ab*cdef', 3, false, '*'],
    ['ab**cdef', 4, false, '*'],
    ['ab***cdef', 5, false, '*'],
    // recursive mode (two chars custom escape symbol)
    ['ab\cdef', 3, true, '**'],
    ['ab*cdef', 3, true, '**'],
    ['ab**cdef', 4, true, '**'],
    ['ab***cdef', 5, true, '**'],
    ['ab****cdef', 6, true, '**'],
    ['ab*****cdef', 7, true, '**'],
    ['ab******cdef', 8, true, '**'],
    // simple mode (two chars custom escape symbol)
    ['ab\cdef', 3, false, '**'],
    ['ab*cdef', 3, false, '**'],
    ['ab**cdef', 4, false, '**'],
    ['ab***cdef', 5, false, '**'],
    ['ab****cdef', 6, false, '**'],
    ['ab*****cdef', 7, false, '**'],
    ['ab******cdef', 8, false, '**'],
    // utf-8
    // recursive mode 
    ['ééà\épou', 4, true, '\\', true],
    ['ééàépou', 4, true, '\\', true],
    // simple mode 
    ['ééà\épou', 4, false, '\\', true],
    ['ééàépou', 4, false, '\\', true],


];

$b = [
    // basic
    false,
    false,
    false,
    true,
    false,
    true,
    // recursive mode
    false,
    true,
    false,
    true,
    false,
    true,
    // simple mode
    true,
    true,
    true,
    true,
    true,
    // recursive mode (one char custom escape symbol)
    false,
    true,
    false,
    true,
    // simple mode (one char custom escape symbol)
    false,
    true,
    true,
    true,
    // recursive mode (two chars custom escape symbol)
    false,
    false,
    true,
    true,
    false,
    false,
    true,
    // simple mode (two chars custom escape symbol)
    false,
    false,
    true,
    true,
    true,
    true,
    true,
    // utf-8
    // recursive mode
    true,
    false,
    // simple mode
    true,
    false,
];


$agg->addTestsByColumn($a, $b, function ($value, $expected, &$msg) {

    $modeRecursive = true;
    $escSymbol = '\\';
    $isUtf8Check = false;
    list($haystack, $pos) = $value;

    if (array_key_exists('2', $value)) {
        $modeRecursive = $value[2];
    }
    if (array_key_exists('3', $value)) {
        $escSymbol = $value[3];
    }
    if (array_key_exists('4', $value)) {
        $isUtf8Check = $value[4];
    }

    if (true === $isUtf8Check) {
        if ('utf-8' !== strtolower(mb_internal_encoding())) {
            throw new BeastNotApplicableException();
        }
    }


    $res = EscapeTool::isEscapedPos($haystack, $pos, $modeRecursive, $escSymbol);
    return ($expected === $res);
});


PrettyTestInterpreter::create()->execute($agg);