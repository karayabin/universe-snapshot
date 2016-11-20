<?php

namespace ParserGenerator\Parser;

/*
 * LingTalfi 2016-08-01
 */
use ParserGenerator\Exception\ParserException;
use ParserGenerator\Lexer\Lexer;
use ParserGenerator\Token\Token;

class LLkParser
{


    /**
     * @var Lexer
     */
    protected $input;
    /**
     * @var Token[]
     */
    protected $lookahead;
    private $k; // how many lookahead symbols
    private $p; // circular index of next token position to fill


    public function __construct(Lexer $input, int $k)
    {
        $this->input = $input;
        $this->k = $k;
        $this->p = 0;
        $this->lookahead = [];
        for ($i = 1; $i <= $k; $i++) {
            $this->consume();
        }
    }


    public function match(int $x)
    {
        if ($this->la(1) === $x) {
            $this->consume();
        }
        else {
            throw new ParserException("expecting " .
                $this->input->getTokenName($x) . "; found " . $this->lt(1)
            );
        }
    }

    public function consume()
    {
        $this->lookahead[$this->p] = $this->input->nextToken();
        $this->p = ($this->p + 1) % $this->k;
    }


    public function lt(int $i): Token
    {
        return $this->lookahead[($this->p + $i - 1) % $this->k];
    }

    public function la(int $i): int
    {
        return $this->lt($i)->type;
    }

}
