<?php


use PhpBeast\AuthorTestAggregator;
use PhpBeast\PrettyTestInterpreter;
use PhpBeast\Tool\ComparisonErrorTableTool;
use SequenceMatcher\Element\AlternateGroup;
use SequenceMatcher\Element\CharEntity;
use SequenceMatcher\Element\Group;
use SequenceMatcher\Model;
use SequenceMatcher\SequenceMatcher;


//require_once "bigbang.php";


$agg = AuthorTestAggregator::create();
function test($sequence, $model)
{
    $s = '';
    SequenceMatcher::create()
//        ->debugMode()
        ->match($sequence, $model, function (array $match, array $markers = null) use (&$s) {
            foreach ($match as $element) {
                $s .= $element;
            }
        });
    return $s;
}

function testAgg($expected, $agg, $sequence, $model)
{
    $s = test($sequence, $model);
    $agg->addTest(function () use ($s, $expected) {
        return ($expected === $s);
    });
}

//--------------------------------------------
// TEST 1 - chien - success
//--------------------------------------------

$model = Model::create()
    ->addElement(CharEntity::create('c'))
    ->addElement(CharEntity::create('h'))
    ->addElement(CharEntity::create('i'))
    ->addElement(CharEntity::create('e'))
    ->addElement(CharEntity::create('n'));


$sequence = [
    'a',
    'b',
    'c',
    'h',
    'i',
    'e',
    'n',
    'c',
];


testAgg('chien', $agg, $sequence, $model);


//--------------------------------------------
// TEST 1b - chien - success
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('c'))
    ->addElement(CharEntity::create('h'))
    ->addElement(CharEntity::create('i'))
    ->addElement(CharEntity::create('e'))
    ->addElement(CharEntity::create('n'));


$sequence = [
    'c',
    'h',
    'i',
    'e',
    'n',
];


testAgg('chien', $agg, $sequence, $model);


//--------------------------------------------
// TEST 2 - chien - failure
//--------------------------------------------

$model = Model::create()
    ->addElement(CharEntity::create('c'))
    ->addElement(CharEntity::create('h'))
    ->addElement(CharEntity::create('i'))
    ->addElement(CharEntity::create('e'))
    ->addElement(CharEntity::create('n'));


$sequence = [
    'a',
    'b',
    'c',
    'h',
    'e',
    'n',
    'c',
];
testAgg('', $agg, $sequence, $model);

//--------------------------------------------
// TEST 3 - ch?ien --> cien
//--------------------------------------------

$model = Model::create()
    ->addElement(CharEntity::create('c'))
    ->addElement(CharEntity::create('h'), '?')
    ->addElement(CharEntity::create('i'))
    ->addElement(CharEntity::create('e'))
    ->addElement(CharEntity::create('n'));


$sequence = [
    'a',
    'b',
    'c',
    'i',
    'e',
    'n',
    'c',
];
testAgg('cien', $agg, $sequence, $model);


//--------------------------------------------
// TEST 4 - ch?ien --> chien
//--------------------------------------------

$model = Model::create()
    ->addElement(CharEntity::create('c'))
    ->addElement(CharEntity::create('h'), '?')
    ->addElement(CharEntity::create('i'))
    ->addElement(CharEntity::create('e'))
    ->addElement(CharEntity::create('n'));


$sequence = [
    'a',
    'b',
    'c',
    'h',
    'i',
    'e',
    'n',
    'c',
];
testAgg('chien', $agg, $sequence, $model);


//--------------------------------------------
// TEST 5 - ch?i?en --> chien
//--------------------------------------------

$model = Model::create()
    ->addElement(CharEntity::create('c'))
    ->addElement(CharEntity::create('h'), '?')
    ->addElement(CharEntity::create('i'), '?')
    ->addElement(CharEntity::create('e'))
    ->addElement(CharEntity::create('n'));


$sequence = [
    'a',
    'b',
    'c',
    'h',
    'i',
    'e',
    'n',
    'c',
];
testAgg('chien', $agg, $sequence, $model);


//--------------------------------------------
// TEST 6 - ch?i?en --> cien
//--------------------------------------------

$model = Model::create()
    ->addElement(CharEntity::create('c'))
    ->addElement(CharEntity::create('h'), '?')
    ->addElement(CharEntity::create('i'), '?')
    ->addElement(CharEntity::create('e'))
    ->addElement(CharEntity::create('n'));


$sequence = [
    'a',
    'b',
    'c',
//    'h',
    'i',
    'e',
    'n',
    'c',
];
testAgg('cien', $agg, $sequence, $model);


//--------------------------------------------
// TEST 7 - ch?i?en --> chen
//--------------------------------------------

$model = Model::create()
    ->addElement(CharEntity::create('c'))
    ->addElement(CharEntity::create('h'), '?')
    ->addElement(CharEntity::create('i'), '?')
    ->addElement(CharEntity::create('e'))
    ->addElement(CharEntity::create('n'));


$sequence = [
    'a',
    'b',
    'c',
    'h',
//    'i',
    'e',
    'n',
    'c',
];
testAgg('chen', $agg, $sequence, $model);


//--------------------------------------------
// TEST 8 - ch?i?en --> cen
//--------------------------------------------

$model = Model::create()
    ->addElement(CharEntity::create('c'))
    ->addElement(CharEntity::create('h'), '?')
    ->addElement(CharEntity::create('i'), '?')
    ->addElement(CharEntity::create('e'))
    ->addElement(CharEntity::create('n'));


$sequence = [
    'a',
    'b',
    'c',
//    'h',
//    'i',
    'e',
    'n',
    'c',
];
testAgg('cen', $agg, $sequence, $model);


//--------------------------------------------
// TEST 9 - chien? --> chien
//--------------------------------------------

$model = Model::create()
    ->addElement(CharEntity::create('c'))
    ->addElement(CharEntity::create('h'), '?')
    ->addElement(CharEntity::create('i'), '?')
    ->addElement(CharEntity::create('e'))
    ->addElement(CharEntity::create('n'));


$sequence = [
    'a',
    'b',
    'c',
    'h',
    'i',
    'e',
    'n',
    'c',
];
testAgg('chien', $agg, $sequence, $model);


//--------------------------------------------
// TEST 10 - chien? --> chie
//--------------------------------------------

$model = Model::create()
    ->addElement(CharEntity::create('c'))
    ->addElement(CharEntity::create('h'))
    ->addElement(CharEntity::create('i'))
    ->addElement(CharEntity::create('e'))
    ->addElement(CharEntity::create('n'), '?');


