<?php

namespace ParserGenerator\Parser;

/*
 * LingTalfi 2016-07-29
 */

use ParserGenerator\Exception\ParserException;
use ParserGenerator\Lexer\ListLexer;

class ListParser extends Parser
{

    public function list()
    {
        $this->match(ListLexer::LBRACK);
        $this->elements();
        $this->match(ListLexer::RBRACK);
    }

    public function elements()
    {
        $this->element();
        while ($this->lookahead->type === ListLexer::COMMA) {
            $this->match(ListLexer::COMMA);
            $this->element();
        }
    }

    public function element()
    {
        if ($this->lookahead->type === ListLexer::NAME) {
            $this->match(ListLexer::NAME);
        }
        else if ($this->lookahead->type === ListLexer::LBRACK) {
            $this->list();
        }
        else {
            throw new ParserException("expecting name or list; found " . $this->lookahead);
        }
    }

}
