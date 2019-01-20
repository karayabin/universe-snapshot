<?php


use PhpBeast\AuthorTestAggregator;
use PhpBeast\PrettyTestInterpreter;
use PhpBeast\Tool\ComparisonErrorTableTool;
use Tokens\TokenRegex\Element\AtomElement;
use Tokens\TokenRegex\RegexEngine;
use Tokens\TokenRegex\TokenModel;


require_once "bigbang.php";


$agg = AuthorTestAggregator::create();



//--------------------------------------------
// TEST 1 - chien - success
//--------------------------------------------

$model = TokenModel::create()
    ->addElement(AtomElement::create()->symbol('c'))
    ->addElement(AtomElement::create()->symbol('h'))
    ->addElement(AtomElement::create()->symbol('i'))
    ->addElement(AtomElement::create()->symbol('e'))
    ->addElement(AtomElement::create()->symbol('n'));


$tokenIdentifiers = [
    'a',
    'b',
    'c',
    'h',
    'i',
    'e',
    'n',
    'c',
];
$s = '';
RegexEngine::create()->match($tokenIdentifiers, $model, function (array $match, array $markers = null) use (&$s) {
    foreach ($match as $element) {
        $s .= $element;
    }
});
$agg->addTest(function() use ($s){
    return ('chien' === $s);
});


//--------------------------------------------
// TEST 2 - chien - failure
//--------------------------------------------

$model = TokenModel::create()
    ->addElement(AtomElement::create()->symbol('c'))
    ->addElement(AtomElement::create()->symbol('h'))
    ->addElement(AtomElement::create()->symbol('i'))
    ->addElement(AtomElement::create()->symbol('e'))
    ->addElement(AtomElement::create()->symbol('n'));


$tokenIdentifiers = [
    'a',
    'b',
    'c',
    'h',
    'e',
    'n',
    'c',
];
$s = '';
RegexEngine::create()->match($tokenIdentifiers, $model, function (array $match, array $markers = null) use (&$s) {
    foreach ($match as $element) {
        $s .= $element;
    }
});
$agg->addTest(function() use ($s){
    return ('' === $s);
});


//--------------------------------------------
// TEST 3 - ch?ien --> cien
//--------------------------------------------

$model = TokenModel::create()
    ->addElement(AtomElement::create()->symbol('c'))
    ->addElement(AtomElement::create()->symbol('h'), '?')
    ->addElement(AtomElement::create()->symbol('i'))
    ->addElement(AtomElement::create()->symbol('e'))
    ->addElement(AtomElement::create()->symbol('n'));


$tokenIdentifiers = [
    'a',
    'b',
    'c',
    'i',
    'e',
    'n',
    'c',
];
$s = '';
RegexEngine::create()->match($tokenIdentifiers, $model, function (array $match, array $markers = null) use (&$s) {
    foreach ($match as $element) {
        $s .= $element;
    }
});
$agg->addTest(function() use ($s){
    return ('cien' === $s);
});



//--------------------------------------------
// TEST 4 - ch?ien --> chien
//--------------------------------------------

$model = TokenModel::create()
    ->addElement(AtomElement::create()->symbol('c'))
    ->addElement(AtomElement::create()->symbol('h'), '?')
    ->addElement(AtomElement::create()->symbol('i'))
    ->addElement(AtomElement::create()->symbol('e'))
    ->addElement(AtomElement::create()->symbol('n'));


$tokenIdentifiers = [
    'a',
    'b',
    'c',
    'h',
    'i',
    'e',
    'n',
    'c',
];
$s = '';
RegexEngine::create()->match($tokenIdentifiers, $model, function (array $match, array $markers = null) use (&$s) {
    foreach ($match as $element) {
        $s .= $element;
    }
});
$agg->addTest(function() use ($s){
    return ('chien' === $s);
});



//--------------------------------------------
// TEST 5 - ch?i?en --> chien
//--------------------------------------------

$model = TokenModel::create()
    ->addElement(AtomElement::create()->symbol('c'))
    ->addElement(AtomElement::create()->symbol('h'), '?')
    ->addElement(AtomElement::create()->symbol('i'), '?')
    ->addElement(AtomElement::create()->symbol('e'))
    ->addElement(AtomElement::create()->symbol('n'));


$tokenIdentifiers = [
    'a',
    'b',
    'c',
    'h',
    'i',
    'e',
    'n',
    'c',
];
$s = '';
RegexEngine::create()->match($tokenIdentifiers, $model, function (array $match, array $markers = null) use (&$s) {
    foreach ($match as $element) {
        $s .= $element;
    }
});
$agg->addTest(function() use ($s){
    return ('chien' === $s);
});