$sequence = [
    'a',
    'b',
    'c',
    'h',
    'i',
    'e',
//    'n',
    'p',
];
testAgg('chie', $agg, $sequence, $model);


//--------------------------------------------
// TEST 11 - abchienp --> c(hi)en ==> chien
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('c'))
    ->addElement(Group::create()
            ->addElement(CharEntity::create('h'))
            ->addElement(CharEntity::create('i'))
    )
    ->addElement(CharEntity::create('e'))
    ->addElement(CharEntity::create('n'));


$sequence = [
    'a',
    'b',
    'c',
    'h',
    'i',
    'e',
    'n',
    'p',
];
testAgg('chien', $agg, $sequence, $model);


//--------------------------------------------
// TEST 12 - abchienp --> c(hi)?en ==> chien
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('c'))
    ->addElement(Group::create()
            ->addElement(CharEntity::create('h'))
            ->addElement(CharEntity::create('i'))
        , '?'
    )
    ->addElement(CharEntity::create('e'))
    ->addElement(CharEntity::create('n'));


$sequence = [
    'a',
    'b',
    'c',
    'h',
    'i',
    'e',
    'n',
    'p',
];
testAgg('chien', $agg, $sequence, $model);


//--------------------------------------------
// TEST 13 - abchfenp --> c(hi)?en ==> failure
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('c'))
    ->addElement(Group::create()
            ->addElement(CharEntity::create('h'))
            ->addElement(CharEntity::create('i'))
        , '?'
    )
    ->addElement(CharEntity::create('e'))
    ->addElement(CharEntity::create('n'));


$sequence = [
    'a',
    'b',
    'c',
    'h',
    'f',
    'e',
    'n',
    'p',
];
testAgg('', $agg, $sequence, $model);


//--------------------------------------------
// TEST 14 - abcenp --> c(hi)?en ==> cen
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('c'))
    ->addElement(Group::create()
            ->addElement(CharEntity::create('h'))
            ->addElement(CharEntity::create('i'))
        , '?'
    )
    ->addElement(CharEntity::create('e'))
    ->addElement(CharEntity::create('n'));


$sequence = [
    'a',
    'b',
    'c',
    'e',
    'n',
    'p',
];
testAgg('cen', $agg, $sequence, $model);


//--------------------------------------------
// TEST 15 - abchenp --> c(hi)?en ==> failure
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('c'))
    ->addElement(Group::create()
            ->addElement(CharEntity::create('h'))
            ->addElement(CharEntity::create('i'))
        , '?'
    )
    ->addElement(CharEntity::create('e'))
    ->addElement(CharEntity::create('n'));


$sequence = [
    'a',
    'b',
    'c',
    'h',
    'e',
    'n',
    'p',
];
testAgg('', $agg, $sequence, $model);


//--------------------------------------------
// TEST 16 - abchienp --> c(hie)n ==> chien
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('c'))
    ->addElement(Group::create()
            ->addElement(CharEntity::create('h'))
            ->addElement(CharEntity::create('i'))
            ->addElement(CharEntity::create('e'))
    )
    ->addElement(CharEntity::create('n'));


$sequence = [
    'a',
    'b',
    'c',
    'h',
    'i',
    'e',
    'n',
    'p',
];
testAgg('chien', $agg, $sequence, $model);


//--------------------------------------------
// TEST 17 - abcnp --> c(hie)n ==> failure
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('c'))
    ->addElement(Group::create()
            ->addElement(CharEntity::create('h'))
            ->addElement(CharEntity::create('i'))
            ->addElement(CharEntity::create('e'))
    )
    ->addElement(CharEntity::create('n'));


$sequence = [
    'a',
    'b',
    'c',
//    'h',
//    'i',
//    'e',
    'n',
    'p',
];
testAgg('', $agg, $sequence, $model);


//--------------------------------------------
// TEST 18 - abcnp --> c(hie)?n ==> cn
//--------------------------------------------

$model = Model::create()
    ->addElement(CharEntity::create('c'))
    ->addElement(Group::create()
            ->addElement(CharEntity::create('h'))
            ->addElement(CharEntity::create('i'))
            ->addElement(CharEntity::create('e'))
        , '?'
    )
    ->addElement(CharEntity::create('n'));


$sequence = [
    'a',
    'b',
    'c',
//    'h',
//    'i',
//    'e',
    'n',
    'p',
];
testAgg('cn', $agg, $sequence, $model);


//--------------------------------------------
// TEST 19 - abchienp --> c(hie)?n(ne) ==> failure
//--------------------------------------------

$model = Model::create()
    ->addElement(CharEntity::create('c'))
    ->addElement(Group::create()
            ->addElement(CharEntity::create('h'))
            ->addElement(CharEntity::create('i'))
            ->addElement(CharEntity::create('e'))
        , '?'
    )
    ->addElement(CharEntity::create('n'))
    ->addElement(Group::create()
            ->addElement(CharEntity::create('n'))
            ->addElement(CharEntity::create('e'))
    );

$sequence = [
    'a',
    'b',
    'c',
    'h',
    'i',
    'e',
    'n',
    'p',
];
testAgg('', $agg, $sequence, $model);


//--------------------------------------------
// TEST 20 - abchienp --> c(hie)?n(ne)? ==> chien
//--------------------------------------------

$model = Model::create()
    ->addElement(CharEntity::create('c'))
    ->addElement(Group::create()
            ->addElement(CharEntity::create('h'))
            ->addElement(CharEntity::create('i'))
            ->addElement(CharEntity::create('e'))
        , '?'
    )
    ->addElement(CharEntity::create('n'))
    ->addElement(Group::create()
            ->addElement(CharEntity::create('n'))
            ->addElement(CharEntity::create('e'))
        , '?'
    );

$sequence = [
    'a',
    'b',
    'c',
    'h',
    'i',
    'e',
    'n',
    'p',
];
testAgg('chien', $agg, $sequence, $model);


//--------------------------------------------
// TEST 21 - abtorturerz --> t(or(tur)e)r ==> torturer
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('t'))
    ->addElement(Group::create()
            ->addElement(CharEntity::create('o'))
            ->addElement(CharEntity::create('r'))
            ->addElement(Group::create()
                    ->addElement(CharEntity::create('t'))
                    ->addElement(CharEntity::create('u'))
                    ->addElement(CharEntity::create('r'))
            )
            ->addElement(CharEntity::create('e'))
    )
    ->addElement(CharEntity::create('r'));


