<?php

namespace ParserGenerator\Parser;

/*
 * LingTalfi 2016-08-01
 */

use ParserGenerator\Exception\ParserException;
use ParserGenerator\Lexer\ListLexer;

class LLkListParser extends LLkParser
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
        while ($this->la(1) === ListLexer::COMMA) {
            $this->match(ListLexer::COMMA);
            $this->element();
        }
    }

    public function element()
    {
        if ($this->la(1) === ListLexer::NAME && $this->la(2) === ListLexer::EQUALS) {
            $this->match(ListLexer::NAME);
            $this->match(ListLexer::EQUALS);
            $this->match(ListLexer::NAME);
        }
        elseif ($this->la(1) === ListLexer::NAME) {
            $this->match(ListLexer::NAME);
        }
        else if ($this->la(1) === ListLexer::LBRACK) {
            $this->list();
        }
        else {
            throw new ParserException("expecting name or list; found " . $this->lt(1));
        }
    }

}
