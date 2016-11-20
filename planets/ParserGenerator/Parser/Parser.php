<?php

namespace ParserGenerator\Parser;

/*
 * LingTalfi 2016-07-29
 */
use ParserGenerator\Exception\ParserException;
use ParserGenerator\Lexer\Lexer;
use ParserGenerator\Token\Token;

class Parser
{


    /**
     * @var Lexer
     */
    protected $input;
    /**
     * @var Token
     */
    protected $lookahead;


    public function __construct(Lexer $input)
    {
        $this->input = $input;
        $this->lookahead = $this->input->nextToken();
    }


    public function match(int $x)
    {
        if ($this->lookahead->type === $x) {
            $this->consume();
        }
        else {
            throw new ParserException("expecting " .
                $this->input->getTokenName($x) . "; found " . $this->lookahead
            );
        }
    }

    public function consume()
    {
        $this->lookahead = $this->input->nextToken();
    }

}