$sequence = [
    'a',
    'b',
    't',
    'o',
    'r',
    't',
    'u',
    'r',
    'e',
    'r',
    'z',
];
testAgg('torturer', $agg, $sequence, $model);


//--------------------------------------------
// TEST 22 - abtorerz --> t(or(tur)e)r ==> failure
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('t'))
    ->addElement(Group::create()
            ->addElement(CharEntity::create('o'))
            ->addElement(CharEntity::create('r'))
            ->addElement(Group::create()
                    ->addElement(CharEntity::create('t'))
                    ->addElement(CharEntity::create('u'))
                    ->addElement(CharEntity::create('r'))
            )
            ->addElement(CharEntity::create('e'))
    )
    ->addElement(CharEntity::create('r'));


$sequence = [
    'a',
    'b',
    't',
    'o',
    'r',
//    't',
//    'u',
//    'r',
    'e',
    'r',
    'z',
];
testAgg('', $agg, $sequence, $model);


//--------------------------------------------
// TEST 23 - abtorerz --> t(or(tur)?e)r ==> torer
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('t'))
    ->addElement(Group::create()
            ->addElement(CharEntity::create('o'))
            ->addElement(CharEntity::create('r'))
            ->addElement(Group::create()
                    ->addElement(CharEntity::create('t'))
                    ->addElement(CharEntity::create('u'))
                    ->addElement(CharEntity::create('r'))
                , '?'
            )
            ->addElement(CharEntity::create('e'))
    )
    ->addElement(CharEntity::create('r'));


$sequence = [
    'a',
    'b',
    't',
    'o',
    'r',
//    't',
//    'u',
//    'r',
    'e',
    'r',
    'z',
];
testAgg('torer', $agg, $sequence, $model);


//--------------------------------------------
// TEST 24 - attila --> at+ila ==> attila
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('a'))
    ->addElement(CharEntity::create('t'), '+')
    ->addElement(CharEntity::create('i'))
    ->addElement(CharEntity::create('l'))
    ->addElement(CharEntity::create('a'));


$sequence = [
    'a',
    't',
    't',
    'i',
    'l',
    'a',
];
testAgg('attila', $agg, $sequence, $model);


//--------------------------------------------
// TEST 25 - atttila --> at+ila ==> atttila
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('a'))
    ->addElement(CharEntity::create('t'), '+')
    ->addElement(CharEntity::create('i'))
    ->addElement(CharEntity::create('l'))
    ->addElement(CharEntity::create('a'));


$sequence = [
    'a',
    't',
    't',
    't',
    'i',
    'l',
    'a',
];
testAgg('atttila', $agg, $sequence, $model);


//--------------------------------------------
// TEST 26 - atila --> at+ila ==> atila
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('a'))
    ->addElement(CharEntity::create('t'), '+')
    ->addElement(CharEntity::create('i'))
    ->addElement(CharEntity::create('l'))
    ->addElement(CharEntity::create('a'));


$sequence = [
    'a',
    't',
    'i',
    'l',
    'a',
];
testAgg('atila', $agg, $sequence, $model);


//--------------------------------------------
// TEST 27 - aila --> at+ila ==> failure
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('a'))
    ->addElement(CharEntity::create('t'), '+')
    ->addElement(CharEntity::create('i'))
    ->addElement(CharEntity::create('l'))
    ->addElement(CharEntity::create('a'));


$sequence = [
    'a',
//    't',
    'i',
    'l',
    'a',
];
testAgg('', $agg, $sequence, $model);


//--------------------------------------------
// TEST 28 - atiii --> ati+ ==> atiii
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('a'))
    ->addElement(CharEntity::create('t'))
    ->addElement(CharEntity::create('i'), '+');


$sequence = [
    'a',
    't',
    'i',
    'i',
    'i',
];
testAgg('atiii', $agg, $sequence, $model);

//--------------------------------------------
// TEST 29 - agogo --> a(go)+ ==> agogo
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('a'))
    ->addElement(Group::create()
            ->addElement(CharEntity::create('g'))
            ->addElement(CharEntity::create('o'))
        , '+');


$sequence = [
    'a',
    'g',
    'o',
    'g',
    'o',
];
testAgg('agogo', $agg, $sequence, $model);


//--------------------------------------------
// TEST 30 - agogogo --> a(go)+ ==> agogogo
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('a'))
    ->addElement(Group::create()
            ->addElement(CharEntity::create('g'))
            ->addElement(CharEntity::create('o'))
        , '+');


$sequence = [
    'a',
    'g',
    'o',
    'g',
    'o',
    'g',
    'o',
];
testAgg('agogogo', $agg, $sequence, $model);


//--------------------------------------------
// TEST 31 - agogogoze --> a(go)+ze ==> agogogoze
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('a'))
    ->addElement(Group::create()
            ->addElement(CharEntity::create('g'))
            ->addElement(CharEntity::create('o'))
        , '+')
    ->addElement(CharEntity::create('z'))
    ->addElement(CharEntity::create('e'));


$sequence = [
    'a',
    'g',
    'o',
    'g',
    'o',
    'g',
    'o',
    'z',
    'e',
];
testAgg('agogogoze', $agg, $sequence, $model);


//--------------------------------------------
// TEST 32 - agogogola --> a(go)+ze ==> failure
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('a'))
    ->addElement(Group::create()
            ->addElement(CharEntity::create('g'))
            ->addElement(CharEntity::create('o'))
        , '+')
    ->addElement(CharEntity::create('z'))
    ->addElement(CharEntity::create('e'));


$sequence = [
    'a',
    'g',
    'o',
    'g',
    'o',
    'g',
    'o',
    'l',
    'a',
];
testAgg('', $agg, $sequence, $model);


//--------------------------------------------
// TEST 33 - ago --> a(go)+ ==> ago
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('a'))
    ->addElement(Group::create()
            ->addElement(CharEntity::create('g'))
            ->addElement(CharEntity::create('o'))
        , '+');


$sequence = [
    'a',
    'g',
    'o',
];
testAgg('ago', $agg, $sequence, $model);


//--------------------------------------------
// TEST 34 - a --> a(go)+ ==> failure
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('a'))
    ->addElement(Group::create()
            ->addElement(CharEntity::create('g'))
            ->addElement(CharEntity::create('o'))
        , '+');


$sequence = [
    'a',
];
testAgg('', $agg, $sequence, $model);


