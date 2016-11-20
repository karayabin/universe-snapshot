<?php

namespace ParserGenerator\Lexer;

/*
 * LingTalfi 2016-07-29
 */
use ParserGenerator\Token\Token;

class LL1RecursiveDescentLexer
{
    private static $EOF = -1;


    public function nextToken(): Token
    {
        while ('lookAheadChar' !== self::$EOF) {
            if('commentStartSequence'){
                comment();
                continue;
            }
        }
        switch ('lookAheadChar') {
            case 'whiteSpace':
                consume();
                continue;
                break;
            default:
                break;
        }
    }
}
