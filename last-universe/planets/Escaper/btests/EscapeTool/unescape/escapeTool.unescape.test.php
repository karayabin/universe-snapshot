<?php


use Escaper\EscapeTool;
use PhpBeast\AuthorTestAggregator;
use PhpBeast\Exception\BeastNotApplicableException;
use PhpBeast\PrettyTestInterpreter;

require_once "bigbang.php";


$agg = AuthorTestAggregator::create();

$a = [
    // recursive
    // ----------------
    ['', []],
    ['abcdefgh', []],
    ['abcd"efgh', []],
    ['abcd\"efgh', []],
    ['abcd\"efgh', ['"']],
    //
    ['abcd\\\"efgh', ['"']],
    ['abcd\\\\\"efgh', ['"']],
    ['abcd\\\\\\\"efgh', ['"']],
    ['abcd\\\\\\\\\"efgh', ['"']],
    //
    ['a\"bcd\"efgh', ['"']],
    // utf-8
    ['é\"ééé\"éégh', ['"']],
    // other symbol
    ['a\"bcd\"efgh', ['"'], true, '*'],
    ['a*"bcd*"efgh', ['"'], true, '*'],
    ['a**"bcd**"efgh', ['"'], true, '*'],
    // simple
    // ----------------
    ['abcd\"efgh', ['"'], false],
    ['abcd\\\"efgh', ['"'], false],
    ['abcd\\\\\"efgh', ['"'], false],
    ['a\"bcd\"efgh', ['"'], false],
    ['é\"ééé\"éééé', ['"'], false],
    ['a\"bcd\"efgh', ['"'], false, '*'],
    ['a*"bcd*"efgh', ['"'], false, '*'],
    ['a**"bcd**"efgh', ['"'], false, '*'],
    ['a**"bcd**"efgh', ['"'], false, '**'],
    ['a***"bcd***"efgh', ['"'], false, '**'],
    ['a****"bcd****"efgh', ['"'], false, '**'],
    
];

$b = [
    // recursive
    // ----------------
    '',
    'abcdefgh',
    'abcd"efgh',
    'abcd\"efgh',
    'abcd"efgh',
    //
    'abcd\"efgh',
    'abcd\"efgh',
    'abcd\\\"efgh',
    'abcd\\\"efgh',
    //
    'a"bcd"efgh',
    // utf-8
    'é"ééé"éégh',
    // other symbol
    'a\"bcd\"efgh',
    'a"bcd"efgh',
    'a*"bcd*"efgh',
    // simple
    // ----------------
    'abcd"efgh',
    'abcd\"efgh',
    'abcd\\\"efgh',
    'a"bcd"efgh',
    'é"ééé"éééé',
    'a\"bcd\"efgh',
    'a"bcd"efgh',
    'a*"bcd*"efgh',
    'a"bcd"efgh',
    'a*"bcd*"efgh',
    'a**"bcd**"efgh',
    
];


$agg->addTestsByColumn($a, $b, function ($value, $expected, &$msg) {

    $modeRecursive = true;
    $escSymbol = '\\';
    $isUtf8Check = false;
    list($string, $symbols) = $value;

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


    $res = EscapeTool::unescape($string, $symbols, $modeRecursive, $escSymbol);
    return ($expected === $res);
});


PrettyTestInterpreter::create()->execute($agg);