//--------------------------------------------
// TEST 35 - ag --> a(go?) ==> ag
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('a'))
    ->addElement(Group::create()
            ->addElement(CharEntity::create('g'))
            ->addElement(CharEntity::create('o'), '?')
    );


$sequence = [
    'a',
    'g',
];
testAgg('ag', $agg, $sequence, $model);


//--------------------------------------------
// TEST 36 - agog --> a(go?)+ ==> agog
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('a'))
    ->addElement(Group::create()
            ->addElement(CharEntity::create('g'))
            ->addElement(CharEntity::create('o'), '?')
        , '+');


$sequence = [
    'a',
    'g',
    'o',
    'g',
];
testAgg('agog', $agg, $sequence, $model);


//--------------------------------------------
// TEST 37 - agogg --> a(go?)+ ==> agogg
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('a'))
    ->addElement(Group::create()
            ->addElement(CharEntity::create('g'))
            ->addElement(CharEntity::create('o'), '?')
        , '+');


$sequence = [
    'a',
    'g',
    'o',
    'g',
    'g',
];
testAgg('agogg', $agg, $sequence, $model);


//--------------------------------------------
// TEST 38 - agogggggo --> a(go?)+ ==> agogggggo
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('a'))
    ->addElement(Group::create()
            ->addElement(CharEntity::create('g'))
            ->addElement(CharEntity::create('o'), '?')
        , '+');


$sequence = [
    'a',
    'g',
    'o',
    'g',
    'g',
    'g',
    'g',
    'g',
    'o',
];
testAgg('agogggggo', $agg, $sequence, $model);


//--------------------------------------------
// TEST 39 - agoggggg --> a(go?)+ ==> agoggggg
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('a'))
    ->addElement(Group::create()
            ->addElement(CharEntity::create('g'))
            ->addElement(CharEntity::create('o'), '?')
        , '+');


$sequence = [
    'a',
    'g',
    'o',
    'g',
    'g',
    'g',
    'g',
    'g',
];
testAgg('agoggggg', $agg, $sequence, $model);


//--------------------------------------------
// TEST 40 - aooogooog --> a(g?o)+ ==> aooogooo
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('a'))
    ->addElement(Group::create()
            ->addElement(CharEntity::create('g'), '?')
            ->addElement(CharEntity::create('o'))
        , '+');


$sequence = [
    'a',
    'o',
    'o',
    'o',
    'g',
    'o',
    'o',
    'o',
    'g',
];
testAgg('aooogooo', $agg, $sequence, $model);


//--------------------------------------------
// TEST 41 - aooogooog --> a(g?o?)+ ==> aooogooog
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('a'))
    ->addElement(Group::create()
            ->addElement(CharEntity::create('g'), '?')
            ->addElement(CharEntity::create('o'), '?')
        , '+');


$sequence = [
    'a',
    'o',
    'o',
    'o',
    'g',
    'o',
    'o',
    'o',
    'g',
];
testAgg('aooogooog', $agg, $sequence, $model);


//--------------------------------------------
// TEST 42 - achinchiachin --> a(chin?a)+ ==> failure
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('a'))
    ->addElement(Group::create()
            ->addElement(CharEntity::create('c'))
            ->addElement(CharEntity::create('h'))
            ->addElement(CharEntity::create('i'))
            ->addElement(CharEntity::create('n'), '?')
            ->addElement(CharEntity::create('a'))
        , '+');


$sequence = [
    'a',
    'c',
    'h',
    'i',
    'n',
    'c',
    'h',
    'i',
    'a',
    'c',
    'h',
    'i',
    'n',
];
testAgg('', $agg, $sequence, $model);


//--------------------------------------------
// TEST 43 - achinachiachina --> a(chin?a)+ ==> achinachiachina
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('a'))
    ->addElement(Group::create()
            ->addElement(CharEntity::create('c'))
            ->addElement(CharEntity::create('h'))
            ->addElement(CharEntity::create('i'))
            ->addElement(CharEntity::create('n'), '?')
            ->addElement(CharEntity::create('a'))
        , '+');


$sequence = [
    'a',
    'c',
    'h',
    'i',
    'n',
    'a',
    'c',
    'h',
    'i',
    'a',
    'c',
    'h',
    'i',
    'n',
    'a',
];
testAgg('achinachiachina', $agg, $sequence, $model);


//--------------------------------------------
// TEST 44 - agoooora --> ago+r?a ==> agoooora
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('a'))
    ->addElement(CharEntity::create('g'))
    ->addElement(CharEntity::create('o'), '+')
    ->addElement(CharEntity::create('r'), '?')
    ->addElement(CharEntity::create('a'));


$sequence = [
    'a',
    'g',
    'o',
    'o',
    'o',
    'o',
    'r',
    'a',
];
testAgg('agoooora', $agg, $sequence, $model);


//--------------------------------------------
// TEST 45 - agooooa --> ago+r?a ==> agooooa
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('a'))
    ->addElement(CharEntity::create('g'))
    ->addElement(CharEntity::create('o'), '+')
    ->addElement(CharEntity::create('r'), '?')
    ->addElement(CharEntity::create('a'));


$sequence = [
    'a',
    'g',
    'o',
    'o',
    'o',
    'o',
//    'r',
    'a',
];
testAgg('agooooa', $agg, $sequence, $model);


//--------------------------------------------
// TEST 46 - agoooor --> ago+r? ==> agoooor
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('a'))
    ->addElement(CharEntity::create('g'))
    ->addElement(CharEntity::create('o'), '+')
    ->addElement(CharEntity::create('r'), '?');


$sequence = [
    'a',
    'g',
    'o',
    'o',
    'o',
    'o',
    'r',
];
testAgg('agoooor', $agg, $sequence, $model);


//--------------------------------------------
// TEST 47 - agoooor --> ago+r?a ==> failure
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('a'))
    ->addElement(CharEntity::create('g'))
    ->addElement(CharEntity::create('o'), '+')
    ->addElement(CharEntity::create('r'), '?')
    ->addElement(CharEntity::create('a'));


$sequence = [
    'a',
    'g',
    'o',
    'o',
    'o',
    'o',
    'r',
];
testAgg('', $agg, $sequence, $model);


//--------------------------------------------
// TEST 48 - apollo --> apol*o ==> apollo
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('a'))
    ->addElement(CharEntity::create('p'))
    ->addElement(CharEntity::create('o'))
    ->addElement(CharEntity::create('l'), '*')
    ->addElement(CharEntity::create('o'));


