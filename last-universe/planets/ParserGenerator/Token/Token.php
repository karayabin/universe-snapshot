<?php

namespace ParserGenerator\Token;

/*
 * LingTalfi 2016-07-29
 */
use ParserGenerator\Lexer\ListLexer;

class Token
{

    public $type;
    public $text;

    public function __construct(int $type, String $text)
    {
        $this->type = $type;
        $this->text = $text;
    }

    public function __toString()
    {
        $tname = ListLexer::TOKEN_NAMES[$this->type];
        return "<'" . $this->text . "' , " . $tname . ">";
    }
}
