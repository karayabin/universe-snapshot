<?php


namespace Tokens\Util;


use SequenceMatcher\Model;
use SequenceMatcher\SequenceMatcher;
use Tokens\SequenceMatcher\Element\TokenAlternateEntity;
use Tokens\SequenceMatcher\Element\TokenEntity;
use Tokens\SequenceMatcher\Element\TokenGreedyEntity;
use Tokens\Tokens;

class UseStatementsUtil
{


    public static function getUseStatements($file)
    {

        $tokens = token_get_all(file_get_contents($file));
        $model = Model::create()
            ->addElement(TokenEntity::create(T_USE, null))
            ->addElement(TokenEntity::create(T_WHITESPACE, null), '?')
            ->addElement(TokenAlternateEntity::create([T_STRING, T_NS_SEPARATOR]), null, 'a')
            ->addElement(TokenGreedyEntity::create(null, ';'), '*', 'a')
            ->addElement(TokenEntity::create(null, ';'));

        $sequence = $tokens;

        $markers = [];
        SequenceMatcher::create()
            ->match($sequence, $model, function (array $matchedElements, array $matchedThings, array $_markers = null) use (&$markers) {
                $markers[] = Tokens::concatenate($_markers['a']);
            });


        // remove ' as '
        $markers = array_map(function ($v) {
            $p = explode(' as ', $v);
            return $p[0];
        }, $markers);
        return $markers;
    }

}