$sequence = [
    'a',
    'p',
    'o',
    'l',
    'l',
    'o',
];
testAgg('apollo', $agg, $sequence, $model);


//--------------------------------------------
// TEST 49 - apoo --> apol*o ==> apoo
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('a'))
    ->addElement(CharEntity::create('p'))
    ->addElement(CharEntity::create('o'))
    ->addElement(CharEntity::create('l'), '*')
    ->addElement(CharEntity::create('o'));


$sequence = [
    'a',
    'p',
    'o',
//    'l',
//    'l',
    'o',
];
testAgg('apoo', $agg, $sequence, $model);


//--------------------------------------------
// TEST 50 - apolllo --> apol*o ==> apolllo
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('a'))
    ->addElement(CharEntity::create('p'))
    ->addElement(CharEntity::create('o'))
    ->addElement(CharEntity::create('l'), '*')
    ->addElement(CharEntity::create('o'));


$sequence = [
    'a',
    'p',
    'o',
    'l',
    'l',
    'l',
    'o',
];
testAgg('apolllo', $agg, $sequence, $model);


//--------------------------------------------
// TEST 51 - apolllo --> apol*o? ==> apolllo
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('a'))
    ->addElement(CharEntity::create('p'))
    ->addElement(CharEntity::create('o'))
    ->addElement(CharEntity::create('l'), '*')
    ->addElement(CharEntity::create('o'), '?');


$sequence = [
    'a',
    'p',
    'o',
    'l',
    'l',
    'l',
    'o',
];
testAgg('apolllo', $agg, $sequence, $model);


//--------------------------------------------
// TEST 52 - apolll --> apol*o? ==> apolll
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('a'))
    ->addElement(CharEntity::create('p'))
    ->addElement(CharEntity::create('o'))
    ->addElement(CharEntity::create('l'), '*')
    ->addElement(CharEntity::create('o'), '?');


$sequence = [
    'a',
    'p',
    'o',
    'l',
    'l',
    'l',
];
testAgg('apolll', $agg, $sequence, $model);


//--------------------------------------------
// TEST 53 - apopopo --> a(po)* ==> apopopo
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('a'))
    ->addElement(Group::create()
            ->addElement(CharEntity::create('p'))
            ->addElement(CharEntity::create('o'))
        , '*'
    );


$sequence = [
    'a',
    'p',
    'o',
    'p',
    'o',
    'p',
    'o',
];
testAgg('apopopo', $agg, $sequence, $model);


//--------------------------------------------
// TEST 54 - a --> a(po)* ==> a
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('a'))
    ->addElement(Group::create()
            ->addElement(CharEntity::create('p'))
            ->addElement(CharEntity::create('o'))
        , '*'
    );


$sequence = [
    'a',
];
testAgg('a', $agg, $sequence, $model);


//--------------------------------------------
// TEST 55 - apo --> a(po)* ==> apo
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('a'))
    ->addElement(Group::create()
            ->addElement(CharEntity::create('p'))
            ->addElement(CharEntity::create('o'))
        , '*'
    );


$sequence = [
    'a',
    'p',
    'o',
];
testAgg('apo', $agg, $sequence, $model);


//--------------------------------------------
// TEST 56 - apollo --> a(po)*llo ==> apollo
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('a'))
    ->addElement(Group::create()
            ->addElement(CharEntity::create('p'))
            ->addElement(CharEntity::create('o'))
        , '*'
    )
    ->addElement(CharEntity::create('l'))
    ->addElement(CharEntity::create('l'))
    ->addElement(CharEntity::create('o'));


$sequence = [
    'a',
    'p',
    'o',
    'l',
    'l',
    'o',
];
testAgg('apollo', $agg, $sequence, $model);


//--------------------------------------------
// TEST 57 - apopollo --> a(po)*llo ==> apopollo
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('a'))
    ->addElement(Group::create()
            ->addElement(CharEntity::create('p'))
            ->addElement(CharEntity::create('o'))
        , '*'
    )
    ->addElement(CharEntity::create('l'))
    ->addElement(CharEntity::create('l'))
    ->addElement(CharEntity::create('o'));


$sequence = [
    'a',
    'p',
    'o',
    'p',
    'o',
    'l',
    'l',
    'o',
];
testAgg('apopollo', $agg, $sequence, $model);


//--------------------------------------------
// TEST 58 - apopollo --> a(po)*l*o ==> apopollo
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('a'))
    ->addElement(Group::create()
            ->addElement(CharEntity::create('p'))
            ->addElement(CharEntity::create('o'))
        , '*'
    )
    ->addElement(CharEntity::create('l'), '*')
    ->addElement(CharEntity::create('o'));


$sequence = [
    'a',
    'p',
    'o',
    'p',
    'o',
    'l',
    'l',
    'o',
];
testAgg('apopollo', $agg, $sequence, $model);


//--------------------------------------------
// TEST 59 - apollo --> a(po)*l*o ==> apollo
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('a'))
    ->addElement(Group::create()
            ->addElement(CharEntity::create('p'))
            ->addElement(CharEntity::create('o'))
        , '*'
    )
    ->addElement(CharEntity::create('l'), '*')
    ->addElement(CharEntity::create('o'));


$sequence = [
    'a',
    'p',
    'o',
    'l',
    'l',
    'o',
];
testAgg('apollo', $agg, $sequence, $model);


//--------------------------------------------
// TEST 60 - allllo --> a(po)*l*o ==> allllo
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('a'))
    ->addElement(Group::create()
            ->addElement(CharEntity::create('p'))
            ->addElement(CharEntity::create('o'))
        , '*'
    )
    ->addElement(CharEntity::create('l'), '*')
    ->addElement(CharEntity::create('o'));


$sequence = [
    'a',
    'l',
    'l',
    'l',
    'l',
    'o',
];
testAgg('allllo', $agg, $sequence, $model);


//--------------------------------------------
// TEST 61 - aplaplatir --> a((pla)*tir)* ==> aplaplatir
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('a'))
    ->addElement(Group::create()
            ->addElement(Group::create()
                    ->addElement(CharEntity::create('p'))
                    ->addElement(CharEntity::create('l'))
                    ->addElement(CharEntity::create('a'))
                , '*')
            ->addElement(CharEntity::create('t'))
            ->addElement(CharEntity::create('i'))
            ->addElement(CharEntity::create('r'))
        , '*'
    );


$sequence = [
    'a',
    'p',
    'l',
    'a',
    'p',
    'l',
    'a',
    't',
    'i',
    'r',
];
testAgg('aplaplatir', $agg, $sequence, $model);


