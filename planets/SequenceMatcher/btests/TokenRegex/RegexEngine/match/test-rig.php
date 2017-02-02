<?php

use SequenceMatcher\Element\AlternateGroup;
use SequenceMatcher\Element\CharEntity;
use SequenceMatcher\Element\Group;
use SequenceMatcher\Model;
use SequenceMatcher\SequenceMatcher;
use SequenceMatcher\Util\DebugUtil;


require_once __DIR__ . "/../init.php";
ini_set('display_errors', 1);
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
//$model = Model::create()
//    ->addElement(CharEntity::create('a'))
//    ->addElement(Group::create()
//            ->addElement(CharEntity::create('g'))
//            ->addElement(CharEntity::create('o'), '?')
//        , '+');
//
//
//$sequence = [
//    'a',
//    'g',
//    'o',
//    'g',
//];


a('model: ' . DebugUtil::modelToString($model));
a(implode('', $sequence));


$s = '';
SequenceMatcher::create()
    ->debugMode()
    ->match($sequence, $model, function (array $match, array $markers = null) use (&$s) {
        foreach ($match as $element) {
            $s .= $element;
        }
    });
a($s);


require_once "/Users/pierrelafitte/Desktop/mondossier/web/nullos-admin/app-nullos/class-planets/SequenceMatcher/btests/TokenRegex/RegexEngine/match/regexEngine.match.test.php";