//--------------------------------------------
// TEST 6 - ch?i?en --> cien
//--------------------------------------------

$model = TokenModel::create()
    ->addElement(AtomElement::create()->symbol('c'))
    ->addElement(AtomElement::create()->symbol('h'), '?')
    ->addElement(AtomElement::create()->symbol('i'), '?')
    ->addElement(AtomElement::create()->symbol('e'))
    ->addElement(AtomElement::create()->symbol('n'));


$tokenIdentifiers = [
    'a',
    'b',
    'c',
//    'h',
    'i',
    'e',
    'n',
    'c',
];
$s = '';
RegexEngine::create()->match($tokenIdentifiers, $model, function (array $match, array $markers = null) use (&$s) {
    foreach ($match as $element) {
        $s .= $element;
    }
});
$agg->addTest(function() use ($s){
    return ('cien' === $s);
});




//--------------------------------------------
// TEST 7 - ch?i?en --> chen
//--------------------------------------------

$model = TokenModel::create()
    ->addElement(AtomElement::create()->symbol('c'))
    ->addElement(AtomElement::create()->symbol('h'), '?')
    ->addElement(AtomElement::create()->symbol('i'), '?')
    ->addElement(AtomElement::create()->symbol('e'))
    ->addElement(AtomElement::create()->symbol('n'));


$tokenIdentifiers = [
    'a',
    'b',
    'c',
    'h',
//    'i',
    'e',
    'n',
    'c',
];
$s = '';
RegexEngine::create()->match($tokenIdentifiers, $model, function (array $match, array $markers = null) use (&$s) {
    foreach ($match as $element) {
        $s .= $element;
    }
});
$agg->addTest(function() use ($s){
    return ('chen' === $s);
});


//--------------------------------------------
// TEST 8 - ch?i?en --> cen
//--------------------------------------------

$model = TokenModel::create()
    ->addElement(AtomElement::create()->symbol('c'))
    ->addElement(AtomElement::create()->symbol('h'), '?')
    ->addElement(AtomElement::create()->symbol('i'), '?')
    ->addElement(AtomElement::create()->symbol('e'))
    ->addElement(AtomElement::create()->symbol('n'));


$tokenIdentifiers = [
    'a',
    'b',
    'c',
//    'h',
//    'i',
    'e',
    'n',
    'c',
];
$s = '';
RegexEngine::create()->match($tokenIdentifiers, $model, function (array $match, array $markers = null) use (&$s) {
    foreach ($match as $element) {
        $s .= $element;
    }
});
$agg->addTest(function() use ($s){
    return ('cen' === $s);
});



//--------------------------------------------
// TEST 9 - chien? --> chien
//--------------------------------------------

$model = TokenModel::create()
    ->addElement(AtomElement::create()->symbol('c'))
    ->addElement(AtomElement::create()->symbol('h'))
    ->addElement(AtomElement::create()->symbol('i'))
    ->addElement(AtomElement::create()->symbol('e'))
    ->addElement(AtomElement::create()->symbol('n'), '?');


$tokenIdentifiers = [
    'a',
    'b',
    'c',
    'h',
    'i',
    'e',
    'n',
    'c',
];
$s = '';
RegexEngine::create()->match($tokenIdentifiers, $model, function (array $match, array $markers = null) use (&$s) {
    foreach ($match as $element) {
        $s .= $element;
    }
});
$agg->addTest(function() use ($s){
    return ('chien' === $s);
});



//--------------------------------------------
// TEST 10 - chien? --> chie
//--------------------------------------------

$model = TokenModel::create()
    ->addElement(AtomElement::create()->symbol('c'))
    ->addElement(AtomElement::create()->symbol('h'))
    ->addElement(AtomElement::create()->symbol('i'))
    ->addElement(AtomElement::create()->symbol('e'))
    ->addElement(AtomElement::create()->symbol('n'), '?');


$tokenIdentifiers = [
    'a',
    'b',
    'c',
    'h',
    'i',
    'e',
//    'n',
    'c',
];
$s = '';
RegexEngine::create()->match($tokenIdentifiers, $model, function (array $match, array $markers = null) use (&$s) {
    foreach ($match as $element) {
        $s .= $element;
    }
});
$agg->addTest(function() use ($s){
    return ('chie' === $s);
});




PrettyTestInterpreter::create()->execute($agg);
ComparisonErrorTableTool::display();