//--------------------------------------------
// TEST 62 - aplatir --> a((pla)*tir)* ==> aplatir
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('a'))
    ->addElement(Group::create()
            ->addElement(Group::create()
                    ->addElement(CharEntity::create('p'))
                    ->addElement(CharEntity::create('l'))
                    ->addElement(CharEntity::create('a'))
                , '*')
            ->addElement(CharEntity::create('t'))
            ->addElement(CharEntity::create('i'))
            ->addElement(CharEntity::create('r'))
        , '*'
    );


$sequence = [
    'a',
    'p',
    'l',
    'a',
    't',
    'i',
    'r',
];
testAgg('aplatir', $agg, $sequence, $model);


//--------------------------------------------
// TEST 63 - atir --> a((pla)*tir)* ==> atir
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('a'))
    ->addElement(Group::create()
            ->addElement(Group::create()
                    ->addElement(CharEntity::create('p'))
                    ->addElement(CharEntity::create('l'))
                    ->addElement(CharEntity::create('a'))
                , '*')
            ->addElement(CharEntity::create('t'))
            ->addElement(CharEntity::create('i'))
            ->addElement(CharEntity::create('r'))
        , '*'
    );


$sequence = [
    'a',
    't',
    'i',
    'r',
];
testAgg('atir', $agg, $sequence, $model);


//--------------------------------------------
// TEST 64 - chien --> ch(ien|at) ==> chien
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('c'))
    ->addElement(CharEntity::create('h'))
    ->addElement(AlternateGroup::create()
            ->addAlternative(Group::create()
                    ->addElement(CharEntity::create('i'))
                    ->addElement(CharEntity::create('e'))
                    ->addElement(CharEntity::create('n'))
            )
            ->addAlternative(Group::create()
                    ->addElement(CharEntity::create('a'))
                    ->addElement(CharEntity::create('t'))
            )
    );


$sequence = [
    'c',
    'h',
    'i',
    'e',
    'n',
];
testAgg('chien', $agg, $sequence, $model);

//--------------------------------------------
// TEST 65 - chat --> ch(ien|at) ==> chat
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('c'))
    ->addElement(CharEntity::create('h'))
    ->addElement(AlternateGroup::create()
            ->addAlternative(Group::create()
                    ->addElement(CharEntity::create('i'))
                    ->addElement(CharEntity::create('e'))
                    ->addElement(CharEntity::create('n'))
            )
            ->addAlternative(Group::create()
                    ->addElement(CharEntity::create('a'))
                    ->addElement(CharEntity::create('t'))
            )
    );


$sequence = [
    'c',
    'h',
    'a',
    't',
];
testAgg('chat', $agg, $sequence, $model);


//--------------------------------------------
// TEST 66 - chat --> ch(ien|at|ou) ==> chat
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('c'))
    ->addElement(CharEntity::create('h'))
    ->addElement(AlternateGroup::create()
            ->addAlternative(Group::create()
                    ->addElement(CharEntity::create('i'))
                    ->addElement(CharEntity::create('e'))
                    ->addElement(CharEntity::create('n'))
            )
            ->addAlternative(Group::create()
                    ->addElement(CharEntity::create('a'))
                    ->addElement(CharEntity::create('t'))
            )
            ->addAlternative(Group::create()
                    ->addElement(CharEntity::create('o'))
                    ->addElement(CharEntity::create('u'))
            )
    );


$sequence = [
    'c',
    'h',
    'a',
    't',
];
testAgg('chat', $agg, $sequence, $model);


//--------------------------------------------
// TEST 67 - chou --> ch(ien|at|ou) ==> chou
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('c'))
    ->addElement(CharEntity::create('h'))
    ->addElement(AlternateGroup::create()
            ->addAlternative(Group::create()
                    ->addElement(CharEntity::create('i'))
                    ->addElement(CharEntity::create('e'))
                    ->addElement(CharEntity::create('n'))
            )
            ->addAlternative(Group::create()
                    ->addElement(CharEntity::create('a'))
                    ->addElement(CharEntity::create('t'))
            )
            ->addAlternative(Group::create()
                    ->addElement(CharEntity::create('o'))
                    ->addElement(CharEntity::create('u'))
            )
    );


$sequence = [
    'c',
    'h',
    'o',
    'u',
];
testAgg('chou', $agg, $sequence, $model);


//--------------------------------------------
// TEST 68 - chips --> ch(ien|at|ou) ==> failure
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('c'))
    ->addElement(CharEntity::create('h'))
    ->addElement(AlternateGroup::create()
            ->addAlternative(Group::create()
                    ->addElement(CharEntity::create('i'))
                    ->addElement(CharEntity::create('e'))
                    ->addElement(CharEntity::create('n'))
            )
            ->addAlternative(Group::create()
                    ->addElement(CharEntity::create('a'))
                    ->addElement(CharEntity::create('t'))
            )
            ->addAlternative(Group::create()
                    ->addElement(CharEntity::create('o'))
                    ->addElement(CharEntity::create('u'))
            )
    );


$sequence = [
    'c',
    'h',
    'i',
    'p',
    's',
];
testAgg('', $agg, $sequence, $model);


//--------------------------------------------
// TEST 69 - chatte --> ch(ien|at|ou)te ==> chatte
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('c'))
    ->addElement(CharEntity::create('h'))
    ->addElement(AlternateGroup::create()
            ->addAlternative(Group::create()
                    ->addElement(CharEntity::create('i'))
                    ->addElement(CharEntity::create('e'))
                    ->addElement(CharEntity::create('n'))
            )
            ->addAlternative(Group::create()
                    ->addElement(CharEntity::create('a'))
                    ->addElement(CharEntity::create('t'))
            )
            ->addAlternative(Group::create()
                    ->addElement(CharEntity::create('o'))
                    ->addElement(CharEntity::create('u'))
            )
    )
    ->addElement(CharEntity::create('t'))
    ->addElement(CharEntity::create('e'));


$sequence = [
    'c',
    'h',
    'a',
    't',
    't',
    'e',
];
testAgg('chatte', $agg, $sequence, $model);


//--------------------------------------------
// TEST 70 - chatte --> ch(ien|at|ou) ==> chat
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('c'))
    ->addElement(CharEntity::create('h'))
    ->addElement(AlternateGroup::create()
            ->addAlternative(Group::create()
                    ->addElement(CharEntity::create('i'))
                    ->addElement(CharEntity::create('e'))
                    ->addElement(CharEntity::create('n'))
            )
            ->addAlternative(Group::create()
                    ->addElement(CharEntity::create('a'))
                    ->addElement(CharEntity::create('t'))
            )
            ->addAlternative(Group::create()
                    ->addElement(CharEntity::create('o'))
                    ->addElement(CharEntity::create('u'))
            )
    );


$sequence = [
    'c',
    'h',
    'a',
    't',
    't',
    'e',
];
testAgg('chat', $agg, $sequence, $model);


//--------------------------------------------
// TEST 71 - ch --> ch(ien|at|ou)? ==> ch
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('c'))
    ->addElement(CharEntity::create('h'))
    ->addElement(AlternateGroup::create()
            ->addAlternative(Group::create()
                    ->addElement(CharEntity::create('i'))
                    ->addElement(CharEntity::create('e'))
                    ->addElement(CharEntity::create('n'))
            )
            ->addAlternative(Group::create()
                    ->addElement(CharEntity::create('a'))
                    ->addElement(CharEntity::create('t'))
            )
            ->addAlternative(Group::create()
                    ->addElement(CharEntity::create('o'))
                    ->addElement(CharEntity::create('u'))
            )
        , '?'
    );


$sequence = [
    'c',
    'h',
];
testAgg('ch', $agg, $sequence, $model);


//--------------------------------------------
// TEST 72 - chie --> ch(ien|at|ou)?ie ==> chie
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('c'))
    ->addElement(CharEntity::create('h'))
    ->addElement(AlternateGroup::create()
            ->addAlternative(Group::create()
                    ->addElement(CharEntity::create('i'))
                    ->addElement(CharEntity::create('e'))
                    ->addElement(CharEntity::create('n'))
            )
            ->addAlternative(Group::create()
                    ->addElement(CharEntity::create('a'))
                    ->addElement(CharEntity::create('t'))
            )
            ->addAlternative(Group::create()
                    ->addElement(CharEntity::create('o'))
                    ->addElement(CharEntity::create('u'))
            )
        , '?'
    )
    ->addElement(CharEntity::create('i'))
    ->addElement(CharEntity::create('e'));


$sequence = [
    'c',
    'h',
    'i',
    'e',
];
testAgg('chie', $agg, $sequence, $model);


//--------------------------------------------
// TEST 73 - chienne --> ch(ien|at|ou)?ne ==> chienne
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('c'))
    ->addElement(CharEntity::create('h'))
    ->addElement(AlternateGroup::create()
            ->addAlternative(Group::create()
                    ->addElement(CharEntity::create('i'))
                    ->addElement(CharEntity::create('e'))
                    ->addElement(CharEntity::create('n'))
            )
            ->addAlternative(Group::create()
                    ->addElement(CharEntity::create('a'))
                    ->addElement(CharEntity::create('t'))
            )
            ->addAlternative(Group::create()
                    ->addElement(CharEntity::create('o'))
                    ->addElement(CharEntity::create('u'))
            )
        , '?'
    )
    ->addElement(CharEntity::create('n'))
    ->addElement(CharEntity::create('e'));


$sequence = [
    'c',
    'h',
    'i',
    'e',
    'n',
    'n',
    'e',
];
testAgg('chienne', $agg, $sequence, $model);


//--------------------------------------------
// TEST 74 - chienienne --> ch(ien|at|ou)+ne ==> chienienne
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('c'))
    ->addElement(CharEntity::create('h'))
    ->addElement(AlternateGroup::create()
            ->addAlternative(Group::create()
                    ->addElement(CharEntity::create('i'))
                    ->addElement(CharEntity::create('e'))
                    ->addElement(CharEntity::create('n'))
            )
            ->addAlternative(Group::create()
                    ->addElement(CharEntity::create('a'))
                    ->addElement(CharEntity::create('t'))
            )
            ->addAlternative(Group::create()
                    ->addElement(CharEntity::create('o'))
                    ->addElement(CharEntity::create('u'))
            )
        , '+'
    )
    ->addElement(CharEntity::create('n'))
    ->addElement(CharEntity::create('e'));


$sequence = [
    'c',
    'h',
    'i',
    'e',
    'n',
    'i',
    'e',
    'n',
    'n',
    'e',
];
testAgg('chienienne', $agg, $sequence, $model);


//--------------------------------------------
// TEST 75 - chienien --> ch(ien|at|ou)+ ==> chienien
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('c'))
    ->addElement(CharEntity::create('h'))
    ->addElement(AlternateGroup::create()
            ->addAlternative(Group::create()
                    ->addElement(CharEntity::create('i'))
                    ->addElement(CharEntity::create('e'))
                    ->addElement(CharEntity::create('n'))
            )
            ->addAlternative(Group::create()
                    ->addElement(CharEntity::create('a'))
                    ->addElement(CharEntity::create('t'))
            )
            ->addAlternative(Group::create()
                    ->addElement(CharEntity::create('o'))
                    ->addElement(CharEntity::create('u'))
            )
        , '+'
    );


$sequence = [
    'c',
    'h',
    'i',
    'e',
    'n',
    'i',
    'e',
    'n',
];
testAgg('chienien', $agg, $sequence, $model);


//--------------------------------------------
// TEST 76 - chienat --> ch(ien|at|ou)+ ==> chienat
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('c'))
    ->addElement(CharEntity::create('h'))
    ->addElement(AlternateGroup::create()
            ->addAlternative(Group::create()
                    ->addElement(CharEntity::create('i'))
                    ->addElement(CharEntity::create('e'))
                    ->addElement(CharEntity::create('n'))
            )
            ->addAlternative(Group::create()
                    ->addElement(CharEntity::create('a'))
                    ->addElement(CharEntity::create('t'))
            )
            ->addAlternative(Group::create()
                    ->addElement(CharEntity::create('o'))
                    ->addElement(CharEntity::create('u'))
            )
        , '+'
    );


$sequence = [
    'c',
    'h',
    'i',
    'e',
    'n',
    'a',
    't',
];
testAgg('chienat', $agg, $sequence, $model);


//--------------------------------------------
// TEST 77 - chip --> ch(ien|at|ou)+ ==> failure
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('c'))
    ->addElement(CharEntity::create('h'))
    ->addElement(AlternateGroup::create()
            ->addAlternative(Group::create()
                    ->addElement(CharEntity::create('i'))
                    ->addElement(CharEntity::create('e'))
                    ->addElement(CharEntity::create('n'))
            )
            ->addAlternative(Group::create()
                    ->addElement(CharEntity::create('a'))
                    ->addElement(CharEntity::create('t'))
            )
            ->addAlternative(Group::create()
                    ->addElement(CharEntity::create('o'))
                    ->addElement(CharEntity::create('u'))
            )
        , '+'
    );


$sequence = [
    'c',
    'h',
    'i',
    'p',
];
testAgg('', $agg, $sequence, $model);


//--------------------------------------------
// TEST 78 - chip --> ch(ien|at|ou)+ip ==> failure
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('c'))
    ->addElement(CharEntity::create('h'))
    ->addElement(AlternateGroup::create()
            ->addAlternative(Group::create()
                    ->addElement(CharEntity::create('i'))
                    ->addElement(CharEntity::create('e'))
                    ->addElement(CharEntity::create('n'))
            )
            ->addAlternative(Group::create()
                    ->addElement(CharEntity::create('a'))
                    ->addElement(CharEntity::create('t'))
            )
            ->addAlternative(Group::create()
                    ->addElement(CharEntity::create('o'))
                    ->addElement(CharEntity::create('u'))
            )
        , '+'
    )
    ->addElement(CharEntity::create('i'))
    ->addElement(CharEntity::create('p'));


$sequence = [
    'c',
    'h',
    'i',
    'p',
];
testAgg('', $agg, $sequence, $model);


//--------------------------------------------
// TEST 79 - chienatouien --> ch(ien|at|ou)+ ==> chienatouien
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('c'))
    ->addElement(CharEntity::create('h'))
    ->addElement(AlternateGroup::create()
            ->addAlternative(Group::create()
                    ->addElement(CharEntity::create('i'))
                    ->addElement(CharEntity::create('e'))
                    ->addElement(CharEntity::create('n'))
            )
            ->addAlternative(Group::create()
                    ->addElement(CharEntity::create('a'))
                    ->addElement(CharEntity::create('t'))
            )
            ->addAlternative(Group::create()
                    ->addElement(CharEntity::create('o'))
                    ->addElement(CharEntity::create('u'))
            )
        , '+'
    );


$sequence = [
    'c',
    'h',
    'i',
    'e',
    'n',
    'a',
    't',
    'o',
    'u',
    'i',
    'e',
    'n',
];
testAgg('chienatouien', $agg, $sequence, $model);


//--------------------------------------------
// TEST 80 - chatoune --> ch(ien|at|ou)+ne ==> chatoune
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('c'))
    ->addElement(CharEntity::create('h'))
    ->addElement(AlternateGroup::create()
            ->addAlternative(Group::create()
                    ->addElement(CharEntity::create('i'))
                    ->addElement(CharEntity::create('e'))
                    ->addElement(CharEntity::create('n'))
            )
            ->addAlternative(Group::create()
                    ->addElement(CharEntity::create('a'))
                    ->addElement(CharEntity::create('t'))
            )
            ->addAlternative(Group::create()
                    ->addElement(CharEntity::create('o'))
                    ->addElement(CharEntity::create('u'))
            )
        , '+'
    )
    ->addElement(CharEntity::create('n'))
    ->addElement(CharEntity::create('e'));


$sequence = [
    'c',
    'h',
    'a',
    't',
    'o',
    'u',
    'n',
    'e',
];
testAgg('chatoune', $agg, $sequence, $model);



//--------------------------------------------
// TEST 81 - chatoune --> ch(ien|at|ou)*ne ==> chatoune
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('c'))
    ->addElement(CharEntity::create('h'))
    ->addElement(AlternateGroup::create()
            ->addAlternative(Group::create()
                    ->addElement(CharEntity::create('i'))
                    ->addElement(CharEntity::create('e'))
                    ->addElement(CharEntity::create('n'))
            )
            ->addAlternative(Group::create()
                    ->addElement(CharEntity::create('a'))
                    ->addElement(CharEntity::create('t'))
            )
            ->addAlternative(Group::create()
                    ->addElement(CharEntity::create('o'))
                    ->addElement(CharEntity::create('u'))
            )
        , '*'
    )
    ->addElement(CharEntity::create('n'))
    ->addElement(CharEntity::create('e'));


$sequence = [
    'c',
    'h',
    'a',
    't',
    'o',
    'u',
    'n',
    'e',
];
testAgg('chatoune', $agg, $sequence, $model);



//--------------------------------------------
// TEST 82 - chne --> ch(ien|at|ou)*ne ==> chne
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('c'))
    ->addElement(CharEntity::create('h'))
    ->addElement(AlternateGroup::create()
            ->addAlternative(Group::create()
                    ->addElement(CharEntity::create('i'))
                    ->addElement(CharEntity::create('e'))
                    ->addElement(CharEntity::create('n'))
            )
            ->addAlternative(Group::create()
                    ->addElement(CharEntity::create('a'))
                    ->addElement(CharEntity::create('t'))
            )
            ->addAlternative(Group::create()
                    ->addElement(CharEntity::create('o'))
                    ->addElement(CharEntity::create('u'))
            )
        , '*'
    )
    ->addElement(CharEntity::create('n'))
    ->addElement(CharEntity::create('e'));


$sequence = [
    'c',
    'h',
    'n',
    'e',
];
testAgg('chne', $agg, $sequence, $model);



//--------------------------------------------
// TEST 83 - chouououne --> ch(ien|at|ou)*ne ==> chouououne
//--------------------------------------------
$model = Model::create()
    ->addElement(CharEntity::create('c'))
    ->addElement(CharEntity::create('h'))
    ->addElement(AlternateGroup::create()
            ->addAlternative(Group::create()
                    ->addElement(CharEntity::create('i'))
                    ->addElement(CharEntity::create('e'))
                    ->addElement(CharEntity::create('n'))
            )
            ->addAlternative(Group::create()
                    ->addElement(CharEntity::create('a'))
                    ->addElement(CharEntity::create('t'))
            )
            ->addAlternative(Group::create()
                    ->addElement(CharEntity::create('o'))
                    ->addElement(CharEntity::create('u'))
            )
        , '*'
    )
    ->addElement(CharEntity::create('n'))
    ->addElement(CharEntity::create('e'));


$sequence = [
    'c',
    'h',
    'o',
    'u',
    'o',
    'u',
    'o',
    'u',
    'n',
    'e',
];
testAgg('chouououne', $agg, $sequence, $model);


PrettyTestInterpreter::create()->execute($agg);
ComparisonErrorTableTool::display();